<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'guardian_id',
        'classroom_id',
        'first_name',
        'status',
        'birth_date'
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function image()
    {
        return $this->hasOne(ChildImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function busLine()
    {
        return $this->belongsTo(BusLine::class);
    }
}
