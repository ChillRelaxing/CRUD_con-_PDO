<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="procesos.php" method="POST">
        <input type="text" value="1" name="bandera" hidden>
        <label for="tel">Nombre</label> <br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="tel">Teléfono</label> <br>
        <input type="text" name="tel" id="tel" required><br><br>

        <label for="dui">Dui</label> <br>
        <input type="text" name="dui" id="dui" required><br><br>

        <label for="correo">Correo</label> <br>
        <input type="email" name="correo" id="correo" required><br><br>

        <label for="direccion">Dirección</label> <br>
        <input type="text" name="direccion" id="direccion" required><br><br>

        <input type="submit" value="Guardar">
    </form>
</body>

</html>