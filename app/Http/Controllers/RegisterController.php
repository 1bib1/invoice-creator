<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        
        $user = User::Create($request->validated());
        auth()-> login($user);
        return redirect('/invoices')->with('message', 'Account registered successfully.');
    }
}
