<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends BaseModel
{
    use HasFactory;

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }
}
