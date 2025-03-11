<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'address_id',
        'picture',
        'email',
        'store_id',
        'active',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function managedStore()
    {
        return $this->hasOne(Store::class, 'manager_staff_id');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'staff_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'staff_id');
    }
}
