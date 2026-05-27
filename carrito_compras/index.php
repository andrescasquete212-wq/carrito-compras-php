<?php
session_start();
include("conexion.php");

$resultado = mysqli_query($conexion,"SELECT * FROM productos");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>TIENDA VIRTUAL</h1>

<a href="carrito.php">Ver Carrito</a>

<div class="contenedor">

<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

<div class="producto">
    <img src="<?php echo $fila['imagen']; ?>">
    <h3><?php echo $fila['nombre']; ?></h3>
    <p>$<?php echo $fila['precio']; ?></p>

    <a href="agregar.php?id=<?php echo $fila['id']; ?>">
        Agregar al carrito
    </a>
</div>

<?php } ?>

</div>

</body>
</html>