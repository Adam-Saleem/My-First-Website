<?php

    namespace App\Classes;

    use App\Models\School;

    class SchoolManager
    {
        public function getSchools()
        {
            return School::query()->get();
        }
    }
