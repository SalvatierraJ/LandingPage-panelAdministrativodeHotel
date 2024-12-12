<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HOTEL TUYUYU - SERVICIOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('./php/links.php') ?>
    <style>
        .pop:hover{
            border-top: #279e8c !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

</head>

<body class="bg-light">
    <!-- login and register-->
    <?php require('./php/login_registro.php') ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Nuestros Servicios</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis eius consequatur dicta <br>
            rem id perferendis blanditiis minima voluptatum alias nam nostrum error earum deserunt totam incidunt, eligendi temporibus, at veritatis!
        </p>
    </div>

    <div class="container">
        <div class="row">
            <?php 
               $res = seleccionarTodaLa('servicios');
               $path= FACILITIES_IMG_PATH;

               while($row = mysqli_fetch_assoc($res)){
                 echo<<<data
                            <div class="col-lg-4 col-md-6 mb-5 px-4">
                                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="$path$row[icon]" width="40px">
                                    <h5 class="m-0 ms-3">$row[nombre]</h5>
                                    </div>
                                    
                                    <p>
                                        $row[descripcion]
                                    </p>
                                </div>
                            </div>
                    
                        data;
               }
            
            ?>
        </div>
    </div>

    <!-- footer -->
    <?php require('./php/footer.php') ?>
    <!-- end of footer -->

</body>

</html>