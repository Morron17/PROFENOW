<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function verifyEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'No existe una cuenta con ese correo');
    }

    // contraseña temporal
    $tempPassword = Str::random(8);

    // guardar nueva contraseña
    $user->password = Hash::make($tempPassword);
    $user->save();

    // enviar mail
    Mail::raw(
        "Tu nueva contraseña temporal es: " . $tempPassword,
        function ($message) use ($user) {

            $message->to($user->email)
                    ->subject('Recuperación de contraseña - PROFENOW');
        }
    );

    return back()->with(
        'success',
        'Se envió una nueva contraseña a tu correo'
    );
}
}
