<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineSupervisor extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'ready_status'
    ];

    public function busLine()
    {
        return $this->hasOne(BusLine::class);
    }
}
