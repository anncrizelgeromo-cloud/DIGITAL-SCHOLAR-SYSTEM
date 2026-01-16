<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fields na puwede i-fill (mass assignable)
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Relationship: isang product ay puwede magkaroon ng maraming reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}