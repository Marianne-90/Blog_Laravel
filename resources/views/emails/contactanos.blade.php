<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            color:blue;
        }
    </style>
</head>
<body>
    <h1>Correo Electrónico</h1>
    <p><strong>Nombre: </strong>{{ $data['name'] }}</p>
    <p><strong>Correo: </strong>{{ $data['correo'] }}</p>
    <p><strong>Mensaje: </strong>{{ $data['mensaje'] }}</p>
</body>
</html>