 <!-- header -->

 <?php
// require('php/conexion_be.php');
// require('php/esenciales.php');

 
// $contact_q= "SELECT * FROM `contactanos_hotel` WHERE id=?";
// $valus=[1];
// $contact_r = mysqli_fetch_assoc(seleccionarTabla($contact_q,$valus,'i'));
 
 ?>
    <!-- end of header -->
    <!-- nav var -->
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/index.php">HOTEL TUYUYU</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="./habitaciones.php">Habitaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="./Servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="./Contactanos.php">Contactanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="./About.php">Acerca de Nosotros</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                    
                    // session_start();

                    //     if(!isset($_SESSION['usuario'])){
                    //     echo<<<boton
                    //         <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    //         Login
                    //     </button>
                    //     <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#RegisterModal">
                    //         Registrarse
                    //     </button>
                    //     boton;
                        
                    //     }else{
                    //         echo<<<boton
                    //         <form method="POST" action="./php/logout.php">
                    //         <button type="submit" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                    //             Salir
                    //         </button>
                    //     </form>
                 
                    //     boton;
                    //     }
                       
                    ?>
            

                </div>
            </div>
        </div>
    </nav>
    <!-- en nav var -->
    <!-- login modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content" >
                <form method="POST" action="./php/iniciar.php">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person fs-3 me-2"></i> Inicio de sesion
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Direccion de correo</label>
                            <input type="email" name="email" class="form-control shadow-none ">
                            <div id="emailHelp" class="form-text">Nunca compartas tu correo con nadie.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control shadow-none ">
                            <div id="emailHelp" class="form-text">Nunca compartas tu contraseña con nadie.</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Iniciar</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Olvidaste tu Contraseña?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--fin login modal -->
    <!-- register modal -->
    <div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <form action="./php/registrar_usuario_be.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-vcard-fill fs-3 me-2"></i> Registro de Usuario
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Nota: Porfavor agrega tu informacion personal.

                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Nombres</label>
                                    <input type="tex" class="form-control shadow-none " name="Nombres" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Apellido Paterno</label>
                                    <input type="tex" class="form-control shadow-none " name="ApellidoP" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Apellido Materno</label>
                                    <input type="tex" class="form-control shadow-none " name="ApellidoM" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="number" class="form-control shadow-none" name="telefono" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">CI</label>
                                    <input type="number" class="form-control shadow-none " name="CI" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pasaporte</label>
                                    <input type="number" class="form-control shadow-none " name="pasaporte">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Direccion de Correo</label>
                                    <input type="email" class="form-control shadow-none " name="correo" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control shadow-none " name="Usuario" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <input type="password" class="form-control shadow-none " name="password" require>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control shadow-none " name="passwordCF" require>
                                </div>

                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">REGISTRAR</button>
                        </div>



                    </div>
                </form>

            </div>
        </div>
    </div>




<!-- <div class="fondologin" id="fondologin">
        <div class="close" id="popClose">
            <i class="x" style="color: #0f0f0f; ">x</i>   
        </div>
        
        <div class="contenedor__todo">

            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar a la pagina</p>
                    <button id="btn__inisiar-sesion"> Iniciar Sesion</button>
                </div>
                <div class="caja__trasera-registro">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para Iniciar sesion y entrar a la pagina</p>
                    <button id="btn__inisiar-registrarse"> Registrarse</button>
                </div>
            </div>
            <div class="contenedor__login-register">
                <form action="php/Login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesion</h2>
                    <input type="text" placeholder="Usuario" name="User">
                    <input type="password" placeholder="contraseña" name="Pass">
                    <button>Entrar</button>
                </form>

                <form action="./php/registrar_usuario_be.php" method="POST" class="formulario__registro">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombres" name="Nombres">
                    <input type="text" placeholder="Apellidos Paterno" name="ApellidoP">
                    <input type="text" placeholder="Apellidos Materno" name="ApellidoM">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <input type="text" placeholder="Numero de Pasaporte" name="pasaporte">
                    <input type="text" placeholder="Numero de CI" name="CI">
                    <input type="text" placeholder="E-mail" name="correo">
                    <input type="text" placeholder="Nombre Usuario" name="Usuario">
                    <input type="text" placeholder="Contraseña" name="password">
                    <button>Registrarse</button>
                </form>
            </div>

        </div>
    </div> -->