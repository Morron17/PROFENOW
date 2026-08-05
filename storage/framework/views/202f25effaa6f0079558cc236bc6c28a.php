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


    
    <h1 class="text-center mb-4"><?php echo e($material->titulo); ?></h1>

    <div class="d-flex justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm p-4 text-center">

                <p><strong>ID:</strong> <?php echo e($material->material_id); ?></p>
                <p><strong>Fecha:</strong> <?php echo e(date('d/m/Y', strtotime($material->fecha))); ?></p>

                <div class="mb-3">
                    <strong>Contenido:</strong>
                    <p class="mt-2"><?php echo e($material->contenido); ?></p>
                </div>


<div class="mb-4">

<?php
    if (str_starts_with($material->archivo, 'materiales/')) {
        $archivo = asset('storage/' . $material->archivo);
    } else {
        $archivo = asset('img/' . $material->archivo);
    }

    $extension = strtolower(pathinfo($material->archivo, PATHINFO_EXTENSION));
?>


    <?php if(in_array($extension, ['jpg','jpeg','png','gif','webp'])): ?>

        <img src="<?php echo e($archivo); ?>"
             alt="Imagen del material"
             class="img-fluid rounded shadow mx-auto d-block"
             style="max-width: 400px;">


    <?php elseif($extension === 'pdf'): ?>

<iframe
    src="<?php echo e($archivo); ?>"
    width="100%"
    height="500px">
</iframe>


    <?php elseif(in_array($extension, ['mp4','webm','ogg','mov'])): ?>

        <video controls
               style="width:100%;"
               class="rounded shadow">

            <source src="<?php echo e($archivo); ?>">

        </video>


    <?php else: ?>

        <div class="text-center">

            <p>
                Este archivo no puede visualizarse directamente.
            </p>

            <a href="<?php echo e($archivo); ?>"
               target="_blank"
               class="btn btn-primary">

                Abrir archivo

            </a>

        </div>

    <?php endif; ?>

</div>

                <div>
                    <a href="<?php echo e(route('materiales.index')); ?>" class="btn btn-primary me-2">Volver</a>
                    <a href="<?php echo e(route('materiales.edit', $material->material_id)); ?>" class="btn btn-primary">Editar</a>
                </div>

            </div>

        </div>
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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/materiales/show.blade.php ENDPATH**/ ?>