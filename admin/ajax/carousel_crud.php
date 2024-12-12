<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('../phpAdmin/conexion_be.php');
require('../phpAdmin/esenciales.php');
adminLogin();


if(isset($_POST['agregarImagen'])){
    $resultadoSubida = cargarImagen($_FILES['imagen'], CAROUSEL_FOLDER); // Subir la imagen al directorio del carrusel

    if($resultadoSubida == 'imagenInvalida'){
        echo $resultadoSubida;
    }else if($resultadoSubida == 'magnitudInvalida'){
        echo $resultadoSubida;
    }else if($resultadoSubida == 'cargaFallida'){
        echo $resultadoSubida;
    }else{
        $consultaSQL = "INSERT INTO `carousel`(`image`) VALUES (?)";
        $valores = [$resultadoSubida]; // Valor de la imagen subida
        $respuesta = insertarValoresTabla($consultaSQL, $valores, 's'); // Insertar la imagen en la tabla 'carousel'
        echo $respuesta;
    }
}


if(isset($_POST['obtenerCarruselDeImagenes'])){
    $respuesta = seleccionarTodaLa('carousel'); // Obtener todas las imágenes del carrusel

    while($fila = mysqli_fetch_assoc($respuesta)){
        $direccion = CAROUSEL_IMG_PATH; // Ruta de la carpeta de imágenes del carrusel
        echo <<< data
            <div class="col-md-4 mb-3">
                <div class="card bg-dark text-white">
                    <img src="$direccion$fila[image]" class="card-img">
                    <div class="card-img-overlay text-end">
                        <button type="button" onclick="eliminarImagen($fila[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-file-x"></i>BORRAR
                        </button>
                    </div>
                </div>
            </div>
        data;
    }
}

if(isset($_POST['eliminarImagen'])){
    $datosFormulario = filtrarPor($_POST); // Filtrar y obtener los datos del formulario
    $valores = [$datosFormulario['eliminarImagen']]; // Valor de la imagen a eliminar

    $prepararConsulta = "SELECT * FROM `carousel` WHERE id=?";
    $respuesta = seleccionarTabla($prepararConsulta, $valores, 'i'); // Obtener el registro de la imagen a eliminar
    $img = mysqli_fetch_assoc($respuesta); // Obtener los datos de la imagen

    if(borrarImagen($img['image'], CAROUSEL_FOLDER)){ // Eliminar la imagen física
        $consultaSQL = "DELETE FROM `carousel` WHERE `id`=?";
        $respuesta = eliminarValoresTabla($consultaSQL, $valores, 'i'); // Eliminar el registro de la tabla 'carousel'
        echo $respuesta;
    }else{
        echo 0;
    }
}

?>