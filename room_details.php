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

    <?php
    if (!isset($_GET['id'])) {
        redireccionar('habitaciones.php');
    }

    $data = filtrarPor($_GET);
    $room_res = seleccionarTabla("SELECT * FROM `habitacion` WHERE id_habitacion=? AND estado=? AND eliminado=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redireccionar('habitaciones.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);



    ?>



    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold"><?php echo $room_data['tipo_habitacion'] ?></h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-dsecondary text-decaration-none">Home</a>
                    <span class=" text-secondary "> > </span>
                    <a href="habitaciones.php" class="text-dsecondary text-decaration-none">Habitaciones</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 px-4 ">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $room_img = ROOMS_IMG_PATH . "thumbnail.jpg";

                        $img_q = mysqli_query($conexion, "SELECT * FROM `room_images` 
                        WHERE id_habitacion='$room_data[id_habitacion]'");

                        if (mysqli_num_rows($img_q) > 0) {
                            $active_class = 'active';

                            while ($img_res = mysqli_fetch_assoc($img_q)) {
                                echo "
                                <div class='carousel-item $active_class'>
                                    <img src='" . ROOMS_IMG_PATH . $img_res['image'] . "' class='d-block w-100 rounded' >
                                </div>
                                ";
                            }
                        } else {
                            echo "
                                <div class='carousel-item active'>
                                    <img src='$room_img' class='d-block w-100' >
                                </div>
                            ";
                        }


                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>

            <div class="col-lg-5 col-md-12 px-4">

                <div class="card mb-4 border-0 shadow rounded-3">
                    <div class="card-body">
                        <?php
                        echo <<<price
                                <h4 >$room_data[precio_noche] SUS por noche</h4>
                            price;
                        echo <<<reating
                                <div class="rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                 </div>
                            reating;

                        $fea_q = mysqli_query($conexion, "SELECT c.nombre FROM caracteristicas_habitacion ch 
                             JOIN caracteristicas c ON ch.id_caracteristica = c.id 
                             WHERE ch.id_habitacion ='$room_data[id_habitacion]'");
                        $features_data = "";

                        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                            $features_data .= "
                                        <span class='badge rounded-pill bg-light text-dark text-wrap '>
                                            $fea_row[nombre]
                                        </span>";
                        }

                        $fac_q = mysqli_query($conexion, "SELECT s.nombre
                        FROM servicios_habitacion sh
                        JOIN servicios s ON sh.id_servicio = s.id
                        WHERE sh.id_habitacion = '$room_data[id_habitacion]'");

                        echo <<<caracteristicas
                            <div class=" mb-3">
                                <h6 class="mb-1">
                                    Caracteristicas
                                </h6>
                                $features_data
        
                            </div>

                        caracteristicas;

                        $facilities_data = "";

                        while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                            $facilities_data .= "
                                <span class='badge rounded-pill bg-light text-dark text-wrap '>
                                    $fac_row[nombre]
                                </span>";
                        }

                        echo<<<servicios
                        <div class=" mb-3">
                            <h6 class="mb-1">
                                Servicios
                            </h6>
                            $facilities_data
    
                        </div>

                    servicios;

                        echo<<<guest
                                         <div class="guests">
                                            <h6 class="mb-1">Huspedes</h6>
                                            <span class="badge rounded-pill bg-light text-dark text wrap">
                                                $room_data[adulto] Adultos
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text wrap">
                                            $room_data[ninos] Niños
                                            </span>
                                        </div>
                        guest;

                        echo<<<area
                            <div class=" mb-3">
                                <h6 class="mb-1">
                                   Area
                                </h6>
                                <span class='badge rounded-pill bg-light text-dark text-wrap '>
                                    $room_data[area] Metros Cuadrados
                                </span>
                               

                            </div>

                        area;

                        echo<<<book
                            <a href="#" class="btn  btn-outline-dark text-black custom-bg shadow-none mb-1 w-100">Adquirir ahora </a>
                        book;




                        ?>
                    </div>
                </div>

            </div>

            <div class=" col-12 mt-4 px-4">
                <div class="mb-4">
                 <h5>Descripcion</h5>
                <p>
                    <?php 
                    echo $room_data['descripcion']
                    
                    
                    ?>
                


                 </p>
                </div>
                <div>
                    <h5 class="mb-3">Opiniones y Calificaciones</h5>
                    <div class=" d-flex align-items-center mb-2">
                        <i class="bi bi-person-circle" style="font-size:50px;"></i>
                        <h6 class="m-0 ms-2">Usuario Aleatorio</h6>
                    </div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Quam suscipit quas officiis libero ratione culpa officia
                        accusantium corrupti numquam exercitationem.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>


                </div>
            </div>

            

        </div>
    </div>

    <!-- footer -->
    <?php require('./php/footer.php') ?>
    <!-- end of footer -->

</body>

</html>