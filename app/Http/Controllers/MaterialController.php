<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{

public function index(Request $request)
{
    $selectedSubject = $request->get('subject');
    $query = Material::orderBy('material_id', 'desc');

    if ($selectedSubject) {
        $query->where('materia', $selectedSubject);
    }

    $materiales = $query->get();

    return view('materiales.index', compact('materiales', 'selectedSubject'));
}
public function materiales(Request $request)
{
    $selectedSubject = $request->get('subject');

    $query = Material::orderBy('material_id', 'desc');

    if ($selectedSubject) {
        $query->where('materia', $selectedSubject);
    }

    $materiales = $query->get();

    return view('public.materiales', compact('materiales', 'selectedSubject'));
}
    public function create()
    {
        return view('materiales.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'materia' => 'required',
            'archivo' => 'required|mimes:jpg,jpeg,png,gif,pdf,mp4,mov,avi,wmv|max:20000',
        ]);

        $file = $request->file('archivo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('materiales', $fileName, 'public');

        $mime = $file->getMimeType();
        if (str_contains($mime, 'image')) $tipo = 'imagen';
        elseif (str_contains($mime, 'pdf')) $tipo = 'PDF';
        elseif (str_contains($mime, 'video')) $tipo = 'video';
        else $tipo = 'otro';

Material::create([
    'user_id' => auth()->id(),
    'titulo' => $request->titulo,
    'contenido' => $request->contenido,
    'materia' => $request->materia,
    'archivo' => 'materiales/' . $fileName,
    'tipo' => $tipo,
    'fecha' => now(),
]);

        return redirect()->route('materiales.index')->with('success', 'Material creado');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materiales.edit', compact('material'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'titulo' => 'required',
        'contenido' => 'required',
        'materia' => 'required',
        'archivo' => 'nullable|mimes:jpg,jpeg,png,gif,pdf,mp4,mov,avi,wmv|max:20000',
    ]);

    $material = Material::findOrFail($id);

    $data = [
        'titulo' => $request->titulo,
        'contenido' => $request->contenido,
        'materia' => $request->materia,
    ];

    // Si seleccionó un archivo nuevo
    if ($request->hasFile('archivo')) {

        $file = $request->file('archivo');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        // Guarda el nuevo archivo
        $file->storeAs('materiales', $fileName, 'public');


        // Detectar tipo nuevo
        $mime = $file->getMimeType();

        if (str_contains($mime, 'image')) {
            $tipo = 'imagen';
        } elseif (str_contains($mime, 'pdf')) {
            $tipo = 'PDF';
        } elseif (str_contains($mime, 'video')) {
            $tipo = 'video';
        } else {
            $tipo = 'archivo';
        }


        // Actualizar datos del archivo
        $data['archivo'] = 'materiales/' . $fileName;
        $data['tipo'] = $tipo;
    }


    $material->update($data);

    return redirect()
        ->route('materiales.index')
        ->with('success', 'Material actualizado correctamente');
}
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('materiales.index')->with('success', 'Material eliminado');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('materiales.show', compact('material'));
    }
}
