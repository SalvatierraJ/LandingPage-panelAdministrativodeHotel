let formularioAgregarHabitacion = document.getElementById('add_room_form');


        formularioAgregarHabitacion.addEventListener('submit', function(e) {
            e.preventDefault();
            agregarHabitacion();
        });

        function agregarHabitacion() { 

            let datos = new FormData();
            datos.append('agregarHabitacion', '');
            datos.append('tipo_habitacion', formularioAgregarHabitacion.elements['name'].value);
            datos.append('area', formularioAgregarHabitacion.elements['area'].value);
            datos.append('precio_noche', formularioAgregarHabitacion.elements['precio'].value);
            datos.append('cantidad', formularioAgregarHabitacion.elements['cantidad'].value);
            datos.append('adulto', formularioAgregarHabitacion.elements['adult'].value);
            datos.append('ninos', formularioAgregarHabitacion.elements['ninos'].value);
            datos.append('descripcion', formularioAgregarHabitacion.elements['desc'].value);

            let caracteristicasHabitacion = [];
            formularioAgregarHabitacion.elements['caracteristicas'].forEach(el => {
                if (el.checked) {
                    caracteristicasHabitacion.push(el.value);
                }
            });

            let serviciosHabitacion = [];
            const checkboxes = document.querySelectorAll('input[name="servicios"]:checked');
            checkboxes.forEach(checkbox => {
                serviciosHabitacion.push(checkbox.value);
            });

            datos.append('servicios', JSON.stringify(serviciosHabitacion));
            datos.append('caracteristicas', JSON.stringify(caracteristicasHabitacion));



            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);


            solicitudHTTP.onload = function() {
                var myModal = document.getElementById('add-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();




                if (this.responseText == 1) {
                    alerta('success', 'Se guardo la habitacion con exito');
                    formularioAgregarHabitacion.reset();
                    obtenerTodasHabitaciones();

                } else {
                    alerta('error ', 'carga de Habitacion revise las consultas fallida');
                }


            }
            solicitudHTTP.send(datos);

        }


        function obtenerTodasHabitaciones() {

            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                document.getElementById('room-datos').innerHTML = this.responseText;


            }
            solicitudHTTP.send('obtenerTodasHabitaciones');
        }
        let formularioEditarHabitacion = document.getElementById('edit_room_form');

        function editarDetalles(id) {
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                let datos = JSON.parse(this.responseText);


                formularioEditarHabitacion.elements['name'].value = datos.roomdata.tipo_habitacion;
                formularioEditarHabitacion.elements['area'].value = datos.roomdata.area;
                formularioEditarHabitacion.elements['precio'].value = datos.roomdata.precio_noche;
                formularioEditarHabitacion.elements['cantidad'].value = datos.roomdata.cantidad;
                formularioEditarHabitacion.elements['adult'].value = datos.roomdata.adulto;
                formularioEditarHabitacion.elements['ninos'].value = datos.roomdata.ninos;
                formularioEditarHabitacion.elements['desc'].value = datos.roomdata.descripcion;
                formularioEditarHabitacion.elements['room_id'].value = datos.roomdata.id_habitacion;



                formularioEditarHabitacion.elements['caracteristicas'].forEach(el => {
                    if (datos.caracteristicasHabitacion.includes(Number(el.value))) {
                        el.checked = true;
                    }
                });
                const serviciosElements = document.querySelectorAll('input[name="servicios"]');
                serviciosElements.forEach(el => {
                    if (datos.serviciosHabitacion.includes(Number(el.value))) {
                        el.checked = true;
                    }
                });








            }
            solicitudHTTP.send('obtenerHabitacion=' + id);

        }
        formularioEditarHabitacion.addEventListener('submit', function(e) {
            e.preventDefault();
            enviarEdicionHabitacion();
        });

        function enviarEdicionHabitacion() {

            let datos = new FormData();
            datos.append('edicionHabitacion', '');
            datos.append('id_habitacion', formularioEditarHabitacion.elements['room_id'].value);
            datos.append('tipo_habitacion', formularioAgregarHabitacion.elements['name'].value);
            datos.append('area', formularioAgregarHabitacion.elements['area'].value);
            datos.append('precio_noche', formularioAgregarHabitacion.elements['precio'].value);
            datos.append('cantidad', formularioAgregarHabitacion.elements['cantidad'].value);
            datos.append('adulto', formularioAgregarHabitacion.elements['adult'].value);
            datos.append('ninos', formularioAgregarHabitacion.elements['ninos'].value);
            datos.append('descripcion', formularioAgregarHabitacion.elements['desc'].value);

            let caracteristicasHabitacion = [];
            formularioEditarHabitacion.elements['caracteristicas'].forEach(el => {
                if (el.checked) {
                    caracteristicasHabitacion.push(el.value);
                }
            });

            let serviciosHabitacion = [];
            const checkboxes = document.querySelectorAll('input[name="servicios"]:checked');
            checkboxes.forEach(checkbox => {
                serviciosHabitacion.push(checkbox.value);
            });

            datos.append('servicios', JSON.stringify(serviciosHabitacion));
            datos.append('caracteristicas', JSON.stringify(caracteristicasHabitacion));



            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);


            solicitudHTTP.onload = function() {
                var myModal = document.getElementById('edit-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.close();




                if (this.responseText == 1) {
                    alerta('success', 'Se editaron los datos de la habitacion con exito');
                    formularioEditarHabitacion.reset();
                    obtenerTodasHabitaciones();

                } else {
                    alerta('error ', 'carga de Habitacion fallida revise las consultas ');
                }


            }

            solicitudHTTP.send(datos);

        }


        function barraEstadoHabitacion(id, val) {

            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                if (this.responseText == 1) {
                    alerta('success', 'estado de habitacion cambiado');
                    obtenerTodasHabitaciones();
                } else {
                    alerta('error', 'algo paso, el estado de la habitacion no se cambio');
                }

            }
            solicitudHTTP.send('barraEstadoHabitacion=' + id + '&value=' + val); 
        }

        let formularioAgregarImagen = document.getElementById('add_image_form');

        formularioAgregarImagen.addEventListener('submit', function(e) {
            e.preventDefault();
            agregarImagen();
        });

        function agregarImagen() {
            let datos = new FormData();

            datos.append('imagen', formularioAgregarImagen.elements['image'].files[0]);
            datos.append('id_habitacion', formularioAgregarImagen.elements['room_id'].value);
            datos.append('agregarImagen', '');


            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);


            solicitudHTTP.onload = function() {

                if (this.responseText == 'imagenInvalida') {
                    alerta('error', 'solo jpg y png');
                    get_general();
                } else if (this.responseText == 'dimencionInvalida') {
                    alerta('error ', 'solo imagenes de maximo 2MB');
                } else if (this.responseText == 'cargaFallida') {
                    alerta('error ', 'carga de imagen fallida');
                } else {
                    alerta('success', 'se cargo bien felicidades');
                    imagenesHabitacion(formularioAgregarImagen.elements['room_id'].value, document.querySelector("#room-image .modal-title").innerText);
                    formularioAgregarImagen.reset();

                }


            }
            solicitudHTTP.send(datos);
        }

        function imagenesHabitacion(idHabitacion, nombreHabitacion) {
            document.querySelector("#room-image .modal-title").innerText = nombreHabitacion;
            formularioAgregarImagen.elements['room_idHabitacion'].value = idHabitacion;
            formularioAgregarImagen.elements['image'].value = '';

            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                document.getElementById('room-image-datos').innerHTML = this.responseText;
            }
            solicitudHTTP.send('obtenerImagenesHabitacion=' + idHabitacion);



        }

        function eliminarImagenHabitacion(idImagen, idHabitacion) {
            let datos = new FormData();

            datos.append('imagen', idImagen);
            datos.append('id_habitacion', idHabitacion);
            datos.append('eliminarImagenHabitacion', '');


            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);


            solicitudHTTP.onload = function() {

                if (this.responseText == 1) {
                    alerta('success', 'Se elimino la imagen');

                    imagenesHabitacion(idHabitacion, document.querySelector("#room-image .modal-title").innerText);


                } else {
                    alerta('error', 'Fallo al remover la imagen');


                }


            }
            solicitudHTTP.send(datos);
        }


        function imagenVisible(idImagen, idHabitacion) {
            let datos = new FormData();

            datos.append('imagen', idImagen);
            datos.append('id_habitacion', idHabitacion);
            datos.append('imagenVisible', '');


            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);


            solicitudHTTP.onload = function() {

                if (this.responseText == 1) {
                    alerta('success', 'Se publico la Imagen');

                    imagenesHabitacion(idHabitacion, document.querySelector("#room-image .modal-title").innerText);


                } else {
                    alerta('error', 'Fallo al remover la imagen');


                }


            }
            solicitudHTTP.send(datos);
        }


        function ieliminarHabitacion(idHabitacion) {

            if (confirm("Estas seguro que deseas eliminar la habitacion?")) {
                let datos = new FormData();
                datos.append('id_habitacion', idHabitacion);
                datos.append('ieliminarHabitacion', '');

                
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/habitaciones_crud.php", true);


            solicitudHTTP.onload = function() {

                if (this.responseText == 1) {
                    alerta('success', 'Se elimino la Habitacion');
                    obtenerTodasHabitaciones();

                } else {
                    alerta('error', 'Fallo al remover la imagen');


                }


            }
            solicitudHTTP.send(datos);
            }



        }
        window.onload = function() {
            obtenerTodasHabitaciones();
        }