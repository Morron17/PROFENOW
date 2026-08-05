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
        <h1 class="text-center mb-4">Crear nuevo material</h1>
    <div class="container form-box" style="max-width: 600px;">

        <?php if($errors->any()): ?>
            <div class="alert alert-danger text-center">
                <ul class="mb-0 list-unstyled">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>• <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('materiales.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Título</label>
                <input
        type="text"
        class="form-control"
        name="titulo"
        id="titulo"
        placeholder="Titulo" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <input
        type="text"
        class="form-control"
        name="contenido"
        id="contenido"
        placeholder="Contenido" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Archivo (imagen, PDF o video)</label>
                <input type="file" name="archivo" class="form-control"
                    accept="image/*,application/pdf,video/*" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Materia</label>
<select name="materia" id="materia" class="form-control" required>
        <option value="">Seleccione una materia</option>
        <option value="Matematica">Matemática</option>
        <option value="Historia">Historia</option>
        <option value="Biologia">Biología</option>
        <option value="Ingles">Ingles</option>
        <option value="Lengua">Lengua</option>
        <option value="Geografia">Geografía</option>
        <option value="Filosofia">Filosofía</option>
        <option value="Literatura">Literatura</option>
    </select>

            </div>

            <div class="text-center">
                <button class="btn btn-primary mb-3">Publicar</button>
                <a href="<?php echo e(route('materiales.index')); ?>" class="btn btn-primary mb-3">Cancelar</a>
            </div>
        </form>
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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/materiales/create.blade.php ENDPATH**/ ?>