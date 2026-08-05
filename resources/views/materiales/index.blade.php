<x-layout>
    <h1 class="text-center mb-4">Administrar materiales</h1>

    <div class="text-end mb-3">
        <a href="{{ route('materiales.create') }}" class="btn btn-primary">
            Crear nuevo material
        </a>
    </div>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>Título</th>
                <th>Materia</th>
                <th>Fecha</th>
                <th style="width: 90px;" class="text-center">Tipo</th>
                <th style="width: 160px;">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($materiales as $material)
                <tr>
                    <td>{{ $material->titulo }}</td>

                    <td>{{ $material->materia }}</td>

                    <td>{{ date('d/m/Y', strtotime($material->fecha)) }}</td>

                    <td class="text-center" style="width: 90px;">
    <span class="badge bg-info text-dark px-3">
        @if(strtolower($material->tipo) == 'pdf')
            PDF
        @elseif(strtolower($material->tipo) == 'imagen')
            Imagen
        @elseif(strtolower($material->tipo) == 'video')
            Video
        @else
            {{ ucfirst($material->tipo) }}
        @endif
    </span>
</td>

                    <td class="text-nowrap" style="width: 160px;">
                        <a href="{{ route('materiales.show', ['id' => $material->material_id]) }} "class="btn btn-primary">Ver</a>
                        <a href="{{ route('materiales.edit', ['id' => $material->material_id]) }} "class="btn btn-primary">Editar</a>

                        <form action="{{ route('materiales.destroy', ['id' => $material->material_id]) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                        <button
                         type="button"
                         class="btn btn-danger fw-bold px-3"
                         data-bs-toggle="modal"
                         data-bs-target="#deleteModal"
                         data-id="{{ $material->material_id }}"
                         data-nombre="{{ $material->titulo }}">
                         Eliminar
                        </button>
                        </form>

    <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <p>¿Estás seguro que quieres eliminar?:</p>
                <h5 id="materialNombre"></h5>
            </div>

            <div class="modal-footer justify-content-center">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Sí, eliminar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
var deleteModal = document.getElementById('deleteModal');

deleteModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    var id = button.getAttribute('data-id');
    var nombre = button.getAttribute('data-nombre');

    // Mostrar nombre en el modal
    document.getElementById('materialNombre').textContent = nombre;

    // Cambiar acción del formulario
    document.getElementById('deleteForm').action = '/materiales/' + id + '/eliminar';
});
</script>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
