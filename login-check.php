<?php

$server   = "localhost";
$username = "sauld";
$password = "password";
$database = "ESTUDIANTES";

$mysqli = new mysqli($server, $username, $password, $database);
if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}

$usuario = $_POST['user'];
$contraseña = $_POST['pass'];

$query = mysqli_query($mysqli, "SELECT * FROM USUARIOS WHERE nombre = '$usuario'and contraseña = '$contraseña'") or die('error'.mysqli_error($mysqli));
$contar = mysqli_num_rows($query); 
if($contar > 0) {
    session_start();
$data = mysqli_fetch_assoc($query);
$_SESSION['nombre'] = $data['nombre'];
$_SESSION['contraseña'] = $data['contraseña'];
header("location: mostrar.html");
} 
else{
    header("location: index.html");

}