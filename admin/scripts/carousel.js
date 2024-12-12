
        let general_data, contacts_data;



        // let contacts_s_form = document.getElementById('contacts_s_form');

        let formularioCarrusel = document.getElementById('carousel_s_form');
        let imagenEntradaCarrusel = document.getElementById('carousel_picture_inp');

   
        formularioCarrusel.addEventListener('submit', function(e) {
            e.preventDefault();
            agregarImagen();
        })

        function agregarImagen() {
            let solicitudImagen = new FormData();
        
            solicitudImagen.append('imagen', imagenEntradaCarrusel.files[0]);
            solicitudImagen.append('agregarImagen', '');


            let solicitudHTTP  = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/carousel_crud.php", true);


            solicitudHTTP.onload = function() {
                var myModal = document.getElementById('carousel-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();



                if (this.responseText == 'imagenInvalida') {
                    alerta('error', 'solo jpg y png');
                    get_general();
                } else if (this.responseText == 'magnitudInvalida') {
                    alerta('error ', 'solo imagenes de maximo 2MB');
                } else if (this.responseText == 'cargaFallida') {
                    alerta('error ', 'carga de imagen fallida');
                } else {
                    alerta('success', 'se cargo bien felicidades');
                  
                    imagenEntradaCarrusel.value = '';
                    obtenerCarruselDeImagenes();

                }


            }
            solicitudHTTP.send(solicitudImagen);
        }

        function obtenerCarruselDeImagenes(){
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/carousel_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                document.getElementById('carousel-data').innerHTML = this.responseText;

            }
            solicitudHTTP.send('obtenerCarruselDeImagenes');
        }

        function eliminarImagen(val){
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/carousel_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                if(this.responseText ==1){
                    alerta('success', 'se elimino correctamente');
                    obtenerCarruselDeImagenes();
                }else{
                    alerta('error','se cayo el servidor, esta triste');
                }

           
            }
            solicitudHTTP.send('eliminarImagen='+val); 
        }

        window.onload = function() {
          
            obtenerCarruselDeImagenes();
        }
