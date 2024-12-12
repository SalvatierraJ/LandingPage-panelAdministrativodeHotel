
        let datosGenerales, datosDeContacto;


        let formularioGeneralConfiguracion = document.getElementById('general_s_form');
        let entradaSitioTitulo = document.getElementById('site_title_inp');
        let inputDescripcionSitio = document.getElementById('site_about_inp');

        let formularioContactos = document.getElementById('contacts_s_form');

        let formularioEquipo = document.getElementById('team_s_form');
        let entradaNombreMiembro = document.getElementById('member_name_inp');
        let entradaImagenMiembro = document.getElementById('member_picture_inp');

        function obtenerInfomacionGeneral() {
            let tituloSitio = document.getElementById('site_title');
            let descripcionSitio = document.getElementById('site_about');




            let interruptorApagado  = document.getElementById('switch_apagado');

            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {

                datosGenerales = JSON.parse(this.responseText);

                tituloSitio.innerText = datosGenerales.titulo;
                descripcionSitio.innerText = datosGenerales.sobre_nosotros;

                entradaSitioTitulo.value = datosGenerales.titulo;
                inputDescripcionSitio.value = datosGenerales.sobre_nosotros;

                if (datosGenerales.activo == 0) {
                    interruptorApagado .checked = false;
                    interruptorApagado .value = 0;

                } else {
                    interruptorApagado .checked = true;
                    interruptorApagado .value = 1;
                }
            }
            solicitudHTTP.send('obtenerInfomacionGeneral');
        }

        formularioGeneralConfiguracion.addEventListener('submit', function(e) {
            e.preventDefault();
            actualizarInformacionGeneral(entradaSitioTitulo.value, inputDescripcionSitio.value);

        })

        function actualizarInformacionGeneral(tituloDelSitioValores, descripcionDelSitioValores) {
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {

                var myModal = document.getElementById('general-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();


                if (this.responseText == 1) {
                    alerta('success', 'Dato Guardado Correctamente');
                    obtenerInfomacionGeneral();
                } else {
                    alerta('error ', 'Ni modo choco no guardo');
                }


            }
            solicitudHTTP.send('titulo=' + tituloDelSitioValores + '&sobre_nosotros=' + descripcionDelSitioValores + '&actualizarInformacionGeneral');
        }


        function apagaractualizaciones(valores) {
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                if (this.responseText == 1 && datosGenerales.activo == 0) {
                    alerta('success', 'El sitio web esta activo');

                } else {
                    alerta('success ', 'esta desactivado el sitio choquito');
                }
                obtenerInfomacionGeneral();
            }
            solicitudHTTP.send('apagaractualizaciones=' + valores);
        }

        function obtenerContactos() {

            let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw'];
            let mapaHotel = document.getElementById('iframe');

            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                datosDeContacto = JSON.parse(this.responseText);
                datosDeContacto = Object.values(datosDeContacto);

                for (i = 0; i < contacts_p_id.length; i++) {

                    document.getElementById(contacts_p_id[i]).innerText = datosDeContacto[i + 2];

                }datos

                mapaHotel.src = datosDeContacto[10];
                ingresarContactos(datosDeContacto);


                // console.log(datosDeContacto);



            }
            solicitudHTTP.send('obtenerContactos');
        }


        function ingresarContactos(datos) {

            let idsEntradaContactos  = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];

            for (i = 0; i < idsEntradaContactos .length; i++) {
                document.getElementById(idsEntradaContactos [i]).value = datos[i + 2];
            }

        }

        formularioContactos.addEventListener('submit', function(e) {
            e.preventDefault();
            actualizarContactos();
        })

        function actualizarContactos() {
            let nombresCampos  = ['direccion', 'gmap', 'telefono1', 'telefono2', 'email', 'fb', 'insta', 'tw', 'iframe'];
            let idsEntradaContactos  = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];

            let cadenaDatos  = "";

            for (i = 0; i < nombresCampos .length; i++) {
                cadenaDatos  += nombresCampos [i] + "=" + document.getElementById(idsEntradaContactos [i]).value + '&';
            }

            cadenaDatos  += "actualizarContactos";

            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            solicitudHTTP.onload = function() {
                var myModal = document.getElementById('contacts-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if (this.responseText == 1) {
                    alerta('success', 'cambios guardados');
                    obtenerContactos();

                } else {
                    alerta('error ', 'nada choco no guardo');
                }

            }
            solicitudHTTP.send(cadenaDatos);

        }
        formularioEquipo.addEventListener('submit', function(e) {
            e.preventDefault();
            agregarMiembro();
        })

        function agregarMiembro() {
            let datos = new FormData();
            datos.append('nombre', entradaNombreMiembro.value);
            datos.append('imagen', entradaImagenMiembro.files[0]);
            datos.append('agregarMiembro', '');


            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);


            solicitudHTTP.onload = function() {
                var myModal = document.getElementById('team-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                console.log(this.responseText);



                if (this.responseText == 'imagenInvalida') {
                    alerta('error', 'solo jpg y png');
                    obtenerInfomacionGeneral();
                } else if (this.responseText == 'dimensionInvalida') {
                    alerta('error ', 'solo imagenes de maximo 2MB');
                } else if (this.responseText == 'cargaFallida') {
                    alerta('error ', 'carga de imagen fallida');
                } else {
                    alerta('success', 'se cargo bien felicidades');
                    entradaNombreMiembro.values = '';
                    entradaImagenMiembro.value = '';
                    obtenerMiembros();

                }


            }
            solicitudHTTP.send(datos);
        }

        function obtenerMiembros(){
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                document.getElementById('team-data').innerHTML = this.responseText;

            }
            solicitudHTTP.send('obtenerMiembros');
        }

        function eliminiarMiembro(valores){
            let solicitudHTTP = new XMLHttpRequest();
            solicitudHTTP.open("POST", "ajax/configuraciones_crud.php", true);
            solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            solicitudHTTP.onload = function() {
                if(this.responseText ==1){
                    alerta('success', 'se elimino correctamente');
                    obtenerMiembros();
                }else{
                    alerta('error','se cayo el servidor, esta triste');
                }

           
            }
            solicitudHTTP.send('eliminiarMiembro='+valores); 
        }

        window.onload = function() {
            obtenerInfomacionGeneral();
            obtenerContactos();
            obtenerMiembros();
        }
