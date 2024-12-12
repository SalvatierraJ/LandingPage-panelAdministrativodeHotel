<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HOTEL TUYUYU - HABITACIONES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('./php/links.php') ?>


</head>

<body class="bg-light">
    <!-- login and register-->
    <?php require('./php/login_registro.php') ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Nuestras Habitaciones</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded  shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Buscar</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#buscarDropDown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="buscarDropDown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">VER DISPONIBLES</h5>
                                <label class="form-label">Fecha de entrada</label>
                                <input type="date" class="form-control shadow-none ">
                                <label class="form-label">Fecha de Salida</label>
                                <input type="date" class="form-control shadow-none ">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">Servicios</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1 ">
                                    <label class="form-check-label" for="f1">Servicio 1</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1 ">
                                    <label class="form-check-label" for="f2">Servicio 2</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1 ">
                                    <label class="form-check-label" for="f3">Servicio 3</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f4" class="form-check-input shadow-none me-1 ">
                                    <label class="form-check-label" for="f4">Servicio 4</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f5" class="form-check-input shadow-none me-1 ">
                                    <label class="form-check-label" for="f5">Servicio 5</label>
                                </div>
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">Huespedes</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adultos</label>
                                        <input type="number" class="form-control shadow-none ">

                                    </div>
                                    <div>
                                        <label class="form-label">Niños</label>
                                        <input type="number" class="form-control shadow-none ">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <?php 
                $room_res = seleccionarTabla("SELECT * FROM `habitacion` WHERE estado=? AND eliminado=?",[1,0],'ii');
                while($room_data = mysqli_fetch_assoc($room_res)){

                    $fea_q=mysqli_query($conexion,"SELECT c.nombre FROM caracteristicas_habitacion ch 
                    JOIN caracteristicas c ON ch.id_caracteristica = c.id 
                    WHERE ch.id_habitacion ='$room_data[id_habitacion]'");
                    $features_data="";

                    while($fea_row=mysqli_fetch_assoc($fea_q)){
                        $features_data .="
                            <span class='badge rounded-pill bg-light text-dark text-wrap '>
                                $fea_row[nombre]
                            </span>";
                       
                        
                    }


                    $fac_q=mysqli_query($conexion,"SELECT s.nombre
                    FROM servicios_habitacion sh
                    JOIN servicios s ON sh.id_servicio = s.id
                    WHERE sh.id_habitacion = '$room_data[id_habitacion]'");
                    
                    $facilities_data="";

                         while($fac_row=mysqli_fetch_assoc($fac_q)){
                        $facilities_data .="
                            <span class='badge rounded-pill bg-light text-dark text-wrap '>
                                $fac_row[nombre]
                            </span>";
                       
                        
                    }

                    //seleccionar la imagen

                    $room_thumn = ROOMS_IMG_PATH."thumbnail.jpg";

                    $thumb_q=mysqli_query($conexion,"SELECT * FROM `room_images` 
                    WHERE id_habitacion='$room_data[id_habitacion]' AND thumb='1' ");

                   if(mysqli_num_rows($thumb_q)>0){
                     $thumb_res= mysqli_fetch_assoc($thumb_q);
                     $room_thumn =ROOMS_IMG_PATH.$thumb_res['image'];
                   }

                   echo<<<data
                        <div class="card mb-4 border-0 shadow">
                        <div class="row g-0 p-3 align-items-center">
                            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                <img src="$room_thumn" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                <h5 class="mb-3">$room_data[tipo_habitacion]</h5>
                                <div class="features mb-3">
                                    <h6 class="mb-1">
                                        Caracteristicas
                                    </h6>
                                    $features_data

                                </div>
                                <div class="facilities mb-3">
                                    <h6 class="mb-1">
                                        Servicios
                                    </h6>
                                    $facilities_data
                                   
                                </div>
                                <div class="guests">
                                    <h6 class="mb-1">Huspedes</h6>
                                    <span class="badge rounded-pill bg-light text-dark text wrap">
                                        $room_data[adulto] Adultos
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text wrap">
                                    $room_data[ninos] Niños
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2  mt-lg-0 mt-md-0 mt-4 text-align-center">
                                <h6 class="mb-4">$room_data[precio_noche] Sus por noche</h6>
                                <a href="#" class="btn btn-sm  btn-outline-dark text-black custom-bg shadow-none mb-2 w-100">Adquiri ahora </a>
                                <a href="room_details.php?id=$room_data[id_habitacion]" class="btn btn-sm btn-outline-dark shadow-none w-100">Mas Detalles </a>

                            </div>
                        </div>
                    </div>
                   data;


                   
                }
                
                
                ?>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php require('./php/footer.php') ?>
    <!-- end of footer -->

</body>

</html>