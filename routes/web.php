<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Mail\ReservaConfirmadaMail;
use App\Models\Reserva;



Route::post('/iniciar-sesion', [AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    auth()->logout();
   return redirect()->route('login');
})->name('auth.logout');

Route::get('/comunicacion', function () {
    return view('comunicacion.comunic');
})->name('comunicacion');

Route::post('/forgot-password', [ForgotPasswordController::class, 'verifyEmail'])
    ->name('password.email');

     Route::post('/verificar-email', [ForgotPasswordController::class, 'verifyEmail'])
    ->name('password.verify');

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/profesores', [HomeController::class, 'home'])
        ->name('profesores.index');

    Route::get('/profesores/{name}', [HomeController::class, 'show'])
        ->name('profesores.show');

    Route::get('/comunicacion', [HomeController::class, 'comunicacion'])
    ->name('comunicacion')
    ->middleware('auth');

    Route::post(
    '/responder-reserva',
    [HomeController::class, 'responderReserva']
)->name('responder.reserva');
    Route::get('/public', [MaterialController::class, 'materiales'])->name('materiales');

    Route::put('/perfil/update', [ProfileController::class, 'update'])
        ->name('perfil.update');


});

Route::get('/reserva', function () {

    if (!auth()->check() || !auth()->user()->hasRole('Alumno')) {
        abort(403);
    }

    $reservas = Reserva::where('user_id', auth()->id())
        ->get();

    return view('reservados.reserva', compact('reservas'));

})->name('reserva');

Route::post('/guardar-reserva', function (\Illuminate\Http\Request $request) {

    $request->validate([
        'teacher' => 'required',
        'materia' => 'required',
        'horario' => 'required',
    ]);

    $reserva = Reserva::create([
        'user_id' => auth()->id(),
        'teacher' => $request->teacher,
        'materia' => $request->materia,
        'horario' => $request->horario,
    ]);

    Mail::to(auth()->user()->email)
        ->send(new ReservaConfirmadaMail($reserva));

    return redirect()
        ->back()
        ->with('success', 'Reserva realizada correctamente');

})->name('guardar.reserva');

Route::middleware(['auth', 'role:Profesor'])->group(function () {
      Route::get('/inicio-profesor', [HomeController::class, 'inicioProfesor'])
        ->name('profesor.inicio');


    Route::get('materiales/listado', [MaterialController::class, 'index'])
        ->name('materiales.index');

    Route::get('materiales/ver/{id}', [MaterialController::class, 'show'])
        ->whereNumber('id')
        ->name('materiales.show');

    Route::get('materiales/publicar', [MaterialController::class, 'create'])
        ->name('materiales.create');

    Route::post('materiales/publicar', [MaterialController::class, 'store'])
        ->name('materiales.store');

    Route::get('materiales/editar/{id}', [MaterialController::class, 'edit'])
        ->whereNumber('id')
        ->name('materiales.edit');

    Route::put('materiales/editar/{id}', [MaterialController::class, 'update'])
        ->whereNumber('id')
        ->name('materiales.update');

    Route::delete('materiales/{id}/eliminar', [MaterialController::class, 'destroy'])
        ->whereNumber('id')
        ->name('materiales.destroy');

});

Route::get('/test-mail', function () {

    Mail::raw('MAIL FUNCIONANDO', function ($message) {
        $message->to('TUEMAIL@gmail.com')
                ->subject('TEST LARAVEL');
    });

    return 'Mail enviado';
});
