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
    <title>Panel Admninistrativo- Configuraciones</title>
    <?php require('./phpAdmin/links.php'); ?>
</head>

<body>
    <?php require('./phpAdmin/header.php') ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">CONFIGURACIONES</h3>

                <!-- CONFIGURACIONES GENERALES -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Configuraciones Generales</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i>Editar
                            </button>

                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Titulo</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Acerca de Nosotros</h6>
                        <p class="card-text" id="site_about"></p>

                    </div>
                </div>

                <!-- configuraciones generales Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">configuraciones Generales</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label  fw-bold">Titulo del sitio</label>
                                        <input type="tex" name="site_title" id="site_title_inp" class="form-control shadow-none " require>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Acerca de nosotros</label>
                                        <textarea name="site_about" class="form-control shadow-none" id="site_about_inp" cols="" rows="6" require></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.titulo,site_about.value = general_data.sobre_nosotros" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn btn-dark text-white shadow-none">GUARDAR</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!--seccione sht  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Cierre de Sitio WEB </h5>

                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="switch_apagado">
                                </form>
                            </div>


                        </div>
                        <p class="card-text">
                            Ningún cliente podrá reservar una habitación de hotel cuando el cierre esté activado.
                        </p>

                    </div>
                </div>
                <!--detalles de contacto   -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Configuraciones De contacto</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i>Editar
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Direccion</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Numero de Telefono</h6>
                                    <p class="card-text mb-1 ">
                                        <i class="bi bi-telephone-forward-fill"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text"><i class="bi bi-telephone-forward-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div class="mb4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Correo</h6>
                                    <p class="card-text" id="email"></p>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Redes Sociales</h6>
                                    <p class="card-text mb-1 ">
                                        <i class="bi bi-twitter me-1"></i>
                                        <span id="tw"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1 ">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="insta"></span>
                                    </p>
                                </div>
                                <div class="mb4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- contactos generales Modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">configuraciones de Contacto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label  fw-bold">Direccion</label>
                                                    <input type="tex" name="address" id="address_inp" class="form-control shadow-none " require>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label  fw-bold">Google Map Link</label>
                                                    <input type="tex" name="gmap" id="gmap_inp" class="form-control shadow-none " require>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label  fw-bold">Numero de Telefono (con codigo de region)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" require>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label  fw-bold">Correo</label>
                                                    <input type="email" name="email" id="email_inp" class="form-control shadow-none " require>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label  fw-bold">Enlaces de Redes Sociales</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" require>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" require>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                        <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" require>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label  fw-bold">Enlace IFrame src</label>
                                                    <input type="tex" name="iframe" id="iframe_inp" class="form-control shadow-none " require>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn btn-dark text-white shadow-none">GUARDAR</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Administrador de equipo GENERALES -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Configuraciones Generales</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-plus-square-dotted"></i> </button>

                        </div>

                        <div class="row" id="team-data">
                        </div>


                    </div>
                </div>

                <!-- Administracion de personal Modal -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Agregar miembro del equipo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label  fw-bold">Nombre</label>
                                        <input type="tex" name="member_name" id="member_name_inp" class="form-control shadow-none " require>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Imagen</label>
                                        <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .web, .jpeg" class="form-control shadow-none " require>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_name.value='', member_picture.value=''" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
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

    <script src="./scripts/configuraciones.js"></script>
</body>

</html>