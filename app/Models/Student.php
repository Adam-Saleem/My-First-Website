<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Student extends BaseModel
    {
        use HasFactory;

        /**
         * @return mixed
         */
        public function school()
        {
            return $this->belongsTo(School::class)->withTimestamps();
        }
    }
