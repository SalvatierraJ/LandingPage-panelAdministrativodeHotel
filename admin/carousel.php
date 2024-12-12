<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./phpAdmin/esenciales.php');
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
    <title>Panel Admninistrativo- carousel</title>
    <?php require('./phpAdmin/links.php'); ?>
</head>

<body>
    <?php require('./phpAdmin/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Carousel</h3>

                <!-- Administrador de equipo GENERALES -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Carousel</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                                <i class="bi bi-plus-square-dotted"></i> </button>

                        </div>

                        <div class="row" id="carousel-data">
                        </div>


                    </div>
                </div>

                <!-- Administracion de personal Modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Imagenes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Imagen</label>
                                        <input type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg, .png, .web, .jpeg" class="form-control shadow-none " require>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick=" carousel_picture.value=''" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn btn-dark text-white shadow-none">GUARDAR</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>




            </div>
        </div>
    </div>


    <?php require('./phpAdmin/scripts.php'); ?>

    <script src="./scripts/carousel.js"></script>
</body>

</html>