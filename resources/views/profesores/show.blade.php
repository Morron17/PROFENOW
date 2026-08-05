<x-layout>
@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = new bootstrap.Modal(document.getElementById('noDisponibleModal'));
    modal.show();
});
</script>
@endif

<div class="container">
    <div class="card mx-auto shadow-lg" style="max-width: 300px;">
        <img src="{{ asset('img/' . $teacher['img']) }}"
             class="card-img-top"
             alt="{{ $teacher['display_name'] }}">

        <div class="card-body text-center">

            <h2 class="card-title">{{ $teacher['display_name'] }}</h2>
            <p class="text-muted">Materia: {{ $teacher['subject'] }}</p>
            <p>{{ $teacher['bio'] }}</p>
            <p>Horario: {!! nl2br(e($teacher['orary'])) !!}</p>

            <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                Volver
            </a>

@auth

        <button class="btn btn-primary mt-3"
        data-bs-toggle="modal"
        data-bs-target="#horariosModal">
    Reservar
</button>

@endauth

        </div>
    </div>
</div>

<div class="modal fade" id="horariosModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Seleccioná un horario
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

@foreach($horariosDisponibles as $horario)

<button
    class="btn btn-outline-primary w-100 mb-2 horario-btn"
    data-horario="{{ $horario['texto'] }}">

    {{ $horario['texto'] }}

</button>

@endforeach

            </div>

        </div>
    </div>
</div>

@auth
    @if(auth()->user()->hasRole('Alumno'))
        <!-- Modal de pago -->
        <div class="modal fade" id="pagoModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
<div class="text-center mt-3">
    <h5>Horario seleccionado</h5>

    <p class="fw-bold text-primary mb-3" id="horarioTexto"></p>
</div>

    <div class="modal-body text-center">
    <p>Total: <strong>$25.000</strong></p>
</div>

<div class="modal-footer justify-content-center">
    <form id="formReserva"
      action="{{ route('guardar.reserva') }}"
      method="POST"
      class="w-100">
    @csrf

    <input
    type="hidden"
    name="teacher"
    value="{{ $teacher['display_name'] }}">
    <input type="hidden" name="materia" value="{{ $teacher['subject'] }}">
    <input type="hidden"
       name="horario"
       id="horarioSeleccionado">

<div class="d-flex justify-content-center gap-3 mt-4">

    <button
        type="button"
        class="btn btn-secondary"
        id="volverHorarios">
        Volver
    </button>

    <button
        type="submit"
        class="btn btn-success">
        Transferir
    </button>

</div>
</form>
                    </div>

                </div>
            </div>
        </div>

<div class="modal fade" id="noDisponibleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">

            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    Profesor no disponible
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body text-center">

                <p>
                    Este profesor ya fue reservado por otro usuario.
                </p>


                <p class="text-muted mt-2">
                    Intenta reservar otro profesor.
                </p>

            </div>

            <div class="modal-footer justify-content-center">

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Entendido
                </button>

            </div>

        </div>
    </div>
</div>
    @endif
@endauth


@if(session('profesor_ocupado'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    var modal = new bootstrap.Modal(
        document.getElementById('noDisponibleModal')
    );

    modal.show();

});

</script>

@endif
</script>

<script>

document.querySelectorAll('.horario-btn').forEach(function(btn){

    btn.addEventListener('click',function(){

        let horario = this.dataset.horario;

        document.getElementById('horarioSeleccionado').value = horario;
        document.getElementById('horarioTexto').innerText = horario;

        bootstrap.Modal.getInstance(
            document.getElementById('horariosModal')
        ).hide();

        new bootstrap.Modal(
            document.getElementById('pagoModal')
        ).show();

    });

});

document.getElementById('volverHorarios').addEventListener('click',function(){

    bootstrap.Modal.getInstance(
        document.getElementById('pagoModal')
    ).hide();

    new bootstrap.Modal(
        document.getElementById('horariosModal')
    ).show();

});

</script>
</x-layout>
