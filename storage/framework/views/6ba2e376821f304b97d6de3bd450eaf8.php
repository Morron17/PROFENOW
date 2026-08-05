<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family: Arial, sans-serif;">

<h2>¡Tu profesor confirmó la clase!</h2>

<p>
Hola <strong><?php echo e($reserva->alumno->name); ?></strong>,
</p>

<p>
El profesor respondió a tu solicitud de reserva.
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
<strong>Tipo de reunión:</strong>
<?php echo e($reserva->tipo_reunion); ?>

</p>

<p>
<strong>Información enviada por el profesor:</strong>
</p>

<p>
<?php echo e($reserva->mensaje_profesor); ?>

</p>

<hr>

<p>
Gracias por utilizar <strong>PROFENOW</strong>.
</p>

</body>
</html>
<?php /**PATH C:\Users\tomas\OneDrive\Escritorio\laragon-portable\www\profenow\resources\views/emails/respuesta-profesor.blade.php ENDPATH**/ ?>