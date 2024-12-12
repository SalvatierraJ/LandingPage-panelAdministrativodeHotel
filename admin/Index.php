<?php
 require('./phpAdmin/esenciales.php');
 require('./phpAdmin/conexion_be.php');
 
    session_start();
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']=true)){
        redireccionar('./dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login panel</title>
    <?php require('./phpAdmin/links.php')  ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="login-form text-center rounded bg-white shadow overflow-hiden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">LOGIN ADMINISTRADOR</h4>
            <div class="p-4 ">
                <div class="mb-3">
                    <input name="admin_name" require type="Text" class="form-control shadow-none text-center " placeholder="Usuario">
                </div>
                <div class="mb-3">

                    <input name="admin_pass" require type="password" class="form-control shadow-none text-center " placeholder="Contraseña">
                    <div id="emailHelp" class="form-text">Nunca compartas tu contraseña con nadie.</div>
                </div>
                <button name="btnlogin" type="submit" class="btn text-white btn-dark shadow-none">Entrar</button>
            </div>
        </form>

    </div>


    <?php

    if (isset($_POST['btnlogin'])) {
        $frm_data = filtrarPor($_POST);
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
        $datatypes = "ss";

        $res = seleccionarTabla($query, $values, "ss");
        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['adminLogin']=true;
            $_SESSION['adminId']=$row['id_usuario'];
            redireccionar('dashboard.php');
        } else {
            alerta('error','Usuario o contasena invalida');
        }
    }

    ?>



    <?php require('./phpAdmin/scripts.php')  ?>
</body>

</html>