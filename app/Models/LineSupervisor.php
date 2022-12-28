<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineSupervisor extends Model
{
    use HasFactory;

    public function busLine() {
        return $this->hasOne(BusLine::class);
    }
}
