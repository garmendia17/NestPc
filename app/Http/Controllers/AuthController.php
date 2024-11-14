<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registro()
    {
        return view('auth.registrar'); 
    }

    public function registroSave(Request $request) { 
        // Eliminar o comentar esta línea
        // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|confirmed|min:8', 
            'level' => 'required|string|in:admin,user',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'level' => $request->level,
        ]);
    
        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente.');
    }
    
    

    public function login(){
        return view('auth.inicio');
    }
    public function loginAction(Request $request){
        validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if(!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            
            ]);
        }
        $request->session()->regenerate();
        
        return redirect()->route('dashboard');
    }

    public function logoutAction(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('home'); // Redirige a la ruta llamada 'home'
    }    

    public function profile()
    {
        return view('layouts.profile');
    }
    
}
