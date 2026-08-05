<x-layout>

<div class="container">

    <h1 class="mb-4">
        Bienvenido {{ auth()->user()->name }}
    </h1>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

                    <h4>Clases confirmadas</h4>

                    <h2>{{ $clases->count() }}</h2>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

<h4>Materiales publicados</h4>

<h2>{{ $totalMateriales }}</h2>

          </div>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <h3>Próximas clases</h3>

    @forelse($clases as $clase)

        <div class="card mb-3">
            <div class="card-body">

                <strong>{{ $clase->horario }}</strong><br>

                Alumno:
                {{ $clase->alumno->name }}

            </div>
        </div>

    @empty

        <p>No tienes clases confirmadas.</p>

    @endforelse

</div>

</x-layout>
