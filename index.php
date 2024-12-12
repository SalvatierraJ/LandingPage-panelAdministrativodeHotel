<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HOTEL TUYUYU - HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('./php/links.php') ?>

</head>

<body class="bg-light">
    <!-- login and register-->
    <?php require('./php/login_registro.php') ?>
    <!-- fin login and register-->

    <!-- Carrousel -->
    <div class="continer-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php 
                
                // $res = seleccionarTodaLa('carousel');


                // while($row = mysqli_fetch_assoc($res)){
                //     $path =CAROUSEL_IMG_PATH;
                //     echo <<< data
                    
                //     <div class="swiper-slide ">
                //         <img src="$path$row[image]" class="w-100 d-block">
                //     </div>
                   
                //     data;
                // }
                ?>
          
            </div>

        </div>
    </div>
    <!-- check form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">aqui va algo</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Fecha de entrada</label>
                            <input type="date" class="form-control shadow-none ">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Fecha de salida</label>
                            <input type="date" class="form-control shadow-none ">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;"> Adultos </label>
                            <select class="form-select shadow-none">
                                <option selected>Open this select menu</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;"> Niños </label>
                            <select class="form-select shadow-none">
                                <option selected>Open this select menu</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-black shadow-none custom-bg ">Check</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- habitaciones -->
    <h2 class="mt-5 pt-4 mb-4 text-center vw-bold h-font">Nuestras Habitaciones</h2>

    <div class="container">
        <div class="row">
        <?php 
                // $room_res = seleccionarTabla("SELECT * FROM `habitacion` WHERE estado=? AND eliminado=?  ORDER BY id_habitacion DESC LIMIT 3",[1,0],'ii');
                // while($room_data = mysqli_fetch_assoc($room_res)){

                //     $fea_q=mysqli_query($conexion,"SELECT c.nombre FROM caracteristicas_habitacion ch 
                //     JOIN caracteristicas c ON ch.id_caracteristica = c.id 
                //     WHERE ch.id_habitacion ='$room_data[id_habitacion]'");
                //     $features_data="";

                //     while($fea_row=mysqli_fetch_assoc($fea_q)){
                //         $features_data .="
                //             <span class='badge rounded-pill bg-light text-dark text-wrap '>
                //                 $fea_row[nombre]
                //             </span>";
                       
                        
                //     }


                //     $fac_q=mysqli_query($conexion,"SELECT s.nombre
                //     FROM servicios_habitacion sh
                //     JOIN servicios s ON sh.id_servicio = s.id
                //     WHERE sh.id_habitacion = '$room_data[id_habitacion]'");
                    
                //     $facilities_data="";

                //          while($fac_row=mysqli_fetch_assoc($fac_q)){
                //         $facilities_data .="
                //             <span class='badge rounded-pill bg-light text-dark text-wrap '>
                //                 $fac_row[nombre]
                //             </span>";
                       
                        
                //     }

                //     //seleccionar la imagen

                //     $room_thumn = ROOMS_IMG_PATH."thumbnail.jpg";

                //     $thumb_q=mysqli_query($conexion,"SELECT * FROM `room_images` 
                //     WHERE id_habitacion='$room_data[id_habitacion]' AND thumb='1' ");

                //    if(mysqli_num_rows($thumb_q)>0){
                //      $thumb_res= mysqli_fetch_assoc($thumb_q);
                //      $room_thumn =ROOMS_IMG_PATH.$thumb_res['image'];
                //    }

                //    echo<<<data
                //         <div class="col-lg-4 col-md-6 my-3">
                //         <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                //             <img src="$room_thumn" class="card-img-top">
                //             <div class="card-body">
                //                 <h5>$room_data[tipo_habitacion]</h5>
                //                 <h6 class="mb-4">$room_data[precio_noche] SUS por noche</h6>
                //                 <div class="features mb-4">
                //                     <h6 class="mb-1">
                //                         Caracteristicas
                //                     </h6>
                //                     $features_data

                //                 </div>
                //                 <div class="facilities mb-4">
                //                     <h6 class="mb-1">
                //                         Servicios
                //                     </h6>
                //                     $facilities_data

                //                 </div>
                //                 <div class="guests mb-4">
                //                     <h6 class="mb-1">Huspedes</h6>
                //                     <span class="badge rounded-pill bg-light text-dark text wrap">
                //                         $room_data[adulto] Adultos
                //                     </span>
                //                     <span class="badge rounded-pill bg-light text-dark text wrap">
                //                       $room_data[ninos] Niños
                //                     </span>
                //                 </div>
                //                 <div class="rating mb-4">
                //                     <h6 class="mb-1">
                //                         Calificacion
                //                     </h6>
                //                     <span class="badge rounded-pill bg-light">
                //                         <i class="bi bi-star-fill text-warning"></i>
                //                         <i class="bi bi-star-fill text-warning"></i>
                //                         <i class="bi bi-star-fill text-warning"></i>
                //                         <i class="bi bi-star-fill text-warning"></i>
                //                         <i class="bi bi-star-fill text-warning"></i>
                //                     </span>

                //                 </div>
                //                 <div class="d-flex justify-content-evenly mb-2">
                //                     <a href="#" class="btn btn-sm  btn-outline-dark text-black custom-bg shadow-none">Adquiri ahora </a>
                //                     <a href="room_details.php?id=$room_data[id_habitacion]" class="btn btn-sm btn-outline-dark shadow-none">Mas Detalles </a>
                //                 </div>

                //             </div>
                //         </div>
                //     </div>
                //    data;


                   
                // }
                
                
                ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="habitaciones.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Mas Habitaciones >>></a>
            </div>
        </div>
    </div>
    <!-- Servicios -->
    <h2 class="mt-5 pt-4 mb-4 text-center vw-bold h-font">Nuestros Servicios</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-6">
        <?php 
            //    $res = mysqli_query($conexion,"SELECT * FROM `servicios`  ORDER BY id DESC LIMIT 5");
            //    $path= FACILITIES_IMG_PATH;

            //    while($row = mysqli_fetch_assoc($res)){
            //      echo<<<data
            //                 <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            //                     <img src="$path$row[icon]" width="60px">
            //                 <h5 class="mt-3">$row[nombre]</h5>
            //                 </div>
                          
            //             data;
            //    }
            
            ?>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Mas Servicios >>></a>
        </div>
    </div>

    <!-- Testimonios -->
    <h2 class="mt-5 pt-4 mb-4 text-center vw-bold h-font">Testimonios</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonios">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4 ">
                    <div class="profile d-flex align-items-center mb-3">
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
                <div class="swiper-slide bg-white p-4 ">
                    <div class="profile d-flex align-items-center p-4">
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
                <div class="swiper-slide bg-white p-4 ">
                    <div class="profile d-flex align-items-center p-4">
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
                <div class="swiper-slide bg-white p-4 ">
                    <div class="profile d-flex align-items-center p-4">
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
            <div class="swiper-paginationn"></div>
         
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="About.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Ver Mas >>></a>
        </div>
    </div>
    <!-- Encuentranos -->
  
    <h2 class="mt-5 pt-4 mb-4 text-center vw-bold h-font">Encuentranos</h2>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100" rounded height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Llamanos</h5>
                    <a href="tel: <?php //echo $contact_r['telefono1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-forward"></i> +<?php //echo $contact_r['telefono1'] ?>
                    </a>
                    <?php 
                    // if($contact_r['telefono2']!=''){
                    //     echo <<<data
                    //             <a href="tel: $contact_r[telefono2]" class="d-inline-block  text-decoration-none text-dark">
                    //                 <i class="bi bi-telephone-forward"></i> + $contact_r[telefono2] 
                    //             </a>
                    //     data;
                    // }
                    
                    ?>
                    
                </div> <br>
                <div class="bg-white p-4 rounded">
                    <h5>Siguenos</h5>

                    <?php 
                    // if($contact_r['tw']!=''){
                    //     echo <<<data
                    //         <a href="$contact_r[tw] " class="d-inline-block mb-3">
                    //             <span class="badge bg-light text-dark fs-6 p-2">
                    //                 <i class="bi bi-twitter"></i> Twitter
                    //             </span>
                    //         </a>
                    //         <br>
                    //     data;
                    // }
                    // if($contact_r['fb']!=''){
                    //     echo <<<data
                    //                 <a href="$contact_r[fb]" class="d-inline-block mb-3">
                    //                 <span class="badge bg-light text-dark fs-6 p-2">
                    //                     <i class="bi bi-facebook"></i>  Faccebock
                    //                 </span>
                    //             </a>
                    //             <br>
                    //     data;
                    // }
                    // if($contact_r['insta']!=''){
                    //     echo <<<data
                    //             <a href=" $contact_r[insta] " class="d-inline-block mb-3">
                    //             <span class="badge bg-light text-dark fs-6 p-2">
                    //                 <i class="bi bi-instagram"></i> Instagram
                    //             </span>
                    //         </a>
                    //         <br>
                    //     data;
                    // }
                    
                    
                    ?>
                   
                </div>

            </div>




        </div>
    </div>




    <br><br><br>
    <br><br><br>

    <!-- footer -->
    <?php require('./php/footer.php') ?>
    <!-- end of footer -->



    <script src="./scripts/index.js"></script>
    <?php require('./php/scripts.php') ?>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        var swiper = new Swiper(".swiper-testimonios", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            },
        });
    </script>
</body>

</html>