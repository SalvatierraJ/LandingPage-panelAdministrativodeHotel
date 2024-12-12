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
    <title>Panel Admninistrativo- Servicios</title>
    <?php require('./phpAdmin/links.php'); ?>
</head>

<body>
    <?php require('./phpAdmin/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SERVICIOS</h3>

                <!-- Administrador de equipo GENERALES -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Caracteristicas</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square-dotted"></i> </button>

                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="stiky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">

                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Servicios</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square-dotted"></i> </button>

                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Icono</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col" width="40%">Descripcion</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">

                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>




            </div>
        </div>
    </div>
     <!-- caracteristicas modal -->
   
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Caracteristicas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label  fw-bold">Nombre</label>
                            <input type="tex" name="feature_name" class="form-control shadow-none " require>
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
    <!-- servicios modal -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar servicio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label  fw-bold">Nombre</label>
                            <input type="tex" name="facility_name" class="form-control shadow-none " require>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icono</label>
                            <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none " require>


                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Descripcion</label>
                            <textarea name="facility_desc" class="form-control shadow-none" rows="3" ></textarea>
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


    <?php require('./phpAdmin/scripts.php'); ?>
    <script src="./scripts/servicios.js"></script>
</body>

</html>