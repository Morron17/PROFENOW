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
    <h1 class="text-center mb-4">Administrar materiales</h1>

    <div class="text-end mb-3">
        <a href="<?php echo e(route('materiales.create')); ?>" class="btn btn-primary">
            Crear nuevo material
        </a>
    </div>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>Título</th>
                <th>Materia</th>
                <th>Fecha</th>
                <th style="width: 90px;" class="text-center">Tipo</th>
                <th style="width: 160px;">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($material->titulo); ?></td>

                    <td><?php echo e($material->materia); ?></td>

                    <td><?php echo e(date('d/m/Y', strtotime($material->fecha))); ?></td>

                    <td class="text-center" style="width: 90px;">
    <span class="badge bg-info text-dark px-3">
        <?php if(strtolower($material->tipo) == 'pdf'): ?>
            PDF
        <?php elseif(strtolower($material->tipo) == 'imagen'): ?>
            Imagen
        <?php elseif(strtolower($material->tipo) == 'video'): ?>
            Video
        <?php else: ?>
            <?php echo e(ucfirst($material->tipo)); ?>

        <?php endif; ?>
    </span>
</td>

                    <td class="text-nowrap" style="width: 160px;">
                        <a href="<?php echo e(route('materiales.show', ['id' => $material->material_id])); ?> "class="btn btn-primary">Ver</a>
                        <a href="<?php echo e(route('materiales.edit', ['id' => $material->material_id])); ?> "class="btn btn-primary">Editar</a>

                        <form action="<?php echo e(route('materiales.destroy', ['id' => $material->material_id])); ?>"
                              method="POST"
                              class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        <button
                         type="button"
                         class="btn btn-danger fw-bold px-3"
                         data-bs-toggle="modal"
                         data-bs-target="#deleteModal"
                         data-id="<?php echo e($material->material_id); ?>"
                         data-nombre="<?php echo e($material->titulo); ?>">
                         Eliminar
                        </button>
                        </form>

    <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <p>¿Estás seguro que quieres eliminar?:</p>
                <h5 id="materialNombre"></h5>
            </div>

            <div class="modal-footer justify-content-center">
                <form id="deleteForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Sí, eliminar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
var deleteModal = document.getElementById('deleteModal');

deleteModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    var id = button.getAttribute('data-id');
    var nombre = button.getAttribute('data-nombre');

    // Mostrar nombre en el modal
    document.getElementById('materialNombre').textContent = nombre;

    // Cambiar acción del formulario
    document.getElementById('deleteForm').action = '/materiales/' + id + '/eliminar';
});
</script>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/materiales/index.blade.php ENDPATH**/ ?>