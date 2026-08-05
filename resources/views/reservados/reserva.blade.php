<x-layout>
<div class="container">
    <h2 class="mb-4 text-center">Profesores Reservados</h2>


    @if($reservas->where('estado','Confirmada')->count())

<div class="alert alert-success">

    🔔 Tienes una nueva respuesta de uno de tus profesores.

</div>

@endif
    @forelse($reservas as $reserva)
        <div class="card mb-3 shadow-sm mx-auto" style="max-width: 400px;">
            <div class="card-body text-center">

    <h4>{{ $reserva->teacher }}</h4>

    <p class="text-muted">
        Materia: {{ $reserva->materia }}
    </p>

    <p>
        Horario: {{ $reserva->horario }}
    </p>

    @if($reserva->estado == 'Pendiente')

        <div class="alert alert-warning mt-3">

            Esperando respuesta del profesor...

        </div>

    @elseif($reserva->estado == 'Confirmada')

        <div class="alert alert-success mt-3">

            <h5>✅ El profesor confirmó la reunión</h5>

            <hr>

            <strong>Tipo de reunión:</strong>

            {{ $reserva->tipo_reunion }}

            <br><br>

            <strong>Información enviada:</strong>

            <br>

            {{ $reserva->mensaje_profesor }}

        </div>

    @endif

</div>
    @empty
        <div class="alert alert-success mx-auto" style="max-width: 400px;">
            No tienes profesores reservados aún.
        </div>
    @endforelse

</div>

</x-layout>
