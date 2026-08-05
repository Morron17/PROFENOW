<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function login()
    {
        return view('auth.login');
    }

   public function authenticate(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {

        $request->session()->regenerate();

        return redirect('/');
    }

    return back()->with('error', 'Email o contraseña incorrectos.');
}

    public function register()
    {
        return view('auth.register');
    }

    public function showLogin()
{
    return view('login');
}
   public function store(Request $request)
{
    $request->validate([

    'name' => 'required',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6',
    'country' => 'required',
    'birthdate' => 'required',
    'role' => 'required|in:Alumno,Profesor',
    'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

]);

$nombreFoto = null;

if ($request->hasFile('foto')) {

    $nombreFoto = time().'_'.$request->foto->getClientOriginalName();

    $request->foto->move(public_path('img/profesores'), $nombreFoto);

}

    $user = User::create([

    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'country' => $request->country,
    'birthdate' => $request->birthdate,
    'materia' => $request->materia,
    'descripcion' => $request->descripcion,
    'horario' => $request->horario,
    'foto' => $nombreFoto,

]);

    $role = Role::where('name', $request->role)->first();
    $user->roles()->attach($role->id);

    return redirect()->route('login')->with('success', 'Cuenta creada. Inicia sesión.');

}
}
