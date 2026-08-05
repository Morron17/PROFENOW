<x-layout>

<div class="container text-center">
    <h1>Buscar profesores</h1>

<form action="{{ route('home') }}" method="GET" class="mb-4 d-flex justify-content-center align-items-center">

    <div class="d-flex w-75">

        <!-- Barra de búsqueda -->
        <div class="flex-fill me-2">
            <input type="text"
                   name="q"
                   value="{{ request('q') }}"
                   placeholder="Buscar por nombre..."
                   class="form-control rounded-0">
        </div>


        <div class="flex-fill me-2">
            <select name="subject" class="form-select rounded-0">
                <option value="">Todas las materias</option>
                <option value="Matemáticas" {{ request('subject') == 'Matemáticas' ? 'selected' : '' }}>Matemáticas</option>
                <option value="Historia" {{ request('subject') == 'Historia' ? 'selected' : '' }}>Historia</option>
                <option value="Biología" {{ request('subject') == 'Biología' ? 'selected' : '' }}>Biología</option>
                <option value="Ingles" {{ request('subject') == 'Ingles' ? 'selected' : '' }}>Ingles</option>
                <option value="Lengua" {{ request('subject') == 'Lengua' ? 'selected' : '' }}>Lengua</option>
                <option value="Geografía" {{ request('subject') == 'Geografía' ? 'selected' : '' }}>Geografía</option>
                <option value="Filosofía" {{ request('subject') == 'Filosofía' ? 'selected' : '' }}>Filosofía</option>
            </select>
        </div>


        <div style="width: 100px; padding-top: 3px;">
    <button
        type="submit"
        class="btn btn-primary w-100"
        style="height: 46px; line-height: 1;">
        <span style="position: relative; top: -2px;">
            Buscar
        </span>
    </button>
</div>

    </div>

</form>

    @if($teachers->isEmpty())
        <p>No se encontraron profesores.</p>
    @else

    @endif
</div>

<div class="container">
<div class="row justify-content-center">
    @foreach ($teachers as $teacher)
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
               <img src="{{ asset('img/' . $teacher['img']) }}" class="card-img-top" alt="{{ $teacher['display_name'] }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $teacher['display_name'] }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Materia: {{ $teacher['subject'] }}</li>
                    </ul>
                    <a href="{{ route('profesores.show', ['name' => $teacher['name']]) }}" class="btn btn-primary">Ver perfil</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
</div>

</x-layout>
