<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Correo electrónico</h1>
    
    <p>Nombre: <strong>{{$contacto['name']}}</strong></p>
    <p>Coreo: <strong>{{$contacto['email']}}</strong></p>
    <p>Teléfono: <strong>{{$contacto['tel']}}</strong></p>
    <p>Asunto: <strong>{{$contacto['subject']}}</strong></p>
    <p>Mensaje: <strong>{{$contacto['message']}}</strong></p>
</body>
</html>