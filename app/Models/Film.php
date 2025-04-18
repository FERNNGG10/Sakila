<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $primaryKey = 'film_id';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'release_year',
        'language_id',
        'original_language_id',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function originalLanguage()
    {
        return $this->belongsTo(Language::class, 'original_language_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'film_actor', 'film_id', 'actor_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'film_category', 'film_id', 'category_id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'film_id');
    }
}
