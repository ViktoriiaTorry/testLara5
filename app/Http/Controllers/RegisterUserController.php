<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
class RegisterUserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password',
        ]);

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        $user->generateToken();

        return response()->json(['data' => $user->toArray()], 201);
    }
}
