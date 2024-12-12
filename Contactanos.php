<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HOTEL TUYUYU - CONTACTANOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('./php/links.php') ?>


</head>

<body class="bg-light">
    <!-- login and register-->
    <?php require('./php/login_registro.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Contactanos</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis eius consequatur dicta <br>
            rem id perferendis blanditiis minima voluptatum alias nam nostrum error earum deserunt totam incidunt, eligendi temporibus, at veritatis!
        </p>
    </div>




    <div class="container">
        
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <iframe class="w-100" rounded height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
                    <h5>Direccion</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['direccion'] ?>
                    </a>

                    <h5 class="mt-4">LLAMANOS</h5>
                    <a href="tel: <?php echo $contact_r['telefono1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-forward"></i> +<?php echo $contact_r['telefono1'] ?>
                    </a>
                    <?php 
                    if($contact_r['telefono2']!=''){
                        echo <<<data
                                <a href="tel: $contact_r[telefono2]" class="d-inline-block  text-decoration-none text-dark">
                                    <i class="bi bi-telephone-forward"></i> + $contact_r[telefono2] 
                                </a>
                        data;
                    }
                    
                    ?>

                    <h5 class="mt-4">Correo Electronico</h5>
                    <a href="email: <?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark">
                        <i class="bibi-envelope-fill"></i><?php echo $contact_r['email'] ?>
                    </a>

                    <h5 class="mt-4">Siguenos</h5>
                    <?php 
                    if($contact_r['tw']!=''){
                        echo <<<data
                            <a href="$contact_r[tw] " class="d-inline-block text-dark fs-5 me-2">
                                
                                <i class="bi bi-twitter me-1"></i>
                               
                            </a>
                           
                        data;
                    }
                    if($contact_r['fb']!=''){
                        echo <<<data
                                    <a href="$contact_r[fb]" class="d-inline-block text-dark fs-5 me-2">
                                    
                                    <i class="bi bi-facebook me-1"></i>  
                                    
                                </a>
                                
                        data;
                    }
                    if($contact_r['insta']!=''){
                        echo <<<data
                                <a href=" $contact_r[insta] " class="d-inline-block text-dark fs-5 me-2">
                                    <i class="bi bi-instagram me-1"></i> 
                            </a>
                           
                        data;
                    }
                    
                    
                    ?>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <form method="POST" >
                        <h5>Mandanos un Mensaje</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Nombre</label>
                            <input name="nombre"  require type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" require type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Titulo</label>
                            <input name="titulo" require type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Mensaje</label>
                            <textarea name="mensaje"  require class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn btn-dark text-white mt-3">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['send'])){

        $frm_data = filtrarPor($_POST);

        $q="INSERT INTO `user_contactanos`( `nombre`, `email`, `titulo`, `mensaje`) VALUES (?,?,?,?)";
        $values=[$frm_data['nombre'],$frm_data['email'],$frm_data['titulo'],$frm_data['mensaje']];

        $res = insertarValoresTabla($q,$values,'ssss');

        if($res==1){
           alerta('success','Correo enviado');
        }else{
            alerta('error','El servidor no responde o tu internet esta lento');
        }
    }
    ?>

    <!-- footer -->
    <?php require('./php/footer.php') ?>
    <!-- end of footer -->

</body>

</html>