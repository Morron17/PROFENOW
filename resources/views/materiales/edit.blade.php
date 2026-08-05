<x-layout>
    @php
    if (str_starts_with($material->archivo, 'materiales/')) {
        $rutaArchivo = asset('storage/' . $material->archivo);
    } else {
        $rutaArchivo = asset('img/' . $material->archivo);
    }
@endphp

     <div class="container" style="max-width: 600px;">
    <h1 class="text-center mb-4">Editar Material</h1>

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materiales.update', ['id' => $material->material_id]) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-4 shadow rounded"
          style="max-width: 600px; margin: 0 auto;">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text"
                   name="titulo"
                   class="form-control"
                   value="{{ $material->titulo }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="contenido"
                      class="form-control"
                      rows="5"
                      required>{{ $material->contenido }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Materia</label>
            <input type="text"
                   name="materia"
                   class="form-control"
                   value="{{ $material->materia }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Archivo actual</label><br>

            <div class="text-center mb-2">
               @if ($material->tipo === 'imagen')
    <img src="{{ $rutaArchivo }}"
         style="max-height:150px">

@elseif ($material->tipo === 'pdf')
   <iframe src="{{ $rutaArchivo }}"
            style="width:100%;height:200px">
    </iframe>

@elseif ($material->tipo === 'video')
    <video controls style="max-height:180px;width:100%">
        <source src="{{ $rutaArchivo }}">
    </video>
@endif
            </div>

            <input type="file"
                   name="archivo"
                   class="form-control mt-2"
                   accept="image/*,application/pdf,video/*">
            <small class="text-muted">Puedes subir un archivo nuevo para reemplazar el actual.</small>
        </div>

        <div class="text-center">
            <button class="btn btn-primary mb-3">Actualizar</button>
            <a href="{{ route('materiales.index') }}" class="btn btn-primary mb-3">Cancelar</a>
        </div>

    </div>
    </form>
</x-layout>
