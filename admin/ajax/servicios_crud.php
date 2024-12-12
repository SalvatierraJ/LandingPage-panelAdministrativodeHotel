<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('../phpAdmin/conexion_be.php');
require('../phpAdmin/esenciales.php');
adminLogin();


if(isset($_POST['agregarCaracteristicas'])){
    $datosFormulario = filtrarPor($_POST);

    $consultaSQL="INSERT INTO `caracteristicas`(`nombre`) VALUES (?)";
    $valores= [$datosFormulario['nombre']];
    $respuesta = insertarValoresTabla($consultaSQL,$valores,'s');
    echo $respuesta; // Mensaje de respuesta después de insertar los valores
}

if(isset($_POST['obtenerCaracteristicas'])){
    $respuesta = seleccionarTodaLa('caracteristicas');
    $i=1;

    // Obtener una fila del resultado como un array asociativo
    while($fila = mysqli_fetch_assoc($respuesta)){
        echo <<< data
                <tr>
                    <td>$i</td>
                    <td>$fila[nombre]</td>
                    <td>
                        <button type="button"  onclick="eliminarCaracteristicas($fila[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-file-x"></i>BORRAR
                        </button>
                    </td>
                </tr>
            data;
        $i++; // Incremento del contador de características
    }
}

if(isset($_POST['eliminarCaracteristicas'])){
    $datosFormulario = filtrarPor($_POST);
    $valores = [$datosFormulario['eliminarCaracteristicas']];

    $verificarConsulta = seleccionarTabla('SELECT * FROM `caracteristicas_habitacion` WHERE id_caracteristica=?',[$datosFormulario['eliminarCaracteristicas']],'i');
    //cuenta las filas de la consulta que acabamos de hacer
    if(mysqli_num_rows($verificarConsulta)==0){ 
        $consultaSQL="DELETE FROM `caracteristicas` WHERE `id`=?";
        $respuesta = eliminarValoresTabla($consultaSQL,$valores,'i');
        echo $respuesta;
    }else{
        echo 'habitacionAgregada'; // La caracteristica se encuentra agregada a una hbitacion
    }
}

if(isset($_POST['agregarServicio'])){
    $datosFormulario = filtrarPor($_POST);

    $resultadoSubidaImagen = cargarImagenSVG($_FILES['icon'],FACILITIES_FOLDER);

    if($resultadoSubidaImagen == 'inv_img'){
        echo $resultadoSubidaImagen; // Respuesta de imagen inválida
    }else if($resultadoSubidaImagen == 'inv_size'){
        echo $resultadoSubidaImagen; // Respuesta de tamaño de imagen inválida
    }else if($resultadoSubidaImagen == 'upd_failed'){
        echo $resultadoSubidaImagen; // Subida de imagen fallida
    }else{
        $consultaSQL = "INSERT INTO `servicios`(icon,`nombre`, `descripcion`) VALUES (?,?,?)";
        $valores= [$resultadoSubidaImagen,$datosFormulario['nombre'],$datosFormulario['descripcion']];
        
        $respuesta = insertarValoresTabla($consultaSQL,$valores,'sss');
        echo $respuesta; // Mensaje de respuesta después de insertar los valores
    }
}

if(isset($_POST['obtenerServicio'])){
    $respuesta = seleccionarTodaLa('servicios');
    $i=1;
    $direccion=FACILITIES_IMG_PATH;
    // Obtener una fila del resultado como un array asociativo
    while($fila = mysqli_fetch_assoc($respuesta)){
        echo <<< data
                <tr class='align-middle'>
                    <td>$i</td>
                    <td><img src="$direccion$fila[icon]" width="100px"></td>
                    <td>$fila[nombre]</td>
                    <td>$fila[descripcion]</td>
                    <td>
                        <button type="button"  onclick="eliminarServicio($fila[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-file-x"></i>BORRAR
                        </button>
                    </td>
                </tr>
            data;
        $i++; // Incremento del contador de servicios
    }
}

if(isset($_POST['eliminarServicio'])){
    $datosFormulario = filtrarPor($_POST);
    $valores = [$datosFormulario['eliminarServicio']];

    $verificarConsulta = seleccionarTabla('SELECT * FROM `servicios_habitacion` WHERE id_servicio=?',[$datosFormulario['eliminarCaracteristicas']],'i');
     //cuenta las filas de la consulta que acabamos de hacer
    if(mysqli_num_rows($verificarConsulta)==0){
        $pre_q="SELECT * FROM `servicios` WHERE id=?";
        $respuesta = seleccionarTabla($pre_q,$valores,'i');
        $img = mysqli_fetch_assoc($respuesta);
    
        if(borrarImagen($img['icon'],FACILITIES_FOLDER)){
            $consultaSQL="DELETE FROM `servicios` WHERE `id`=?";
            $respuesta = eliminarValoresTabla($consultaSQL,$valores,'i');
            echo $respuesta; // Mensaje de respuesta después de eliminar el servicio
        }else{
            echo 0; // Falla al eliminar la imagen
        }
    }else{
        echo 'habitacionAgregada'; // El servicio se encuentra agregado a una habitación
    }
}

?>