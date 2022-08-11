<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use mysql_xdevapi\Exception;

    class RegistrationController extends Controller
    {
        public function create()
        {
            return view('Register.registration');
        }

        public function store()
        {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed'
            ]);
            $userData = request(['name', 'email', 'password']);
            $userData['password'] = bcrypt($userData['password']);
            $user = User::create($userData);

            auth()->login($user);
            return redirect( url('/'));
        }
    }
