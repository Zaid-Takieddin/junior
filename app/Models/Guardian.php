<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'balance'
    ];

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Child::class);
    }
}
