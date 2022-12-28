<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildParent;

class Child extends Model
{
    use HasFactory;

    public function childParent() {
        return $this->belongsTo(ChildParent::class);
    }
    
    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}
