<x-layout>
    <div class="container text-center">
        <h1>Buscar material</h1>
    </div>

    <!-- Select de materias -->
<form id="filterForm" class="text-center mb-3 d-flex justify-content-center align-items-center">
    <!-- Select más largo -->
    <select name="subject" id="subjectSelect" class="form-select rounded-0 me-2" style="width: 600px;">
        <option value="">Todas las materias</option>
        <option value="Matemáticas">Matemáticas</option>
        <option value="Historia">Historia</option>
        <option value="Biología">Biología</option>
        <option value="Literatura">Literatura</option>
        <option value="Geografía">Geografía</option>
        <option value="Ingles">Ingles</option>
    </select>

    <!-- Botón Buscar sin cambios -->
    <button type="submit" class="btn btn-primary">
        Buscar
    </button>
</form>

    <!-- Contenedor de materiales -->
    <div class="row justify-content-center" id="materialsContainer">
        @foreach ($materiales as $material)
@php
    if (str_starts_with($material->archivo, 'materiales/')) {
        $rutaArchivo = asset('storage/' . $material->archivo);
    } else {
        $rutaArchivo = asset('img/' . $material->archivo);
    }
@endphp
            <div class="col-md-6 col-lg-4 mb-4 material-card" data-materia="{{ $material->materia }}">
                <div class="card shadow h-100">
                    @if ($material->tipo === 'imagen')
                        <img src="{{ $rutaArchivo }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                    @elseif ($material->tipo === 'PDF')
                        <iframe src="{{ $rutaArchivo }}" style="height: 250px; width: 100%; object-fit: cover;"></iframe>
                    @elseif ($material->tipo === 'video')
                        <video controls style="height: 250px; width: 100%; object-fit: cover;">
                            <source src="{{ $rutaArchivo }}">
                        </video>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $material->titulo }}</h5>
                        <p class="card-text text-muted mb-1">{{ date('d/m/Y', strtotime($material->fecha)) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $material->materia }}</small></p>
                        <p class="card-text">{{ Str::limit($material->contenido, 120) }}</p>

                        <a href="#" class="mt-auto text-decoration-none text-primary" data-bs-toggle="modal" data-bs-target="#blogModal{{ $material->material_id }}">
                            Ver material
                        </a>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="blogModal{{ $material->material_id }}" tabindex="-1" aria-labelledby="modalLabel{{ $material->material_id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="modalLabel{{ $material->material_id }}">{{ $material->titulo }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            @if ($material->tipo === 'imagen')
                                <img src="{{ $rutaArchivo }}" class="img-fluid mb-3" style="border-radius: 8px;">
                            @elseif ($material->tipo === 'PDF')
                                <iframe src="{{ $rutaArchivo }}" style="width: 100%; height: 400px;" class="mb-3"></iframe>
                            @elseif ($material->tipo === 'video')
                                <video controls style="width: 100%; height: auto;" class="mb-3 mx-auto d-block">
                                    <source src="{{ $rutaArchivo }}">
                                </video>
                            @endif

                            <a href="{{ $rutaArchivo }}" download class="btn btn-primary mb-3">Descargar archivo</a>

                            <p class="text-muted mb-1">{{ date('d/m/Y', strtotime($material->fecha)) }} — {{ $material->materia }}</p>
                            <p class="text-center">{{ $material->contenido }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- JS para filtrar materiales en la misma página --}}
    <script>
        const filterForm = document.getElementById('filterForm');
        const materialsContainer = document.getElementById('materialsContainer');
        const materialCards = Array.from(materialsContainer.getElementsByClassName('material-card'));

        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const selected = document.getElementById('subjectSelect').value;

            materialCards.forEach(card => {
                const materia = card.getAttribute('data-materia');
                if (!selected || materia === selected) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

</x-layout>
