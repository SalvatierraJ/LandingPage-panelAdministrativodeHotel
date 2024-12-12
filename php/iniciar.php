<?php
session_start();
require 'conexion_be.php';

$correo = $_POST['email'];
$pass = $_POST['password'];

$query = "SELECT * FROM `usuarios` WHERE correo_electronico='$correo'";

$seleccionarTabla = mysqli_query($conexion,$query);


if (mysqli_num_rows($seleccionarTabla) > 0) {
    $_SESSION['usuario']=$User;
    $dato = mysqli_fetch_assoc($seleccionarTabla);
    $dat = $dato["contrasena"];
    if ($dat == $pass) {
        echo "
        <Script>
        window.location.href='../cliente.php';
        </script>
    ";
        exit;
    } else {
    }
}

?>
