<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('img/logo-sin.jpg')); ?>" type="image/jpg">
    <title>PROFENOW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>

<?php if(auth()->guard()->check()): ?>
<div class="modal fade" id="editarPerfilModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Editar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="<?php echo e(route('perfil.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="modal-body">

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="name"
                       value="<?php echo e(auth()->user()->name); ?>"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="<?php echo e(auth()->user()->email); ?>"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Nueva contraseña</label>
                <input type="password"
                       name="password"
                       class="form-control">
            </div>

            <?php if(auth()->user()->hasRole('Profesor')): ?>

<hr>

           <div class="mb-3">
             <label>Materia</label>
             <select name="materia" class="form-select">
              <option value="Matemáticas" <?php echo e(auth()->user()->materia == 'Matemáticas' ? 'selected' : ''); ?>>Matemáticas</option>
              <option value="Historia" <?php echo e(auth()->user()->materia == 'Historia' ? 'selected' : ''); ?>>Historia</option>
              <option value="Biología" <?php echo e(auth()->user()->materia == 'Biología' ? 'selected' : ''); ?>>Biología</option>
              <option value="Ingles" <?php echo e(auth()->user()->materia == 'Ingles' ? 'selected' : ''); ?>>Ingles</option>
              <option value="Lengua" <?php echo e(auth()->user()->materia == 'Lengua' ? 'selected' : ''); ?>>Lengua</option>
              <option value="Geografía" <?php echo e(auth()->user()->materia == 'Geografía' ? 'selected' : ''); ?>>Geografía</option>
              <option value="Filosofía" <?php echo e(auth()->user()->materia == 'Filosofía' ? 'selected' : ''); ?>>Filosofía</option>
             </select>
            </div>

            <div class="mb-3">
              <label>Horario</label>
            <textarea
               name="horario"
               rows="5"
               class="form-control"><?php echo e(auth()->user()->horario); ?></textarea>

            </div>

            <div class="mb-3">
            <label>Foto de perfil</label>

    <?php if(auth()->user()->foto): ?>
        <div class="mb-2">
            <img
                src="<?php echo e(asset('img/profesores/'.auth()->user()->foto)); ?>"
                width="120"
                class="rounded border">
        </div>
    <?php endif; ?>

    <input
        type="file"
        name="foto"
        class="form-control"
        accept=".jpg,.jpeg,.png,.webp">
        </div>

<?php endif; ?>
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
<?php endif; ?>


<nav class="navbar navbar-expand-lg navbar-light navbar-image border-bottom shadow-sm">

    <div class="container">

        <a class="navbar-brand d-flex " href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('img/logo.jpg')); ?>" alt="Logo de la App">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
           <ul class="navbar-nav gap-3">

<?php if(auth()->guard()->check()): ?>

    <?php if(auth()->user()->hasRole('Profesor')): ?>

        <li class="nav-item">
            <a href="<?php echo e(route('profesor.inicio')); ?>" class="nav-link">
                Inicio
            </a>
        </li>

    <?php else: ?>

        <li class="nav-item">
            <a href="<?php echo e(route('home')); ?>" class="nav-link">
                Inicio
            </a>
        </li>

    <?php endif; ?>

<?php endif; ?>

        <li class="nav-item">
            <a href="<?php echo e(route('materiales')); ?>" class="nav-link">Materiales</a>
        </li>

<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->hasRole('Alumno')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('reserva')); ?>" class="nav-link">
                Profesores reservados
            </a>
        </li>
    <?php endif; ?>
<?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->hasRole('Profesor')): ?>
                <!-- Subir material -->
                <li class="nav-item">
                    <a href="<?php echo e(route('materiales.index')); ?>" class="nav-link">Subir material</a>
                </li>

                <li class="nav-item">
    <a href="<?php echo e(route('comunicacion')); ?>" class="nav-link">
        Comunicación con alumnos
    </a>
</li>
            <?php endif; ?>

                    <li class="nav-item perfil-item d-flex align-items-center mx-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editarPerfilModal">
                            <img src="<?php echo e(asset('img/perfil.jpg')); ?>"
                                 alt="Editar perfil"
                                 width="35"
                                 height="35"
                                 class="rounded-circle border">
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="<?php echo e(route('auth.logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="nav-link">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df = $attributes; } ?>
<?php $component = App\View\Components\NavLink::resolve(['route' => 'login'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'nav-link']); ?>Iniciar sesión <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $attributes = $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $component = $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df = $attributes; } ?>
<?php $component = App\View\Components\NavLink::resolve(['route' => 'auth.register'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'nav-link']); ?>Registrarse <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $attributes = $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $component = $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>


<div class="container py-4">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php echo e($slot); ?>

</div>


<footer class="footer text-bg-dark text-center">
    <p>PROFENOW &copy; 2026</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php if($errors->any()): ?>
<script>
    var myModal = new bootstrap.Modal(document.getElementById('editarPerfilModal'));
    myModal.show();
</script>
<?php endif; ?>

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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/components/layout.blade.php ENDPATH**/ ?>