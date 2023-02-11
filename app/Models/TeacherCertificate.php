<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'certificate'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
