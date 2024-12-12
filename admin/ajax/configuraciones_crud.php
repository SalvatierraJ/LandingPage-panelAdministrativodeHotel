<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('../phpAdmin/conexion_be.php');
require('../phpAdmin/esenciales.php');
adminLogin();


if(isset($_POST['obtenerInfomacionGeneral'])){
    // Consulta SQL para obtener la información del sitio con el id_sitio igual a 1
    $consultaSQL = "SELECT * FROM `sitio` WHERE `id_sitio`= ?";
    $valores = [1]; // Valor del id_sitio
    $respuesta = seleccionarTabla($consultaSQL, $valores, "i"); // Ejecutar la consulta
    $data = mysqli_fetch_assoc($respuesta); // Obtener los datos de la respuesta
    $json_data = json_encode($data); // Convertir los datos a formato JSON
    echo $json_data; // Imprimir los datos en formato JSON
}



if(isset($_POST['actualizarInformacionGeneral'])){
    $datosFormulario = filtrarPor($_POST); // Filtrar y obtener los datos del formulario

    $consultaSQL = "UPDATE `sitio` SET `titulo`=?,`sobre_nosotros`=? WHERE `id_sitio`=?";
    $valores = [$datosFormulario['titulo'], $datosFormulario['sobre_nosotros'], 1]; // Valores para la actualización
    $respuesta = actualizarTabla($consultaSQL, $valores, 'ssi'); // Ejecutar la actualización
    echo $respuesta; // Imprimir la respuesta de la actualización
}


if(isset($_POST['apagaractualizaciones'])){
    $datosFormulario = ($_POST['apagaractualizaciones'] == 0) ? 1 : 0; // Obtener el nuevo valor para activo

    $consultaSQL = "UPDATE sitio SET activo=? WHERE id_sitio=?";
    $valores = [$datosFormulario, 1]; // Valores para la actualización
    $respuesta = actualizarTabla($consultaSQL, $valores, 'ii'); // Ejecutar la actualización
    echo $respuesta; // Imprimir la respuesta de la actualización
}



if(isset($_POST['obtenerContactos'])){
    $consultaSQL = "SELECT * FROM contactanos_hotel WHERE id=?";
    $valores = [1]; // Valor del id
    $respuesta = seleccionarTabla($consultaSQL, $valores, "i"); // Ejecutar la consulta
    $data = mysqli_fetch_assoc($respuesta); // Obtener los datos de la respuesta
    $json_data = json_encode($data); // Convertir los datos a formato JSON
    echo $json_data; // Imprimir los datos en formato JSON
}


if(isset($_POST['actualizarContactos'])){
    $datosFormulario = filtrarPor($_POST); // Filtrar y obtener los datos del formulario

    $consultaSQL = "UPDATE `contactanos_hotel` SET `direccion`=?,`gmap`=?,`telefono1`=?,`telefono2`=?,`email`=?,`fb`=?,`insta`=?,`tw`=?,iframe=? WHERE id=?";
    $valores = [
        $datosFormulario['direccion'],
        $datosFormulario['gmap'],
        $datosFormulario['telefono1'],
        $datosFormulario['telefono2'],
        $datosFormulario['email'],
        $datosFormulario['fb'],
        $datosFormulario['insta'],
        $datosFormulario['tw'],
        $datosFormulario['iframe'],
        1
    ]; // Valores para la actualización
    $respuesta = actualizarTabla($consultaSQL, $valores, 'sssssssssi'); // Ejecutar la actualización
    echo $respuesta; // Imprimir la respuesta de la actualización
}


if(isset($_POST['agregarMiembro'])){
    $datosFormulario = filtrarPor($_POST); // Filtrar y obtener los datos del formulario
    $resultadoSubidaImagen = cargarImagen($_FILES['imagen'], ABOUT_FOLDER); // Subir la imagen

    if($resultadoSubidaImagen == 'imagenInvalida'){
        echo $resultadoSubidaImagen;
    }else if($resultadoSubidaImagen == 'dimensionInvalida'){
        echo $resultadoSubidaImagen;
    }else if($resultadoSubidaImagen == 'cargaFallida'){
        echo $resultadoSubidaImagen;
    }else{
        $consultaSQL = "INSERT INTO `img`(`nombre`, `imagen`) VALUES (?,?)";
        $valores = [
            $datosFormulario['nombre'],
            $resultadoSubidaImagen
        ]; // Valores para la inserción
        $respuesta = insertarValoresTabla($consultaSQL, $valores, 'ss'); // Ejecutar la inserción
        echo $respuesta; // Imprimir la respuesta de la inserción
    }
}


if(isset($_POST['obtenerMiembros'])){
    $respuesta = seleccionarTodaLa('img'); // Obtener todos los registros de la tabla 'img'

    while($fila = mysqli_fetch_assoc($respuesta)){
        $direccion = ABOUT_IMG_PATH; // Ruta de la carpeta de imágenes
        echo <<< data
            <div class="col-md-2 mb-3">
                <div class="card bg-dark text-white">
                    <img src="$direccion$fila[imagen]" class="card-img">
                    <div class="card-img-overlay text-end">
                        <button type="button" onclick="eliminiarMiembro($fila[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-file-x"></i>BORRAR
                        </button>
                    </div>
                    <p class="card-text text-center px-3 py-2">$fila[nombre]</p>
                </div>
            </div>
        data;
    }
}


if(isset($_POST['eliminiarMiembro'])){
    $datosFormulario = filtrarPor($_POST); // Filtrar y obtener los datos del formulario
    $valores = [$datosFormulario['eliminiarMiembro']]; // Valor del miembro a eliminar

    $prepararConsulta = "SELECT * FROM `img` WHERE id=?";
    $respuesta = seleccionarTabla($prepararConsulta, $valores, 'i'); // Obtener el registro del miembro a eliminar
    $img = mysqli_fetch_assoc($respuesta); // Obtener los datos de la imagen

    if(borrarImagen($img['imagen'], ABOUT_FOLDER)){ // Eliminar la imagen física
        $consultaSQL = "DELETE FROM `img` WHERE `id`=?";
        $respuesta = eliminarValoresTabla($consultaSQL, $valores, 'i'); // Eliminar el registro de la tabla
        echo $respuesta;
    }else{
        echo 0;
    }
}

?>