<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo-sin.jpg') }}" type="image/jpg">
    <title>PROFENOW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@auth
<div class="modal fade" id="editarPerfilModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Editar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-body">

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="name"
                       value="{{ auth()->user()->name }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="{{ auth()->user()->email }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Nueva contraseña</label>
                <input type="password"
                       name="password"
                       class="form-control">
            </div>

            @if(auth()->user()->hasRole('Profesor'))

<hr>

           <div class="mb-3">
             <label>Materia</label>
             <select name="materia" class="form-select">
              <option value="Matemáticas" {{ auth()->user()->materia == 'Matemáticas' ? 'selected' : '' }}>Matemáticas</option>
              <option value="Historia" {{ auth()->user()->materia == 'Historia' ? 'selected' : '' }}>Historia</option>
              <option value="Biología" {{ auth()->user()->materia == 'Biología' ? 'selected' : '' }}>Biología</option>
              <option value="Ingles" {{ auth()->user()->materia == 'Ingles' ? 'selected' : '' }}>Ingles</option>
              <option value="Lengua" {{ auth()->user()->materia == 'Lengua' ? 'selected' : '' }}>Lengua</option>
              <option value="Geografía" {{ auth()->user()->materia == 'Geografía' ? 'selected' : '' }}>Geografía</option>
              <option value="Filosofía" {{ auth()->user()->materia == 'Filosofía' ? 'selected' : '' }}>Filosofía</option>
             </select>
            </div>

            <div class="mb-3">
              <label>Horario</label>
            <textarea
               name="horario"
               rows="5"
               class="form-control">{{ auth()->user()->horario }}</textarea>

            </div>

            <div class="mb-3">
            <label>Foto de perfil</label>

    @if(auth()->user()->foto)
        <div class="mb-2">
            <img
                src="{{ asset('img/profesores/'.auth()->user()->foto) }}"
                width="120"
                class="rounded border">
        </div>
    @endif

    <input
        type="file"
        name="foto"
        class="form-control"
        accept=".jpg,.jpeg,.png,.webp">
        </div>

@endif
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary">
            Guardar cambios
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
@endauth


<nav class="navbar navbar-expand-lg navbar-light navbar-image border-bottom shadow-sm">

    <div class="container">

        <a class="navbar-brand d-flex " href="{{ url('/') }}">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo de la App">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
           <ul class="navbar-nav gap-3">

@auth

    @if(auth()->user()->hasRole('Profesor'))

        <li class="nav-item">
            <a href="{{ route('profesor.inicio') }}" class="nav-link">
                Inicio
            </a>
        </li>

    @else

        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                Inicio
            </a>
        </li>

    @endif

@endauth

        <li class="nav-item">
            <a href="{{ route('materiales') }}" class="nav-link">Materiales</a>
        </li>

@auth
    @if(auth()->user()->hasRole('Alumno'))
        <li class="nav-item">
            <a href="{{ route('reserva') }}" class="nav-link">
                Profesores reservados
            </a>
        </li>
    @endif
@endauth

        @auth
            @if(auth()->user()->hasRole('Profesor'))
                <!-- Subir material -->
                <li class="nav-item">
                    <a href="{{ route('materiales.index') }}" class="nav-link">Subir material</a>
                </li>

                <li class="nav-item">
    <a href="{{ route('comunicacion') }}" class="nav-link">
        Comunicación con alumnos
    </a>
</li>
            @endif

                    <li class="nav-item perfil-item d-flex align-items-center mx-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editarPerfilModal">
                            <img src="{{ asset('img/perfil.jpg') }}"
                                 alt="Editar perfil"
                                 width="35"
                                 height="35"
                                 class="rounded-circle border">
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <x-nav-link route="login" class="nav-link">Iniciar sesión</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link route="auth.register" class="nav-link">Registrarse</x-nav-link>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>


<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{ $slot }}
</div>


<footer class="footer text-bg-dark text-center">
    <p>PROFENOW &copy; 2026</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@if ($errors->any())
<script>
    var myModal = new bootstrap.Modal(document.getElementById('editarPerfilModal'));
    myModal.show();
</script>
@endif

<script>

window.addEventListener('load', function () {

    document.getElementById('loader').classList.add('hidden');

});

</script>

<div id="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Cargando...</span>
    </div>

    <p class="mt-3 fw-bold">Cargando...</p>
</div>

</body>
</html>
