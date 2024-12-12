
let formularioCaracteristicas = document.getElementById('feature_s_form');
let formularioServicios = document.getElementById('facility_s_form');

formularioCaracteristicas.addEventListener('submit', function (e) {
    e.preventDefault();
    agregarCaracteristicas();
})

function agregarCaracteristicas() {
    let dato = new FormData();
    dato.append('nombre', formularioCaracteristicas.elements['feature_name'].value);
    dato.append('agregarCaracteristicas', '');


    let solicitudHTTP = new XMLHttpRequest();
    solicitudHTTP.open("POST", "ajax/servicios_crud.php", true);


    solicitudHTTP.onload = function () {
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        console.log(this.responseText);



        if (this.responseText == 1) {
            alerta('success', 'Se guardo con exito');
            formularioCaracteristicas.elements['feature_name'].value = '';
            obtenerCaracteristicas();

        } else {
            alerta('error ', 'carga de imagen fallida');
        }


    }
    solicitudHTTP.send(dato);
}

function obtenerCaracteristicas() {
    let solicitudHTTP = new XMLHttpRequest();
    solicitudHTTP.open("POST", "ajax/servicios_crud.php", true);
    solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    solicitudHTTP.onload = function () {
        document.getElementById('features-dato').innerHTML = this.responseText;

    }
    solicitudHTTP.send('obtenerCaracteristicas');
}

function eliminarCaracteristicas(val) {
    let solicitudHTTP = new XMLHttpRequest();
    solicitudHTTP.open("POST", "ajax/servicios_crud.php", true);
    solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    solicitudHTTP.onload = function () {
        if (this.responseText == 1) {
            alerta('success', 'se elimino correctamente');
            obtenerCaracteristicas();
        } else if (this.responseText == 'habitacionAgregada') {
            alerta('error', 'Caracteristica añadido a la habitacion');
        } else {
            alerta('error', 'se cayo el servidor, esta triste');
        }


    }
    solicitudHTTP.send('eliminarCaracteristicas=' + val);
}

formularioServicios.addEventListener('submit', function (e) {
    e.preventDefault();
    agregarServicio();
})

function agregarServicio() {
    let dato = new FormData();
    dato.append('nombre', formularioServicios.elements['facility_name'].value);
    dato.append('icon', formularioServicios.elements['facility_icon'].files[0]);
    dato.append('descripcion', formularioServicios.elements['facility_desc'].value);
    dato.append('agregarServicio', '');


    let solicitudHTTP = new XMLHttpRequest();
    solicitudHTTP.open("POST", "ajax/servicios_crud.php", true);


    solicitudHTTP.onload = function () {
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        console.log(this.responseText);




        if (this.responseText == 'inv_img') {
            alerta('error', 'solo svg');

        } else if (this.responseText == 'inv_size') {
            alerta('error ', 'solo imagenes de maximo 1MB');
        } else if (this.responseText == 'upd_failed') {
            alerta('error ', 'carga de imagen fallida');
        } else {
            alerta('success', 'se cargo bien felicidades');
            formularioServicios.reset();
            obtenerServicio();

        }


    }
    solicitudHTTP.send(dato);
}

function obtenerServicio() {
    let solicitudHTTP = new XMLHttpRequest();
    solicitudHTTP.open("POST", "ajax/servicios_crud.php", true);
    solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    solicitudHTTP.onload = function () {
        document.getElementById('facilities-dato').innerHTML = this.responseText;

    }
    solicitudHTTP.send('obtenerServicio');
} 

function eliminarServicio(val) {
    let solicitudHTTP = new XMLHttpRequest();
    solicitudHTTP.open("POST", "ajax/servicios_crud.php", true);
    solicitudHTTP.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    solicitudHTTP.onload = function () {
        if (this.responseText == 1) {
            alerta('success', 'se elimino correctamente');
            obtenerServicio();
        } else if (this.responseText == 'habitacionAgregada') {
            alerta('error', 'Servicio añadido a la habitacion');
        } else {
            alerta('error', 'se cayo el servidor, esta triste');
        }


    }
    solicitudHTTP.send('eliminarServicio=' + val);
}

window.onload = function () {
    obtenerCaracteristicas();
    obtenerServicio();
}
