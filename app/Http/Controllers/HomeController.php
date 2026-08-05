<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\RespuestaProfesorMail;
use App\Mail\ReservaConfirmadaMail;
use App\Models\User;
use App\Models\Material;
use App\Models\Teacher;
use App\Models\Reserva;
use Carbon\Carbon;



class HomeController extends Controller
{

private function normalizar($texto)
{
    return Str::lower(Str::ascii($texto));
}
    public function materiales(Request $request)
    {
    $query = $request->input('q');

    $materiales = Material::when($query, function ($queryBuilder) use ($query) {
        $queryBuilder->where('titulo', 'like', "%{$query}%")
                     ->orWhere('materia', 'like', "%{$query}%");
    })
    ->orderBy('material_id', 'desc')
    ->get();

    return view('materiales', [
        'materiales' => $materiales,
        'query' => $query ?? ''
    ]);
    }

public function home(Request $request)
{

if (auth()->check() && auth()->user()->hasRole('Profesor')) {
    return redirect()->route('profesor.inicio');
}
    $query = $request->input('q');
    $subject = $request->input('subject');

    $teachers = collect([
        ['name' => 'patata', 'display_name' => 'Profesor Patata', 'subject' => 'Matemáticas', 'img' => 'patata.webp', 'bio' => 'Profesor con 10 años de experiencia enseñando álgebra y geometría.', 'orary' => "Lunes 9:00 - 13:20\nMiercoles 10:10 - 14:30"],
        ['name' => 'ramírez', 'display_name' => 'Profesor Ramírez', 'subject' => 'Historia', 'img' => 'ramirez.jpg', 'bio' => 'Apasionado por la historia antigua y contemporánea.', 'orary' => "Martes 9:00 - 13:20\nJueves 13:00 - 17:20"],
        ['name' => 'carla', 'display_name' => 'Profesora Carla', 'subject' => 'Biología', 'img' => 'carla.jpg', 'bio' => 'Especialista en biología celular y genética.', 'orary' => "Miercoles 9:00 - 14:50\nViernes 10:15 - 16:05"],
        ['name' => 'carlos', 'display_name' => 'Profesor Carlos', 'subject' => 'Lengua', 'img' => 'carlos.webp', 'bio' => 'Amante de la literatura latinoamericana.', 'orary' => "Lunes 9:00 - 16:20\nMartes 11:05 - 18:25"],
        ['name' => 'beatriz', 'display_name' => 'Profesora Beatriz', 'subject' => 'Matemáticas', 'img' => 'beatriz.webp', 'bio' => 'Experta en cálculo y estadística.', 'orary' => "Lunes 13:30 - 19:20\nJueves 9:00 - 14:50"],
        ['name' => 'matias', 'display_name' => 'Profesor Matias', 'subject' => 'Geografía', 'img' => 'matias.webp', 'bio' => 'Explorador y experto en geografía mundial.', 'orary' => "Jueves 9:10 - 15:00\nViernes 12:00 - 17:50"],
        ['name' => 'martín', 'display_name' => 'Profesor Martín', 'subject' => 'Historia', 'img' => 'martin.webp', 'bio' => 'Docente dedicado al estudio de la historia argentina.', 'orary' => "Martes 12:45 - 18:35\nMiercoles 10:25 - 14:45"],
        ['name' => 'victoria', 'display_name' => 'Profesor Victoria', 'subject' => 'Filosofía', 'img' => 'v.jpg', 'bio' => 'Profesora que da de que pensar con la filosofia.', 'orary' => "Miercoles 9:00 - 16:20\nJueves 11:10 - 18:30"],
        ['name' => 'marta', 'display_name' => 'Profesora Marta', 'subject' => 'Lengua', 'img' => 'marta.jpg', 'bio' => 'Docente que enseña literatura clasica.', 'orary' => "Lunes 13:00 - 18:50\nViernes 9:00 - 14:50"],
    ]);
/*"Lunes 09:00 - 13:20\nMiércoles 14:20 - 18:40"*/
$profesoresDB = User::whereHas('roles', function ($q) {
    $q->where('name', 'Profesor');
})->get();

foreach ($profesoresDB as $profesor) {

    $teachers->push([
        'name' => $profesor->id,
        'display_name' => $profesor->name,
        'subject' => $profesor->materia,
        'img' => $profesor->foto
            ? 'profesores/'.$profesor->foto
            : 'perfil-default.jpg',
        'bio' => $profesor->descripcion,
        'orary' => $profesor->horario,
        'db' => true,
    ]);
}
    // 🔎 Filtrar por name
if ($query) {
    $teachers = $teachers->filter(function ($teacher) use ($query) {

        $name = $this->normalizar($teacher['display_name']);
        $materia = $this->normalizar($teacher['subject']);
        $busqueda = $this->normalizar($query);

        return str_contains($name, $busqueda) ||
               str_contains($materia, $busqueda);
    });
}

    //  Filtrar por materia
    if ($subject) {
        $teachers = $teachers->where('subject', $subject);
    }

    return view('home', [
        'teachers' => $teachers,
        'query' => $query,
        'subject' => $subject
    ]);
}

public function show($name)
{
    $teachers = collect([
        ['name' => 'patata', 'display_name' => 'Profesor Patata', 'subject' => 'Matemáticas', 'img' => 'patata.webp', 'bio' => 'Profesor con 10 años de experiencia enseñando álgebra y geometría', 'orary' => "Lunes 9:00 - 13:20\nMiercoles 10:10 - 14:30"],
        ['name' => 'ramírez', 'display_name' => 'Profesor Ramírez', 'subject' => 'Historia', 'img' => 'ramirez.jpg', 'bio' => 'Apasionado por la historia antigua y contemporánea', 'orary' => "Martes 9:00 - 13:20\nJueves 13:00 - 17:20"],
        ['name' => 'carla', 'display_name' => 'Profesora Carla', 'subject' => 'Biología', 'img' => 'carla.jpg', 'bio' => 'Especialista en biología celular y genética', 'orary' => "Miercoles 9:00 - 14:50\nViernes 10:15 - 16:05"],
        ['name' => 'carlos', 'display_name' => 'Profesor Carlos', 'subject' => 'Lengua', 'img' => 'carlos.webp', 'bio' => 'Amante de la literatura latinoamericana', 'orary' => "Lunes 9:00 - 16:20\nMartes 11:05 - 18:25"],
        ['name' => 'beatriz', 'display_name' => 'Profesora Beatriz', 'subject' => 'Matemáticas', 'img' => 'beatriz.webp', 'bio' => 'Experta en cálculo y estadística', 'orary' => "Lunes 13:30 - 19:20\nJueves 9:00 - 14:50"],
        ['name' => 'matias', 'display_name' => 'Profesor Matias', 'subject' => 'Geografía', 'img' => 'matias.webp', 'bio' => 'Explorador y experto en geografía mundial', 'orary' => "Jueves 9:10 - 15:00\nViernes 12:00 - 17:50"],
        ['name' => 'martín', 'display_name' => 'Profesor Martín', 'subject' => 'Historia', 'img' => 'martin.webp', 'bio' => 'Docente dedicado al estudio de la historia argentina', 'orary' => "Martes 12:45 - 18:35\nMiercoles 10:25 - 14:45"],
        ['name' => 'victoria', 'display_name' => 'Profesor Victoria', 'subject' => 'Filosofía', 'img' => 'v.jpg', 'bio' => 'Profesora que da de que pensar con la filosofia', 'orary' => "Miercoles 9:00 - 16:20\nJueves 11:10 - 18:30"],
        ['name' => 'marta', 'display_name' => 'Profesora Marta', 'subject' => 'Lengua', 'img' => 'marta.jpg', 'bio' => 'Docente que enseña literatura clasica', 'orary' => "Lunes 13:00 - 18:50\nViernes 9:00 - 14:50"],
    ]);

    $profesoresDB = User::whereHas('roles', function ($q) {
    $q->where('name', 'Profesor');
})->get();

foreach ($profesoresDB as $profesor) {

    $teachers->push([
        'name' => $profesor->id,
        'display_name' => $profesor->name,
        'subject' => $profesor->materia,
        'img' => $profesor->foto
            ? 'profesores/'.$profesor->foto
            : 'perfil-default.jpg',
        'bio' => $profesor->descripcion,
        'orary' => $profesor->horario,
        'db' => true,
    ]);

}

    $teacher = $teachers->firstWhere('name', $name);

    if (!$teacher) {
        abort(404, 'Profesor no encontrado');
    }

    // 🔥 IMPORTANTE: evitar crash si algo falla

    $reservado = false;

if (isset($teacher['name'])) {
    try {
        $reservado = \App\Models\Reserva::where(
    'teacher',
    $teacher['display_name']
)->exists();
    } catch (\Exception $e) {
        $reservado = false;
    }
}
Carbon::setLocale('es');

$dias = [
    'Lunes' => Carbon::MONDAY,
    'Martes' => Carbon::TUESDAY,
    'Miércoles' => Carbon::WEDNESDAY,
    'Miercoles' => Carbon::WEDNESDAY,
    'Jueves' => Carbon::THURSDAY,
    'Viernes' => Carbon::FRIDAY,
    'Sábado' => Carbon::SATURDAY,
    'Sabado' => Carbon::SATURDAY,
    'Domingo' => Carbon::SUNDAY,
];

$horariosDisponibles = [];

$reservasUsuario = [];

if (auth()->check()) {

    $reservasUsuario = Reserva::where('user_id', auth()->id())
        ->where('teacher', $teacher['display_name'])
        ->pluck('horario')
        ->toArray();

}

foreach (explode("\n", $teacher['orary']) as $linea) {

    if (!preg_match('/(.*?)\s(\d{1,2}:\d{2})\s-\s(\d{1,2}:\d{2})/', trim($linea), $m)) {
        continue;
    }

    $dia = trim($m[1]);
    $inicio = $m[2];
    $fin = $m[3];

    $fecha = Carbon::now()->next($dias[$dia]);

    $horaInicio = Carbon::parse($fecha->format('Y-m-d').' '.$inicio);
    $horaFin = Carbon::parse($fecha->format('Y-m-d').' '.$fin);

    while ($horaInicio->copy()->addMinutes(80)->lte($horaFin)) {

        $textoHorario =
    ucfirst($fecha->translatedFormat('l d \d\e F'))
    .' '
    .$horaInicio->format('H:i')
    .' - '
    .$horaInicio->copy()->addMinutes(80)->format('H:i');

$yaReservado = Reserva::where('teacher', $teacher['display_name'])
    ->where('horario', $textoHorario)
    ->exists();

$yaReservadoPorMi = in_array($textoHorario, $reservasUsuario);

if (!$yaReservado && !$yaReservadoPorMi) {

    $horariosDisponibles[] = [
        'texto' => $textoHorario
    ];

}

        $horaInicio->addMinutes(90);
    }
}
   $reservasGlobales = session()->get('reservas_globales', []);

$horariosDisponibles = array_values($horariosDisponibles);

return view('profesores.show', compact(
    'teacher',
    'horariosDisponibles'
));

} // <-- Cierra el método show()

public function store(Request $request)
{
    $request->validate([
        'teacher' => 'required',
    ]);

    $existeReserva = Reserva::where('teacher', $request->teacher)
        ->where('horario', $request->horario)
        ->exists();

    if ($existeReserva) {
        return redirect()
            ->back()
            ->with('error', 'Ese horario ya fue reservado');
    }

    $reserva = Reserva::create([
    'user_id' => auth()->id(),
    'teacher' => $request->teacher,
    'materia' => $request->materia,
    'horario' => $request->horario,
]);


Mail::to(auth()->user()->email)
    ->send(new ReservaConfirmadaMail($reserva));
}

public function comunicacion()
{
    $reservas = Reserva::with('alumno')
        ->where('teacher', auth()->user()->name)
        ->orderBy('created_at')
        ->get();

    return view('comunicacion.comunic', compact('reservas'));
}
public function responderReserva(Request $request)
{
    $request->validate([
        'reserva_id' => 'required|exists:reservas,id',
        'tipo_reunion' => 'required',
        'mensaje_profesor' => 'required'
    ]);

    $reserva = Reserva::findOrFail($request->reserva_id);

    $reserva->tipo_reunion = $request->tipo_reunion;
    $reserva->mensaje_profesor = $request->mensaje_profesor;
    $reserva->estado = 'Confirmada';

    $reserva->save();

Mail::to($reserva->alumno->email)
    ->send(new RespuestaProfesorMail($reserva));

return redirect()
    ->back()
    ->with('success', 'Respuesta enviada correctamente.');
}

public function inicioProfesor()
{
    $clases = Reserva::with('alumno')
        ->where('teacher', auth()->user()->name)
        ->where('estado', 'Confirmada')
        ->latest()
        ->get();

$totalMateriales = Material::count();

$materiales = Material::orderBy('material_id', 'desc')
    ->take(5)
    ->get();

return view('profesor.inicio', compact(
    'clases',
    'materiales',
    'totalMateriales'
));


    return view('profesor.inicio', compact(
        'clases',
        'materiales'
    ));
}
}

