<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Child;

class ChildParent extends Model
{
    use HasFactory;

    public function children() {
        return $this->hasMany(Child::class);
    }
}
