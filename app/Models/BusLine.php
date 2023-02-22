<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusLine extends Model
{
    use HasFactory;

    public function lineSupervisor()
    {
        return $this->belongsTo(LineSupervisor::class);
    }

    public function children()
    {
        return $this->hasMany(Child::class);
    }
}
