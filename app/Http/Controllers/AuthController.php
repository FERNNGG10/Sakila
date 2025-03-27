<?php

namespace App\Http\Controllers;

use App\Mail\TwoFactorCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        // Validar datos básicos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['credentials' => 'Las credenciales introducidas son incorrectas']);
        }
        $code = rand(100000, 999999);
        $user->code = Hash::make($code);
        $user->save();

        Mail::to($user->email)->send(new TwoFactorCode($user, $code));

        return redirect()->route('factor', ['user' => $user->id]);
    }

    public function factor(User $user)
    {
        return view('codigo',['user' => $user]);
    }

    public function twofa(Request $request, User $user)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        if ($user && Hash::check($request->code, $user->code)) {
            $user->code = null;
            $user->save();
            Auth::login($user);
            return redirect()->route('dashboard');
        }
        return back()
            ->withErrors(['code' => 'El código introducido es incorrecto']);
    }


    public function resendCode(User $user)
    {
        // Generar nuevo código
        $code = rand(100000, 999999);
        $user->code = Hash::make($code);
        $user->save();
        
        // Enviar el código por correo
       
        Mail::to($user->email)->send(new TwoFactorCode($user, $code));
         
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
