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
<?php if(session('error')): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = new bootstrap.Modal(document.getElementById('noDisponibleModal'));
    modal.show();
});
</script>
<?php endif; ?>

<div class="container">
    <div class="card mx-auto shadow-lg" style="max-width: 300px;">
        <img src="<?php echo e(asset('img/' . $teacher['img'])); ?>"
             class="card-img-top"
             alt="<?php echo e($teacher['display_name']); ?>">

        <div class="card-body text-center">

            <h2 class="card-title"><?php echo e($teacher['display_name']); ?></h2>
            <p class="text-muted">Materia: <?php echo e($teacher['subject']); ?></p>
            <p><?php echo e($teacher['bio']); ?></p>
            <p>Horario: <?php echo nl2br(e($teacher['orary'])); ?></p>

            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary mt-3">
                Volver
            </a>

<?php if(auth()->guard()->check()): ?>

        <button class="btn btn-primary mt-3"
        data-bs-toggle="modal"
        data-bs-target="#horariosModal">
    Reservar
</button>

<?php endif; ?>

        </div>
    </div>
</div>

<div class="modal fade" id="horariosModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Seleccioná un horario
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

<?php $__currentLoopData = $horariosDisponibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<button
    class="btn btn-outline-primary w-100 mb-2 horario-btn"
    data-horario="<?php echo e($horario['texto']); ?>">

    <?php echo e($horario['texto']); ?>


</button>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </div>
</div>

<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->hasRole('Alumno')): ?>
        <!-- Modal de pago -->
        <div class="modal fade" id="pagoModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
<div class="text-center mt-3">
    <h5>Horario seleccionado</h5>

    <p class="fw-bold text-primary mb-3" id="horarioTexto"></p>
</div>

    <div class="modal-body text-center">
    <p>Total: <strong>$25.000</strong></p>
</div>

<div class="modal-footer justify-content-center">
    <form id="formReserva"
      action="<?php echo e(route('guardar.reserva')); ?>"
      method="POST"
      class="w-100">
    <?php echo csrf_field(); ?>

    <input
    type="hidden"
    name="teacher"
    value="<?php echo e($teacher['display_name']); ?>">
    <input type="hidden" name="materia" value="<?php echo e($teacher['subject']); ?>">
    <input type="hidden"
       name="horario"
       id="horarioSeleccionado">

<div class="d-flex justify-content-center gap-3 mt-4">

    <button
        type="button"
        class="btn btn-secondary"
        id="volverHorarios">
        Volver
    </button>

    <button
        type="submit"
        class="btn btn-success">
        Transferir
    </button>

</div>
</form>
                    </div>

                </div>
            </div>
        </div>

<div class="modal fade" id="noDisponibleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">

            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    Profesor no disponible
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body text-center">

                <p>
                    Este profesor ya fue reservado por otro usuario.
                </p>


                <p class="text-muted mt-2">
                    Intenta reservar otro profesor.
                </p>

            </div>

            <div class="modal-footer justify-content-center">

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Entendido
                </button>

            </div>

        </div>
    </div>
</div>
    <?php endif; ?>
<?php endif; ?>


<?php if(session('profesor_ocupado')): ?>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var modal = new bootstrap.Modal(
        document.getElementById('noDisponibleModal')
    );

    modal.show();

});

</script>

<?php endif; ?>
</script>

<script>

document.querySelectorAll('.horario-btn').forEach(function(btn){

    btn.addEventListener('click',function(){

        let horario = this.dataset.horario;

        document.getElementById('horarioSeleccionado').value = horario;
        document.getElementById('horarioTexto').innerText = horario;

        bootstrap.Modal.getInstance(
            document.getElementById('horariosModal')
        ).hide();

        new bootstrap.Modal(
            document.getElementById('pagoModal')
        ).show();

    });

});

document.getElementById('volverHorarios').addEventListener('click',function(){

    bootstrap.Modal.getInstance(
        document.getElementById('pagoModal')
    ).hide();

    new bootstrap.Modal(
        document.getElementById('horariosModal')
    ).show();

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
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/profesores/show.blade.php ENDPATH**/ ?>