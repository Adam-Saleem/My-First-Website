<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends BaseModel
{
    use HasFactory;

    public function schools()
    {
        return $this->belongsToMany(School::class)->withTimestamps();
    }
}
