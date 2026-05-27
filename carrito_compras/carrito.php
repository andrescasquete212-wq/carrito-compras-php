<?php
session_start();
include("conexion.php");

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>🛒 Carrito de Compras</h1>

<a href="index.php" class="boton">
    ← Seguir comprando
</a>

<br><br>

<table class="tabla-carrito">

<tr>
    <th>Producto</th>
    <th>Precio</th>
</tr>

<?php

if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){

foreach($_SESSION['carrito'] as $id){

$sql = mysqli_query($conexion,"SELECT * FROM productos WHERE id=$id");

$fila = mysqli_fetch_assoc($sql);

$total += $fila['precio'];

?>

<tr>
    <td><?php echo $fila['nombre']; ?></td>
    <td>$<?php echo $fila['precio']; ?></td>
</tr>

<?php
}
}else{
?>

<tr>
    <td colspan="2">No hay productos en el carrito</td>
</tr>

<?php } ?>

<tr class="total">
    <td><strong>Total</strong></td>
    <td><strong>$<?php echo $total; ?></strong></td>
</tr>

</table>

<br>

<a href="eliminar.php" class="boton rojo">
    Vaciar carrito
</a>

</body>
</html>