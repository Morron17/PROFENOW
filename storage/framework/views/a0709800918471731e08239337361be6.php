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
        <h1>Buscar material</h1>
    </div>

    <!-- Select de materias -->
<form id="filterForm" class="text-center mb-3 d-flex justify-content-center align-items-center">
    <!-- Select más largo -->
    <select name="subject" id="subjectSelect" class="form-select rounded-0 me-2" style="width: 600px;">
        <option value="">Todas las materias</option>
        <option value="Matemáticas">Matemáticas</option>
        <option value="Historia">Historia</option>
        <option value="Biología">Biología</option>
        <option value="Literatura">Literatura</option>
        <option value="Geografía">Geografía</option>
        <option value="Ingles">Ingles</option>
    </select>

    <!-- Botón Buscar sin cambios -->
    <button type="submit" class="btn btn-primary">
        Buscar
    </button>
</form>

    <!-- Contenedor de materiales -->
    <div class="row justify-content-center" id="materialsContainer">
        <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    if (str_starts_with($material->archivo, 'materiales/')) {
        $rutaArchivo = asset('storage/' . $material->archivo);
    } else {
        $rutaArchivo = asset('img/' . $material->archivo);
    }
?>
            <div class="col-md-6 col-lg-4 mb-4 material-card" data-materia="<?php echo e($material->materia); ?>">
                <div class="card shadow h-100">
                    <?php if($material->tipo === 'imagen'): ?>
                        <img src="<?php echo e($rutaArchivo); ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <?php elseif($material->tipo === 'PDF'): ?>
                        <iframe src="<?php echo e($rutaArchivo); ?>" style="height: 250px; width: 100%; object-fit: cover;"></iframe>
                    <?php elseif($material->tipo === 'video'): ?>
                        <video controls style="height: 250px; width: 100%; object-fit: cover;">
                            <source src="<?php echo e($rutaArchivo); ?>">
                        </video>
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo e($material->titulo); ?></h5>
                        <p class="card-text text-muted mb-1"><?php echo e(date('d/m/Y', strtotime($material->fecha))); ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo e($material->materia); ?></small></p>
                        <p class="card-text"><?php echo e(Str::limit($material->contenido, 120)); ?></p>

                        <a href="#" class="mt-auto text-decoration-none text-primary" data-bs-toggle="modal" data-bs-target="#blogModal<?php echo e($material->material_id); ?>">
                            Ver material
                        </a>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="blogModal<?php echo e($material->material_id); ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo e($material->material_id); ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="modalLabel<?php echo e($material->material_id); ?>"><?php echo e($material->titulo); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <?php if($material->tipo === 'imagen'): ?>
                                <img src="<?php echo e($rutaArchivo); ?>" class="img-fluid mb-3" style="border-radius: 8px;">
                            <?php elseif($material->tipo === 'PDF'): ?>
                                <iframe src="<?php echo e($rutaArchivo); ?>" style="width: 100%; height: 400px;" class="mb-3"></iframe>
                            <?php elseif($material->tipo === 'video'): ?>
                                <video controls style="width: 100%; height: auto;" class="mb-3 mx-auto d-block">
                                    <source src="<?php echo e($rutaArchivo); ?>">
                                </video>
                            <?php endif; ?>

                            <a href="<?php echo e($rutaArchivo); ?>" download class="btn btn-primary mb-3">Descargar archivo</a>

                            <p class="text-muted mb-1"><?php echo e(date('d/m/Y', strtotime($material->fecha))); ?> — <?php echo e($material->materia); ?></p>
                            <p class="text-center"><?php echo e($material->contenido); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <script>
        const filterForm = document.getElementById('filterForm');
        const materialsContainer = document.getElementById('materialsContainer');
        const materialCards = Array.from(materialsContainer.getElementsByClassName('material-card'));

        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const selected = document.getElementById('subjectSelect').value;

            materialCards.forEach(card => {
                const materia = card.getAttribute('data-materia');
                if (!selected || materia === selected) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/public/materiales.blade.php ENDPATH**/ ?>