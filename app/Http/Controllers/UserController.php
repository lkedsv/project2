<?php

namespace App\Http\Controllers;

use App\Mail\SendMailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\cliente;

class UserController extends Controller
{
    
    function login()
    {
        return view('login');
    }

    function logout(Request $request){
        $request->session()->invalidate();
        Auth::logout();
        return redirect()->route('login');
    }

    function validateLogin(Request $request)
    {
        $request->validate([           //@if($errors->has('email')) na view
            'email' =>  'required',
            'password'  =>  'required'
        ]);
    
        $user = User::where([
            'email' => $request->email, 
            'password' => $request->password
        ])->first();
        
        if($user)
        {
            Auth::login($user);
            //dd($user);

            $Cliente = cliente::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            
            $mensagem = 'Bem vindo!';

            return view('dashboard', ['cliente'=>$Cliente, 'mensagem'=>$mensagem]);
        }
        else{
            return back()->withErrors([
                'email' => 'Os dados informados não são válidos.',
            ]);
        }
    }

    function registration(Request $request)
    {
        return view('registration');
    }

    function validateRegistration(Request $request){
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => $data['password']
        ]);

        //Mail::to($to)->send(new SendMailUser());

        return redirect('/')->with('success', 'Cadastro completo, acesse sua conta');

        //return view('login');
    }

}
