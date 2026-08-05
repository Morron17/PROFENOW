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

    <h1 class="mb-4">
        Bienvenido <?php echo e(auth()->user()->name); ?>

    </h1>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

                    <h4>Clases confirmadas</h4>

                    <h2><?php echo e($clases->count()); ?></h2>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

<h4>Materiales publicados</h4>

<h2><?php echo e($totalMateriales); ?></h2>

          </div>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <h3>Próximas clases</h3>

    <?php $__empty_1 = true; $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="card mb-3">
            <div class="card-body">

                <strong><?php echo e($clase->horario); ?></strong><br>

                Alumno:
                <?php echo e($clase->alumno->name); ?>


            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <p>No tienes clases confirmadas.</p>

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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/profesor/inicio.blade.php ENDPATH**/ ?>