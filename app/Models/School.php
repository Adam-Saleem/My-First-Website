<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends BaseModel
{
    use HasFactory;

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
