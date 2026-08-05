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

<div class="container mt-4">

    <h2 class="mb-4">
        Comunicación con alumnos
    </h2>

    <?php if($reservas->isEmpty()): ?>

        <div class="alert alert-secondary text-center">

            <h5>Sin clases solicitadas</h5>

            <p class="mb-0">
                Todavía ningún alumno reservó una clase.
            </p>

        </div>

    <?php else: ?>

        <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="card shadow-sm mb-3 mx-auto" style="max-width: 600px;">

    <div class="card-body">

        <h5 class="card-title">
            <?php echo e($reserva->alumno->name); ?>

        </h5>

        <p>
            <strong>Materia:</strong>
            <?php echo e($reserva->materia); ?>

        </p>

        <p>
            <strong>Fecha y horario:</strong>
            <?php echo e($reserva->horario); ?>

        </p>


        <p>
            <strong>Estado:</strong>
            <?php echo e($reserva->estado); ?>

        </p>

<div class="text-center mt-2">
    <button
        class="btn btn-primary"
        style="width: 200px;"
        data-bs-toggle="modal"
        data-bs-target="#modal<?php echo e($reserva->id); ?>">
        Responder
    </button>
</div>

    </div>

</div>
            </div>

            <div class="modal fade"
     id="modal<?php echo e($reserva->id); ?>"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?php echo e(route('responder.reserva')); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>

                <input
                    type="hidden"
                    name="reserva_id"
                    value="<?php echo e($reserva->id); ?>">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Responder al alumno

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <p>

                        <strong>Alumno:</strong>

                        <?php echo e($reserva->alumno->name); ?>


                    </p>

                    <p>

                        <strong>Horario:</strong>

                        <?php echo e($reserva->horario); ?>


                    </p>

                    <label class="form-label">

                        Tipo de reunión

                    </label>

                    <select
                        name="tipo_reunion"
                        class="form-select mb-3">

                        <option value="Virtual">

                            Virtual (Google Meet)

                        </option>

                        <option value="Presencial">

                            Presencial

                        </option>

                    </select>

                    <label class="form-label">

                        Mensaje

                    </label>

                    <textarea
                        class="form-control"
                        rows="5"
                        name="mensaje_profesor"
                        placeholder="Pegá el link de Meet o escribí la dirección..."></textarea>

                </div>

                <div class="modal-footer">

                    <button
                        class="btn btn-success">

                        Enviar respuesta

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/comunicacion/comunic.blade.php ENDPATH**/ ?>