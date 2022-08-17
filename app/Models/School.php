<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;

    class School extends BaseModel
    {
        use HasFactory;

        public function students()
        {
            return $this->hasMany(Student::class);
        }

        public function teachers()
        {
            return $this->belongsToMany(Teacher::class)->withTimestamps();
        }
    }
