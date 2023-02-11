<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'address',
        'phone_number'
    ];

    public function classroom()
    {
        return $this->hasOne(Classroom::class);
    }

    public function certificates()
    {
        return $this->hasMany(TeacherCertificate::class);
    }
}
