<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = [];
}

$_SESSION['carrito'][] = $id;

header("Location: index.php");
?>