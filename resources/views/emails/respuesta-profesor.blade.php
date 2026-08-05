<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family: Arial, sans-serif;">

<h2>¡Tu profesor confirmó la clase!</h2>

<p>
Hola <strong>{{ $reserva->alumno->name }}</strong>,
</p>

<p>
El profesor respondió a tu solicitud de reserva.
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
<strong>Tipo de reunión:</strong>
{{ $reserva->tipo_reunion }}
</p>

<p>
<strong>Información enviada por el profesor:</strong>
</p>

<p>
{{ $reserva->mensaje_profesor }}
</p>

<hr>

<p>
Gracias por utilizar <strong>PROFENOW</strong>.
</p>

</body>
</html>
