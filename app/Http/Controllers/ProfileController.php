<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|min:6',

            'materia' => 'nullable|string|max:255',
            'horario' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->hasRole('Profesor')) {

            $user->materia = $request->materia;
            $user->horario = $request->horario;

            if ($request->hasFile('foto')) {

                $nombreFoto = time().'_'.$request->foto->getClientOriginalName();

                $request->foto->move(
                    public_path('img/profesores'),
                    $nombreFoto
                );

                $user->foto = $nombreFoto;
            }
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
