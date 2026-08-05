<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="container">
    <h2 class="mb-4 text-center">Profesores Reservados</h2>


    <?php if($reservas->where('estado','Confirmada')->count()): ?>

<div class="alert alert-success">

    🔔 Tienes una nueva respuesta de uno de tus profesores.

</div>

<?php endif; ?>
    <?php $__empty_1 = true; $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-3 shadow-sm mx-auto" style="max-width: 400px;">
            <div class="card-body text-center">

    <h4><?php echo e($reserva->teacher); ?></h4>

    <p class="text-muted">
        Materia: <?php echo e($reserva->materia); ?>

    </p>

    <p>
        Horario: <?php echo e($reserva->horario); ?>

    </p>

    <?php if($reserva->estado == 'Pendiente'): ?>

        <div class="alert alert-warning mt-3">

            Esperando respuesta del profesor...

        </div>

    <?php elseif($reserva->estado == 'Confirmada'): ?>

        <div class="alert alert-success mt-3">

            <h5>✅ El profesor confirmó la reunión</h5>

            <hr>

            <strong>Tipo de reunión:</strong>

            <?php echo e($reserva->tipo_reunion); ?>


            <br><br>

            <strong>Información enviada:</strong>

            <br>

            <?php echo e($reserva->mensaje_profesor); ?>


        </div>

    <?php endif; ?>

</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-success mx-auto" style="max-width: 400px;">
            No tienes profesores reservados aún.
        </div>
    <?php endif; ?>

</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/reservados/reserva.blade.php ENDPATH**/ ?>