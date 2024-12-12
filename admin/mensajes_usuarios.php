<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./phpAdmin/esenciales.php');
require('./phpAdmin/conexion_be.php');
adminLogin();
session_regenerate_id(true);
ini_set("log_errors", 1);
ini_set("error_log", "./php_errors.log");

if (isset($_GET['visto'])) {
    $frm_data = filtrarPor($_GET);

    if ($frm_data['visto'] == 'all') {
        $q = "UPDATE user_contactanos SET visto=?";
        $values = [1];
        if (actualizarTabla($q, $values, 'i')) {
            alerta('success', 'Se marco todo Como leido');
        } else {
            alerta('error', 'fallido');
        }
    } else {
        $q = "UPDATE user_contactanos SET visto=? WHERE id = ?";
        $values = [1, $frm_data['visto']];
        if (actualizarTabla($q, $values, 'ii')) {
            alerta('success', 'Se marco Como leido');
        } else {
            alerta('error', 'fallido');
        }
    }
}
if (isset($_GET['del'])) {
    $frm_data = filtrarPor($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM `user_contactanos` ";
        if (mysqli_query($conexion,$q)) {
            alerta('success', 'Se elimino todo');
        } else {
            alerta('error', 'fallido');
        }
    } else {
        $q = "DELETE FROM `user_contactanos` WHERE  id= ?";
        $values = [$frm_data['del']];
        if (actualizarTabla($q, $values, 'i')) {
            alerta('success', 'Se elimino');
        } else {
            alerta('error', 'fallido');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admninistrativo- Mensajaes</title>
    <?php require('./phpAdmin/links.php'); ?>
</head>

<body>
    <?php require('./phpAdmin/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Mensajes de Usuarios</h3>

                <!-- Administrador de equipo GENERALES -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm"><i class="bi bi-x-octagon-fill"></i> Eliminar todo</a>

                            <a href="?visto=all" class="btn btn-dark rounded-pill shadow-none btn-sm"> <i class="bi bi-check-all"></i> Marcar todo como leido</a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="stiky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Mensaje</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM user_contactanos  ORDER BY id DESC";
                                    $data = mysqli_query($conexion, $q);
                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $visto = '';
                                        if ($row['visto'] != 1) {
                                            $visto = "<a href='?visto=$row[id]' class='btn btn-sm rounded-pill btn-primary'> Marcar como leido</a><br>";
                                        }
                                        $visto .= "<a href='?del=$row[id]' class='btn btn-sm rounded-pill btn-danger mt-2'> Eliminar</a>";
                                        echo <<<query
                                            <tr>
                                                <td>$i</td>
                                                <td>$row[nombre]</td>
                                                <td>$row[email]</td>
                                                <td>$row[titulo]</td>
                                                <td>$row[mensaje]</td>
                                                <td>$row[fecha]</td>
                                                <td>$visto</td>
                                                
                                            </tr>

                                        query;
                                        $i++;
                                    }


                                    ?>

                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>






            </div>
        </div>
    </div>

    <?php require('./phpAdmin/scripts.php'); ?>
</body>

</html>