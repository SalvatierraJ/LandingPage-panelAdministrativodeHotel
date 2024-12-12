
<div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">HOTEL TUYUYU</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum dolores tempore dolorum nostrum ullam dolor tempora explicabo cum facere omnis temporibus iste quas saepe optio consequuntur recusandae, laborum animi illum!</p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="Index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
                <a href="Servicios.php" class="d-inline-block mb-2 text-dark text-decoration-none">Servicios</a><br>
                <a href="habitaciones.php" class="d-inline-block mb-2 text-dark text-decoration-none">Habitaciones</a><br>
                <a href="Contactanos.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contactanos</a><br>
            </div>
            <div class="col-lg-4 p-4">
                <h5>Siguenos</h5>
                    <?php 
                      if($contact_r['tw']!=''){
                        echo <<<data
                            <a href="$contact_r[tw] " class="d-inline-block text-dark fs-5 me-2">
                                
                                <i class="bi bi-twitter me-1"></i>Twitter
                               
                            </a> <br>
                           
                        data;
                    }
                    if($contact_r['fb']!=''){
                        echo <<<data
                                    <a href="$contact_r[fb]" class="d-inline-block text-dark fs-5 me-2">
                                    
                                    <i class="bi bi-facebook me-1"></i>Faccebock
                                    
                                </a><br>
                                
                        data;
                    }
                    if($contact_r['insta']!=''){
                        echo <<<data
                                <a href=" $contact_r[insta] " class="d-inline-block text-dark fs-5 me-2">
                                    <i class="bi bi-instagram me-1"></i> Instagram
                            </a><br>
                           
                        data;
                    }
                    ?>
                
               
              

            </div>
        </div>
    </div>
    <script>
        function setActive(){
           let navbar = document.getElementById('nav-bar');
           let a_tags = navbar.getElementsByTagName('a');

           for(i=0; i<a_tags.length;i++){
            let file= a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if(document.location.href.indexOf(file_name) >= 0){
                a_tags[i].classList.add('active');
            }
           }

        }

        setActive();

    </script>