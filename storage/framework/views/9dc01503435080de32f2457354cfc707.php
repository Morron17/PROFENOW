<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../img/logo-sin.jpg" type="image/jpg">
<title>PROFENOW</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const roleSelect = document.getElementById("role");
        const materiaContainer = document.getElementById("materiaContainer");
        const materiaInput = document.getElementById("materia");

        const descripcionContainer = document.getElementById("descripcionContainer");
        const descripcionInput = document.getElementById("descripcion");

        const horarioContainer = document.getElementById("horarioContainer");
        const horarioInput = document.getElementById("horario");

        const fotoContainer = document.getElementById("fotoContainer");
        const fotoInput = document.getElementById("foto");

        roleSelect.addEventListener("change", function () {

            if (this.value === "Profesor") {
                materiaContainer.style.display = "block";
                horarioContainer.style.display = "block";
                descripcionContainer.style.display = "block";
                fotoContainer.style.display = "block";

                materiaInput.setAttribute("required", "required");
                horarioInput.setAttribute("required", "required");
                descripcionInput.setAttribute("required", "required");

            } else {
                materiaContainer.style.display = "none";
                horarioContainer.style.display = "none";
                descripcionContainer.style.display = "none";

                materiaInput.removeAttribute("required");
                horarioInput.removeAttribute("required");
                descripcionInput.removeAttribute("required");
                fotoContainer.style.display = "none";


                materiaInput.value = "";
                horarioInput.value = "";
                descripcionInput.value = "";
                fotoInput.value = "";
            }
        });
    });
</script>

<body class="fondo-trama">

<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4 text-white form-title">Crear cuenta</h1>
    <div class="row justify-content-center">
    <div class="col-md-5 form-box">
    <form action="<?php echo e(route('auth.store')); ?>"
      method="POST"
      enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<div class="mb-3">
    <label for="email">Correo electrónico</label>
    <input
        type="email"
        class="form-control"
        name="email"
        id="email"
        placeholder="Correo electrónico"
        required>
</div>

<div class="mb-3">
    <label for="name">Nombre de usuario</label>
    <input
        type="text"
        class="form-control"
        name="name"
        id="name"
        placeholder="Nombre de usuario"
        required>
</div>

<div class="mb-3">
    <label for="password">Contraseña</label>
    <input
        type="password"
        class="form-control"
        name="password"
        id="password"
        placeholder="Contraseña"
        required>
</div>

<div class="mb-3">
    <label for="password_confirmation">Confirmar contraseña</label>
    <input
        type="password"
        class="form-control"
        name="password_confirmation"
        id="password_confirmation"
        placeholder="Confirmar contraseña"
        required>
</div>

<div class="mb-3">
    <label for="country">País</label>
    <input
        type="text"
        class="form-control"
        name="country"
        id="country"
        placeholder="País"
        required>
</div>

<div class="mb-3">
    <label for="birthdate">Fecha de nacimiento</label>
    <input
        type="date"
        class="form-control"
        name="birthdate"
        id="birthdate"
        required>
</div>

<div class="mb-3">
    <label for="role">Rol</label>
    <select name="role" id="role" class="form-control">
        <option value="Alumno">Alumno</option>
        <option value="Profesor">Profesor</option>
    </select>
</div>

<div class="mb-3" id="materiaContainer" style="display: none;">
    <label for="materia">Materia</label>
    <select name="materia" id="materia" class="form-control">
        <option value="">Seleccione una materia</option>
        <option value="Matematica">Matemática</option>
        <option value="Historia">Historia</option>
        <option value="Biologia">Biología</option>
        <option value="Lengua">Lengua</option>
        <option value="Ingles">Ingles</option>
        <option value="Geografia">Geografía</option>
        <option value="Filosofia">Filosofía</option>
        <option value="Literatura">Literatura</option>
    </select>
</div>

<div class="mb-3" id="descripcionContainer" style="display: none;">
    <label for="descripcion">Descripción</label>
    <input
        type="text"
        class="form-control"
        name="descripcion"
        id="descripcion"
        placeholder="Descripción">
</div>

<div class="mb-3" id="horarioContainer" style="display: none;">
    <label for="horario">Horario disponible</label>
    <input
        type="text"
        class="form-control"
        name="horario"
        id="horario"
        placeholder="Horario disponible">
</div>

<div class="mb-3" id="fotoContainer" style="display:none;">
    <label for="foto">Foto de perfil</label>

    <input
        type="file"
        class="form-control"
        name="foto"
        id="foto"
        accept="image/*">
</div>

<button type="submit" class="btn btn-primary w-100">
    Crear cuenta
</button>
</form>
<div class="text-center mt-3">
    <a href="<?php echo e(route('login')); ?>">¿Ya tenés cuenta? Iniciar sesión</a>
</div>
</div>
</div>
</div>
<footer class="footer text-bg-dark text-center py-3 w-100 mt-5">
    <p class="m-0">PROFENOW &copy; 2026</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
 </html>
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/auth/register.blade.php ENDPATH**/ ?>