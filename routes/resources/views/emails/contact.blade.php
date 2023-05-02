<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Correo de contacto</title>
</head>

<body>
    <h1>Formulario de contacto del tu sitio web CONSEJO TERRITORIAL DE AUTORIDADES INDIGENAS DEL CHOCO UT
    </h1>

    <p>Un usuario ha enviado un mensaje a través del formulario de contacto en tu sitio web:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Asunto:</strong> {{ $subject }}</li>
        <li><strong>Mensaje:</strong> {{ $mensaje }}</li>
    </ul>
</body>

</html>