<?php

include_once("./conf/conf.php");
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$tel = isset($_POST['tel']) ? $_POST['tel'] : "";
$dui = isset($_POST['dui']) ? $_POST['dui'] : "";
$correo = isset($_POST['correo']) ? $_POST['correo'] : "";
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : "";

// Insertar nuevo cliente
if ($bandera == 1) {
    $consulta = "INSERT INTO cliente (nombre, tel, dui, correo, direccion) VALUES (:nombre, :tel, :dui, :correo, :direccion)";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':tel', $tel);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error en la consulta";
    }
// Modificar cliente existente
} elseif ($bandera == 2) {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $consulta = "UPDATE cliente SET nombre = :nombre, tel = :tel, dui = :dui, correo = :correo, direccion = :direccion WHERE id = :id";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':tel', $tel);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);
    $resultado->bindParam(':id', $id);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error en la actualización";
    }
// Eliminar cliente
} else {
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $consulta = "DELETE FROM cliente WHERE id = :id";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':id', $id);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error en la consulta";
    }
}

?>
