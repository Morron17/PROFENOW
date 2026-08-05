<x-layout>


    {{-- TÍTULO SEPARADO ARRIBA --}}
    <h1 class="text-center mb-4">{{ $material->titulo }}</h1>

    <div class="d-flex justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm p-4 text-center">

                <p><strong>ID:</strong> {{ $material->material_id }}</p>
                <p><strong>Fecha:</strong> {{ date('d/m/Y', strtotime($material->fecha)) }}</p>

                <div class="mb-3">
                    <strong>Contenido:</strong>
                    <p class="mt-2">{{ $material->contenido }}</p>
                </div>

{{-- MOSTRAR ARCHIVO --}}
<div class="mb-4">

@php
    if (str_starts_with($material->archivo, 'materiales/')) {
        $archivo = asset('storage/' . $material->archivo);
    } else {
        $archivo = asset('img/' . $material->archivo);
    }

    $extension = strtolower(pathinfo($material->archivo, PATHINFO_EXTENSION));
@endphp


    @if(in_array($extension, ['jpg','jpeg','png','gif','webp']))

        <img src="{{ $archivo }}"
             alt="Imagen del material"
             class="img-fluid rounded shadow mx-auto d-block"
             style="max-width: 400px;">


    @elseif($extension === 'pdf')

<iframe
    src="{{ $archivo }}"
    width="100%"
    height="500px">
</iframe>


    @elseif(in_array($extension, ['mp4','webm','ogg','mov']))

        <video controls
               style="width:100%;"
               class="rounded shadow">

            <source src="{{ $archivo }}">

        </video>


    @else

        <div class="text-center">

            <p>
                Este archivo no puede visualizarse directamente.
            </p>

            <a href="{{ $archivo }}"
               target="_blank"
               class="btn btn-primary">

                Abrir archivo

            </a>

        </div>

    @endif

</div>

                <div>
                    <a href="{{ route('materiales.index') }}" class="btn btn-primary me-2">Volver</a>
                    <a href="{{ route('materiales.edit', $material->material_id) }}" class="btn btn-primary">Editar</a>
                </div>

            </div>

        </div>
    </div>

</x-layout>
