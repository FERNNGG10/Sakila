<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmActor extends Model
{
    use HasFactory;

    protected $table = 'film_actor';
    public $incrementing = false; // Indica que no hay una clave primaria autoincremental
    protected $primaryKey = null; // Indica que no hay una clave primaria única
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'actor_id',
    ];

    // Relación con el modelo Film
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'film_id');
    }

    // Relación con el modelo Actor
    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actor_id', 'actor_id');
    }
}
