<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family: Arial, sans-serif;">

<h2>Reserva realizada correctamente</h2>

<p>
Hola <strong>{{ $reserva->alumno->name }}</strong>,
</p>

<p>
Tu solicitud de reserva fue registrada correctamente.
</p>

<hr>

<p>
<strong>Profesor:</strong>
{{ $reserva->teacher }}
</p>

<p>
<strong>Materia:</strong>
{{ $reserva->materia }}
</p>

<p>
<strong>Día y horario:</strong>
{{ $reserva->horario }}
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
