<?php

    namespace App\Facades;

    use App\Classes\SchoolManager;
    use Illuminate\Support\Facades\Facade;

    class SchoolManagerFacade extends Facade
    {
        protected static function getFacadeAccessor()
        {
            return SchoolManager::class;
        }
    }
