<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'homework_id',
        'child_id',
        'answer'
    ];

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
