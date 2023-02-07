<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'total_price'
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function items()
    {
        return $this->belongsToMany(Food::class)->using(FoodOrder::class)->withPivot('price')->withTimestamps();
    }
}
