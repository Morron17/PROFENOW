<x-layout>

<div class="container mt-4">

    <h2 class="mb-4">
        Comunicación con alumnos
    </h2>

    @if($reservas->isEmpty())

        <div class="alert alert-secondary text-center">

            <h5>Sin clases solicitadas</h5>

            <p class="mb-0">
                Todavía ningún alumno reservó una clase.
            </p>

        </div>

    @else

        @foreach($reservas as $reserva)

<div class="card shadow-sm mb-3 mx-auto" style="max-width: 600px;">

    <div class="card-body">

        <h5 class="card-title">
            {{ $reserva->alumno->name }}
        </h5>

        <p>
            <strong>Materia:</strong>
            {{ $reserva->materia }}
        </p>

        <p>
            <strong>Fecha y horario:</strong>
            {{ $reserva->horario }}
        </p>


        <p>
            <strong>Estado:</strong>
            {{ $reserva->estado }}
        </p>

<div class="text-center mt-2">
    <button
        class="btn btn-primary"
        style="width: 200px;"
        data-bs-toggle="modal"
        data-bs-target="#modal{{ $reserva->id }}">
        Responder
    </button>
</div>

    </div>

</div>
            </div>

            <div class="modal fade"
     id="modal{{ $reserva->id }}"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('responder.reserva') }}"
                  method="POST">

                @csrf

                <input
                    type="hidden"
                    name="reserva_id"
                    value="{{ $reserva->id }}">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Responder al alumno

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <p>

                        <strong>Alumno:</strong>

                        {{ $reserva->alumno->name }}

                    </p>

                    <p>

                        <strong>Horario:</strong>

                        {{ $reserva->horario }}

                    </p>

                    <label class="form-label">

                        Tipo de reunión

                    </label>

                    <select
                        name="tipo_reunion"
                        class="form-select mb-3">

                        <option value="Virtual">

                            Virtual (Google Meet)

                        </option>

                        <option value="Presencial">

                            Presencial

                        </option>

                    </select>

                    <label class="form-label">

                        Mensaje

                    </label>

                    <textarea
                        class="form-control"
                        rows="5"
                        name="mensaje_profesor"
                        placeholder="Pegá el link de Meet o escribí la dirección..."></textarea>

                </div>

                <div class="modal-footer">

                    <button
                        class="btn btn-success">

                        Enviar respuesta

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
        @endforeach

    @endif

</div>

</x-layout>
