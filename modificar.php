<?php
include_once("./conf/conf.php");
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = isset($_GET['id']) ? $_GET['id'] : "";

$consulta = "SELECT * FROM cliente WHERE id = :id";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':id', $id);
$resultado->execute();
$cliente = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
</head>

<body>
    <form action="procesos.php" method="POST">
        <input type="text" value="2" name="bandera" hidden>
        <input type="text" value="<?php echo $id; ?>" name="id" hidden>

        <label for="nombre">Nombre</label> <br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre']; ?>" required><br><br>

        <label for="tel">Teléfono</label> <br>
        <input type="text" name="tel" id="tel" value="<?php echo $cliente['tel']; ?>" required><br><br>

        <label for="dui">Dui</label> <br>
        <input type="text" name="dui" id="dui" value="<?php echo $cliente['dui']; ?>" required><br><br>

        <label for="correo">Correo</label> <br>
        <input type="email" name="correo" id="correo" value="<?php echo $cliente['correo']; ?>" required><br><br>

        <label for="direccion">Dirección</label> <br>
        <input type="text" name="direccion" id="direccion" value="<?php echo $cliente['direccion']; ?>" required><br><br>

        <input type="submit" value="Actualizar">
    </form>
</body>

</html>
