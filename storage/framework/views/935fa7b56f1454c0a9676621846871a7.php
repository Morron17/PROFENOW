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
    <?php
    if (str_starts_with($material->archivo, 'materiales/')) {
        $rutaArchivo = asset('storage/' . $material->archivo);
    } else {
        $rutaArchivo = asset('img/' . $material->archivo);
    }
?>

     <div class="container" style="max-width: 600px;">
    <h1 class="text-center mb-4">Editar Material</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger text-center">
            <ul class="mb-0 list-unstyled">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>• <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('materiales.update', ['id' => $material->material_id])); ?>"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-4 shadow rounded"
          style="max-width: 600px; margin: 0 auto;">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text"
                   name="titulo"
                   class="form-control"
                   value="<?php echo e($material->titulo); ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="contenido"
                      class="form-control"
                      rows="5"
                      required><?php echo e($material->contenido); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Materia</label>
            <input type="text"
                   name="materia"
                   class="form-control"
                   value="<?php echo e($material->materia); ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Archivo actual</label><br>

            <div class="text-center mb-2">
               <?php if($material->tipo === 'imagen'): ?>
    <img src="<?php echo e($rutaArchivo); ?>"
         style="max-height:150px">

<?php elseif($material->tipo === 'pdf'): ?>
   <iframe src="<?php echo e($rutaArchivo); ?>"
            style="width:100%;height:200px">
    </iframe>

<?php elseif($material->tipo === 'video'): ?>
    <video controls style="max-height:180px;width:100%">
        <source src="<?php echo e($rutaArchivo); ?>">
    </video>
<?php endif; ?>
            </div>

            <input type="file"
                   name="archivo"
                   class="form-control mt-2"
                   accept="image/*,application/pdf,video/*">
            <small class="text-muted">Puedes subir un archivo nuevo para reemplazar el actual.</small>
        </div>

        <div class="text-center">
            <button class="btn btn-primary mb-3">Actualizar</button>
            <a href="<?php echo e(route('materiales.index')); ?>" class="btn btn-primary mb-3">Cancelar</a>
        </div>

    </div>
    </form>
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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/materiales/edit.blade.php ENDPATH**/ ?>