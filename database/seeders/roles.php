<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password=Hash::make('12345678',);
        Role::create(['name' => 'administrador']);
        Role::create(['name' => 'invitado']);
        Role::create(['name' => 'cliente']);
        Staff::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'address_id' => 1,
            'picture' => null,
            'email' => 'fgolmos10@gmail.com',
            'store_id' => 1,
            'active' => 1,
            'username' => 'admin',
            'password' => $password,
            'rol_id' => 1,
        ]);
    }
}
