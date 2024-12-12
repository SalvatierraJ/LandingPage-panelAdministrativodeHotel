<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HOTEL TUYUYU - Acerca de Nosotros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('./php/links.php') ?>
    <style>
        .box {
            border-top-color: #279e8c !important;
        }
    </style>


</head>

<body class="bg-light">
    <!-- login and register-->
    <?php require('./php/login_registro.php') ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Acerca de Nosotros </h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis eius consequatur dicta <br>
            rem id perferendis blanditiis minima voluptatum alias nam nostrum error earum deserunt totam incidunt, eligendi temporibus, at veritatis!
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Temporibus praesentium id harum reiciendis sed provident eum.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="./images/about/about.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="./images/about/hotel.svg" width="70px">
                    <h4>100+ <br>Habitaciones</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="./images/about/customers.svg" width="70px">
                    <h4>200+ <br>Clientes</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="./images/about/rating.svg" width="70px">
                    <h4>150+ <br>Visistas</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="./images/about/staff.svg" width="70px">
                    <h4>100+ <br> Staffts</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">EQUIPO ADMINISTRATIVO</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php 
                $about_r=seleccionarTodaLa('img');
                $path=ABOUT_IMG_PATH;

                while($row = mysqli_fetch_assoc($about_r)){
                    echo<<<data
                            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                                <img src="$path$row[imagen]" class="w-100">
                                <h5 class="mt-2">$row[nombre]</h5>
                             </div>
                    data;
                }
                
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- footer -->
    <?php require('./php/footer.php') ?>
    <!-- end of footer -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView:4,
            spaceBetween:40,
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