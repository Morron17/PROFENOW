<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family: Arial, sans-serif;">

<h2>Reserva realizada correctamente</h2>

<p>
Hola <strong><?php echo e($reserva->alumno->name); ?></strong>,
</p>

<p>
Tu solicitud de reserva fue registrada correctamente.
</p>

<hr>

<p>
<strong>Profesor:</strong>
<?php echo e($reserva->teacher); ?>

</p>

<p>
<strong>Materia:</strong>
<?php echo e($reserva->materia); ?>

</p>

<p>
<strong>Día y horario:</strong>
<?php echo e($reserva->horario); ?>

</p>

<p>
<strong>Estado:</strong>
Pendiente de confirmación
</p>

<hr>

<p>
Cuando el profesor confirme la clase podrás verla desde
<b>Profesores reservados</b>.
</p>

<p>
Gracias por utilizar <b>PROFENOW</b>.
</p>

</body>
</html>
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/emails/reserva-confirmada.blade.php ENDPATH**/ ?>