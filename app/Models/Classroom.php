<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'level'
    ];

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
