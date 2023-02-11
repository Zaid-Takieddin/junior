<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'image'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->using(FoodOrder::class)->withPivot('name', 'description', 'price')->withTimestamps();
    }
}
