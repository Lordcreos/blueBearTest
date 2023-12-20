<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterRecived;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class AuthController extends Controller
{

    public function showLogin(){
        if (auth()->check()) return redirect('/');
        return Inertia::render('Auth/Login');
    }
    public function showRegister(){
        if (auth()->check()) return redirect('/');
        return Inertia::render('Auth/Register');
    }
    public function emailVerify(User $user){
        // if($user->email_verified_at) return redirect()->route('login');

        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('login')->with('message', 'Usuario habilitado exitosamente');
    }
    public function error(){
        return Inertia::render('Error/404');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nombre requerido',
            'email.required' => 'Email requerido',
            'email.email' => 'Debe ser un email válido',
            'email.unique' => 'Este email ya existe',
            'password.required' => 'Contraseña requerida',
            'password.confirmed' => 'las contraseñas no coinciden',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new RegisterRecived($user));

        return redirect()->route('register')->with('message', 'Usuario registrado exitosamente');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email requerido',
            'email.email' => 'Debe ser un email válido',
            'password.required' => 'Contraseña requerida',
        ]);

        $credentials = $request->only('email', 'password');

        if(!User::whereNotNull('email_verified_at')->where("email", $request->email)->where('password', $request->password)->first()){
            return back()->withErrors([
                'email' => 'Debes validar tu usuario, revisa tu correo',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('login')->with('message', 'Inicio de sesión');
        }

        return back()->withErrors([
            'email' => 'Las credenciales son inválidas',
        ]);
    }
    public function logout(){
        Auth::logout();
        
        return redirect()->route('login');
    }
}
