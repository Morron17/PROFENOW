<x-layout>
        <h1 class="text-center mb-4">Crear nuevo material</h1>
    <div class="container form-box" style="max-width: 600px;">

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materiales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Título</label>
                <input
        type="text"
        class="form-control"
        name="titulo"
        id="titulo"
        placeholder="Titulo" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <input
        type="text"
        class="form-control"
        name="contenido"
        id="contenido"
        placeholder="Contenido" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Archivo (imagen, PDF o video)</label>
                <input type="file" name="archivo" class="form-control"
                    accept="image/*,application/pdf,video/*" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Materia</label>
<select name="materia" id="materia" class="form-control" required>
        <option value="">Seleccione una materia</option>
        <option value="Matematica">Matemática</option>
        <option value="Historia">Historia</option>
        <option value="Biologia">Biología</option>
        <option value="Ingles">Ingles</option>
        <option value="Lengua">Lengua</option>
        <option value="Geografia">Geografía</option>
        <option value="Filosofia">Filosofía</option>
        <option value="Literatura">Literatura</option>
    </select>

            </div>

            <div class="text-center">
                <button class="btn btn-primary mb-3">Publicar</button>
                <a href="{{ route('materiales.index') }}" class="btn btn-primary mb-3">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout>
