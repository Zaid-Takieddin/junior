<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FoodOrder extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $fillable = [
        'order_id',
        'food_id',
        'name',
        'description',
        'price'
    ];
}
