<?php

    namespace App\Http\Controllers;


    class LoginController extends Controller
    {

        public function __construct()
        {
            $this->middleware('guest')->except('destroy');
        }

        public function destroy()
        {
            auth()->logout();
            return redirect(url('/'));
        }

        public function create()
        {
            return view('Register.login');
        }

        public function store()
        {
            if (!auth()->attempt(request(['email', 'password']))) {
                return back();
            } else {
                return redirect(url('/'));
            }
        }
    }

