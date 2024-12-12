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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admninistrativo- Habitaciones</title>
    <?php require('./phpAdmin/links.php'); ?>
</head>

<body>
    <?php require('./phpAdmin/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Habitaciones</h3>

                <!-- Administrador de equipo GENERALES -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">

                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square-dotted"></i> </button>

                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border text-center">
                                <thead class="stiky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Invitados</th>
                                        <th scope="col">Precios</th>
                                        <th scope="col">cantidad</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">

                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>





            </div>
        </div>
    </div>
    <!-- Add room modal -->

    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Habitacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Nombre</label>
                                <input type="tex" name="name" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Precio</label>
                                <input type="number" min="1" name="precio" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Cantidad</label>
                                <input type="number" min="1" name="cantidad" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Adultos(Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Ninos(Max.)</label>
                                <input type="number" min="1" name="ninos" class="form-control shadow-none " require>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label  fw-bold">Caracteristicas</label>
                                <di class="row">
                                    <?php
                                    $res = seleccionarTodaLa('caracteristicas');

                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                                <input type='checkbox' name='caracteristicas' value='$opt[id]' class='form-check-input shadow-none'>
                                                $opt[nombre]
                                            </label>
                                        </div>
                                    
                                    
                                    ";
                                    }

                                    ?>
                                </di>

                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label  fw-bold">Servicios</label>
                                <di class="row">
                                    <?php
                                    $res = seleccionarTodaLa('servicios');

                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                                <input type='checkbox' name='servicios' value='$opt[id]' class='form-check-input shadow-none'>
                                                $opt[nombre]
                                            </label>
                                        </div>
                                    
                                    
                                    ";
                                    }

                                    ?>
                                </di>

                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label  fw-bold">Descripcion</label>
                                <textarea name="desc" id="" rows="4" class="form-control shadow-one" required></textarea>

                            </div>
                        </div>

                    </div>




                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-dark text-white shadow-none">GUARDAR</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Edit room modal -->

    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Habitacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Nombre</label>
                                <input type="tex" name="name" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Precio</label>
                                <input type="number" min="1" name="precio" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Cantidad</label>
                                <input type="number" min="1" name="cantidad" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Adultos(Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none " require>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label  fw-bold">Ninos(Max.)</label>
                                <input type="number" min="1" name="ninos" class="form-control shadow-none " require>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label  fw-bold">Caracteristicas</label>
                                <di class="row">
                                    <?php
                                    $res = seleccionarTodaLa('caracteristicas');

                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                                <input type='checkbox' name='caracteristicas' value='$opt[id]' class='form-check-input shadow-none'>
                                                $opt[nombre]
                                            </label>
                                        </div>
                                    
                                    
                                    ";
                                    }

                                    ?>
                                </di>

                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label  fw-bold">Servicios</label>
                                <di class="row">
                                    <?php
                                    $res = seleccionarTodaLa('servicios');

                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                                <input type='checkbox' name='servicios' value='$opt[id]' class='form-check-input shadow-none'>
                                                $opt[nombre]
                                            </label>
                                        </div>
                                    
                                    
                                    ";
                                    }

                                    ?>
                                </di>

                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label  fw-bold">Descripcion</label>
                                <textarea name="desc" id="" rows="4" class="form-control shadow-one" required></textarea>

                            </div>
                            <input type="hidden" name="room_id">
                        </div>

                    </div>




                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-dark text-white shadow-none">GUARDAR</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Administrador de Imagenes habitaciones-->
    <div class="modal fade" id="room-image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nombre de Habitacion</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="image-alert">

                    </div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form action="" id="add_image_form">
                            <label class="form-label fw-bold">Add Imagen</label>
                            <input type="file" name="image" accept=".jpg, .png, .web, .jpeg" class="form-control shadow-none mb-3" require>
                            <button class="btn btn-dark text-white shadow-none">GUARDAR</button>
                            <input type="hidden" name="room_id">


                        </form>
                    </div>
                    <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                        <table class="table table-hover border text-center">
                            <thead class="stiky-top">
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Imagen</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="room-image-data">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php require('./phpAdmin/scripts.php'); ?>
    <script src="./scripts/habitaciones.js"></script>

</body>

</html>