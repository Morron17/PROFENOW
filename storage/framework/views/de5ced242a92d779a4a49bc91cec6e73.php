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

<div class="container text-center">
    <h1>Buscar profesores</h1>

<form action="<?php echo e(route('home')); ?>" method="GET" class="mb-4 d-flex justify-content-center align-items-center">

    <div class="d-flex w-75">

        <!-- Barra de búsqueda -->
        <div class="flex-fill me-2">
            <input type="text"
                   name="q"
                   value="<?php echo e(request('q')); ?>"
                   placeholder="Buscar por nombre..."
                   class="form-control rounded-0">
        </div>


        <div class="flex-fill me-2">
            <select name="subject" class="form-select rounded-0">
                <option value="">Todas las materias</option>
                <option value="Matemáticas" <?php echo e(request('subject') == 'Matemáticas' ? 'selected' : ''); ?>>Matemáticas</option>
                <option value="Historia" <?php echo e(request('subject') == 'Historia' ? 'selected' : ''); ?>>Historia</option>
                <option value="Biología" <?php echo e(request('subject') == 'Biología' ? 'selected' : ''); ?>>Biología</option>
                <option value="Ingles" <?php echo e(request('subject') == 'Ingles' ? 'selected' : ''); ?>>Ingles</option>
                <option value="Lengua" <?php echo e(request('subject') == 'Lengua' ? 'selected' : ''); ?>>Lengua</option>
                <option value="Geografía" <?php echo e(request('subject') == 'Geografía' ? 'selected' : ''); ?>>Geografía</option>
                <option value="Filosofía" <?php echo e(request('subject') == 'Filosofía' ? 'selected' : ''); ?>>Filosofía</option>
            </select>
        </div>


        <div style="width: 100px; padding-top: 3px;">
    <button
        type="submit"
        class="btn btn-primary w-100"
        style="height: 46px; line-height: 1;">
        <span style="position: relative; top: -2px;">
            Buscar
        </span>
    </button>
</div>

    </div>

</form>

    <?php if($teachers->isEmpty()): ?>
        <p>No se encontraron profesores.</p>
    <?php else: ?>

    <?php endif; ?>
</div>

<div class="container">
<div class="row justify-content-center">
    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
               <img src="<?php echo e(asset('img/' . $teacher['img'])); ?>" class="card-img-top" alt="<?php echo e($teacher['display_name']); ?>">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo e($teacher['display_name']); ?></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Materia: <?php echo e($teacher['subject']); ?></li>
                    </ul>
                    <a href="<?php echo e(route('profesores.show', ['name' => $teacher['name']])); ?>" class="btn btn-primary">Ver perfil</a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/home.blade.php ENDPATH**/ ?>