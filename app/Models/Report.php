<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'reporter',
        'description'
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function reporter()
    {
        return $this->belongsTo(Teacher::class);
    }
}
