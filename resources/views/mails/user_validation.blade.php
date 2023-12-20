<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo Electrónico</title>
</head>
<body style="font-family: 'Arial', sans-serif;">
    <h2>¡Bienvenido! {{ $user->name }}</h2>
    <p>Por favor, haga clic en el siguiente enlace para verificar su dirección de correo electrónico:</p>
    <a href="{{ $url }}" style="display: inline-block; padding: 10px 20px; background-color: #4caf50; color: white; text-decoration: none; border-radius: 5px;">Verificar Correo Electrónico</a>
    <p>Si no ha solicitado la verificación, puede ignorar este mensaje.</p>
    <p>Gracias,<br> Tu Aplicación</p>
</body>
</html>
