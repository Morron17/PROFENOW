<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo-sin.jpg" type="image/jpg">
    <title>PROFENOW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@if(session('temporaryPassword'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    if (Notification.permission === "granted") {
        new Notification("Recuperación de contraseña", {
            body: "Tu nueva contraseña es: {{ session('temporaryPassword') }}"
        });
    }
});
</script>
@endif

<body class="fondo-trama">

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white form-title">Iniciar sesión</h1>

        <div class="row justify-content-center">
            <div class="col-md-4  form-box">

<form action="{{ route('auth.authenticate') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="email">Correo electrónico</label>
        <input
            type="email"
            class="form-control"
            name="email"
            id="email"
            placeholder="Correo electrónico"
            required
        >
    </div>

    <div class="mb-3">
        <label for="password">Contraseña</label>
        <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            placeholder="Contraseña"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Ingresar
    </button>

    <div class="text-center mt-2">
        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
            ¿Olvidaste tu contraseña?
        </a>
    </div>
</form>

<div class="modal fade" id="forgotPasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Recuperar contraseña
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <p class="text-muted">
                        Te enviaremos una contraseña temporal a tu correo.
                    </p>

                    <div class="mb-3">
                        <label for="email">
                            Correo electrónico
                        </label>

                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               placeholder="Ingresa tu correo"
                               required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Enviar contraseña
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>


                <div class="text-center mt-3">
                    <a href="{{ route('auth.register') }}">¿No tenés cuenta? Registrate aquí</a>
                </div>
            </div>
        </div>
    </div>

           <footer class="footer text-bg-dark text-center">
            <p>PROFENOW &copy; 2026</p>
        </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
