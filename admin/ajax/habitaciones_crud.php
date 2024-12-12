<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('../phpAdmin/conexion_be.php');
require('../phpAdmin/esenciales.php');
adminLogin();


if (isset($_POST['agregarHabitacion'])) {
    // Obtener y filtrar los datos del formulario
    $caracteristicas = filtrarPor(json_decode($_POST['caracteristicas']));
    $servicios = filtrarPor(json_decode($_POST['servicios']));
    $datosFormulario = filtrarPor($_POST);
    $bandera = 0;

    // Consulta SQL para insertar datos en la tabla 'habitacion'
    $consultaSQL1 = "INSERT INTO `habitacion`(`tipo_habitacion`, `area`, `cantidad`, `adulto`, `ninos`, `precio_noche`, `descripcion`) VALUES (?,?,?,?,?,?,?)";
    $valores = [
        $datosFormulario['tipo_habitacion'],
        $datosFormulario['area'],
        $datosFormulario['cantidad'],
        $datosFormulario['adulto'],
        $datosFormulario['ninos'],
        $datosFormulario['precio_noche'],
        $datosFormulario['descripcion']
    ];

    // Insertar valores en la tabla 'habitacion'
    if (insertarValoresTabla($consultaSQL1, $valores, 'siiiiis')) {
        $bandera = 1;
    }

    $habitacion_id = mysqli_insert_id($conexion); // Obtener el ID de la habitación recién insertada

    // Consulta SQL para insertar relaciones entre servicios y habitación en la tabla 'servicios_habitacion'
    $consultaSQL2 = "INSERT INTO `servicios_habitacion`( `id_habitacion`, `id_servicio`) VALUES (?,?)";
    if ($sentenciaPreparada = mysqli_prepare($conexion, $consultaSQL2)) {
        // Preparar una sentencia SQL para su ejecución
        
        foreach ($servicios as $f) {
            mysqli_stmt_bind_param($sentenciaPreparada, 'ii', $habitacion_id, $f);
            // Asociar parámetros a la sentencia preparada
            // Enlaza dos parámetros de tipo entero ('ii') con los valores $habitacion_id y $f
            // La función mysqli_stmt_bind_param enlaza los parámetros a la sentencia preparada ($sentenciaPreparada)
            
            mysqli_stmt_execute($sentenciaPreparada);
            // Ejecutar la sentencia preparada
            // La función mysqli_stmt_execute ejecuta la sentencia preparada ($sentenciaPreparada)
        }
        
        mysqli_stmt_close($sentenciaPreparada);
        // Cerrar la sentencia preparada una vez finalizado el bucle
    } else {
        $bandera = 0;
        die('El query de habitacion no está siendo preparado - INSERT');
        // Si la preparación de la sentencia no tiene éxito, se establece $bandera en 0 y se muestra un mensaje de error
    }

    // Consulta SQL para insertar relaciones entre características y habitación en la tabla 'caracteristicas_habitacion'
    $consultaSQL3 = "INSERT INTO `caracteristicas_habitacion`( `id_habitacion`, `id_caracteristica`) VALUES (?,?)";
    if ($sentenciaPreparada = mysqli_prepare($conexion, $consultaSQL3)) {
         // Preparar una sentencia SQL para su ejecución
        foreach ($caracteristicas as $f) {
            mysqli_stmt_bind_param($sentenciaPreparada, 'ii', $habitacion_id, $f); // Asociar parámetros a la sentencia preparada
            
            mysqli_stmt_execute($sentenciaPreparada);// Ejecutar la sentencia preparada
        }
        mysqli_stmt_close($sentenciaPreparada); // Cerrar la sentencia preparada una vez finalizado el bucle
    } else {
        $bandera = 0;
        die('El query de habitacion no está siendo preparado - INSERT');
          // Si la preparación de la sentencia no tiene éxito, se establece $bandera en 0 y se muestra un mensaje de error
    }

    // Comprobar si la operación fue exitosa y enviar respuesta
    if ($bandera) {
        echo 1; // Éxito en la inserción de la habitación
    } else {
        echo 0; // Falla en la inserción de la habitación
    }
}

if (isset($_POST['obtenerTodasHabitaciones'])) {
    // Verificar si se ha enviado la variable 'obtenerTodasHabitaciones' a través del método POST

    $respuesta = seleccionarTabla("SELECT * FROM `habitacion` WHERE eliminado=?", [0], 'i');
    $i = 1;
    // Inicializar una variable de contador en 1 para contar la cantidad de habitaciones

    $datos = "";
    // Inicializar una variable para almacenar los datos generados en el bucle

    while ($fila = mysqli_fetch_assoc($respuesta)) {
        // Iterar sobre cada fila obtenida de la consulta utilizando la función 'mysqli_fetch_assoc'

        if ($fila['estado'] == 1) {
            // Comprobar el valor de la columna 'estado' en la fila actual

            $estado = "
                <button onclick='barraEstadoHabitacion($fila[id_habitacion],0)' class='btn btn-dark shadow-none'>activo</button>
            ";
            // Generar un botón con clase y atributos específicos para el estado activo
        } else {
            $estado = "
            <button onclick='barraEstadoHabitacion($fila[id_habitacion],1)' class='btn btn-warning shadow-none' >Inactivo</button>
        ";
            // Generar un botón con clase y atributos específicos para el estado inactivo
        }

        $datos .= "
            <tr class='align-middle'>
                <!-- Generar una fila de tabla con clase de alineación específica -->
                <td>$i</td>
                <!-- Mostrar el valor del contador en la columna -->
                <td>$fila[tipo_habitacion]</td>
                <!-- Mostrar el valor de la columna 'tipo_habitacion' en la columna -->
                <td>$fila[area] m</td>
                <!-- Mostrar el valor de la columna 'area' en la columna -->
                <td>
                    <span class='badge rounded-pill bg-ligh text-dark'> 
                        Adultos: $fila[adulto]
                    </span><br>
                    <span class='badge rounded-pill bg-ligh text-dark'> 
                        Niños: $fila[ninos]
                    </span><br>
                </td>
                <!-- Generar etiquetas de insignia con valores de las columnas 'adulto' y 'ninos' -->
                <td>$ $fila[precio_noche]</td>
                <!-- Mostrar el valor de la columna 'precio_noche' en la columna -->
                <td> $fila[cantidad]</td>
                <!-- Mostrar el valor de la columna 'cantidad' en la columna -->
                <td>$estado</td>
                <!-- Mostrar el botón de estado generado en la columna -->
                <td> 
                    <button type='button' onclick='editarDetalles($fila[id_habitacion])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i> 
                        
                    </button>
                    <!-- Generar un botón de edición con atributos específicos -->
                    <button type='button' onclick=\"room_images($fila[id_habitacion],'$fila[tipo_habitacion]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-image'>
                        <i class='bi bi-images'></i> 
                        
                    </button>
                    <!-- Generar un botón para imágenes de habitación con atributos específicos -->
                    <button type='button' onclick='ieliminarHabitacion($fila[id_habitacion])' class='btn btn-danger shadow-none btn-sm'>
                        <i class='bi bi-trash'></i> 
                    
                    </button>
                    <!-- Generar un botón de eliminación con atributos específicos -->
                </td>
            </tr>
            <!-- Cerrar la fila de tabla generada -->
        ";

        $i++;
        // Incrementar el contador en cada iteración
    }

    echo $datos;
    // Imprimir los datos generados en el bucle
}

if (isset($_POST['obtenerHabitacion'])) {
    

    $datosFormulario = filtrarPor($_POST);
    $respuesta1 = seleccionarTabla("SELECT * FROM `habitacion` WHERE `id_habitacion`=?", [$datosFormulario['obtenerHabitacion']], 'i');
    // Ejecutar una consulta SQL utilizando una función llamada 'seleccionarTabla'
    // La consulta selecciona todas las filas de la tabla 'habitacion' donde 'id_habitacion' es igual al valor recibido en $datosFormulario['obtenerHabitacion']
    // Los valores para la consulta son proporcionados en un array [$datosFormulario['obtenerHabitacion']] y se especifica el tipo de dato 'i' (entero)

    $respuesta2 = seleccionarTabla("SELECT * FROM `caracteristicas_habitacion` WHERE `id_habitacion`=?", [$datosFormulario['obtenerHabitacion']], 'i');
    // Ejecutar una consulta SQL similar para obtener las características de la habitación

    $respuesta3 = seleccionarTabla("SELECT * FROM `servicios_habitacion` WHERE `id_habitacion`=?", [$datosFormulario['obtenerHabitacion']], 'i');
    // Ejecutar una consulta SQL similar para obtener los servicios de la habitación

    $datosHabitacion = mysqli_fetch_assoc($respuesta1);
    // Obtener los datos de la habitación utilizando la función 'mysqli_fetch_assoc' para extraer una fila de resultado de la consulta $respuesta1

    $caracteristicas = [];
    // Inicializar un array vacío para almacenar las características de la habitación

    if (mysqli_num_rows($respuesta2) > 0) {
        // Verificar si se obtuvieron filas de resultado en la consulta $respuesta2

        while ($fila = mysqli_fetch_assoc($respuesta2)) {
            // Iterar sobre cada fila obtenida de la consulta utilizando la función 'mysqli_fetch_assoc'

            array_push($caracteristicas, $fila['id_caracteristica']);
            // Agregar el valor de la columna 'id_caracteristica' al array de características
        }
    }

    $servicios = [];
    // Inicializar un array vacío para almacenar los servicios de la habitación

    if (mysqli_num_rows($respuesta3) > 0) {
        // Verificar si se obtuvieron filas de resultado en la consulta $respuesta3

        while ($fila = mysqli_fetch_assoc($respuesta3)) {
            // Iterar sobre cada fila obtenida de la consulta utilizando la función 'mysqli_fetch_assoc'

            array_push($servicios, $fila['id_servicio']);
            // Agregar el valor de la columna 'id_servicio' al array de servicios
        }
    }

    $datos = ["roomdata" => $datosHabitacion, "caracteristicas" => $caracteristicas, "servicios" => $servicios];
    // Crear un array asociativo con los datos obtenidos: información de la habitación, características y servicios

    $datos = json_encode($datos);
    // Convertir el array de datos en una cadena JSON utilizando la función 'json_encode'

    echo $datos;
    // Imprimir la cadena JSON como respuesta de la solicitud
}

if (isset($_POST['edicionHabitacion'])) {
    

    $caracteristicas = filtrarPor(json_decode($_POST['caracteristicas']));
    // Filtrar y almacenar las características recibidas en la variable $caracteristicas
    // Los datos se decodifican de JSON utilizando la función 'json_decode'
    $servicios = filtrarPor(json_decode($_POST['servicios']));
    // Filtrar y almacenar los servicios recibidos en la variable $servicios
    // Los datos se decodifican de JSON utilizando la función 'json_decode'

    $datosFormulario = filtrarPor($_POST);
    // Filtrar y almacenar los demás datos del formulario recibidos en la variable $datosFormulario

    $bandera = 0;
    // Inicializar una variable $bandera con valor 0 (indicador de éxito/fallo)

    // Comentario: Los siguientes bloques de código están comentados y no se ejecutan en este momento.

    // $consultaSQL1 = "UPDATE habitacion SET tipo_habitacion=?, area=?, cantidad=?, adulto=?, ninos=?, precio_noche=?, descripcion=? WHERE id_habitacion=?";
    // $valores=[$datosFormulario['tipo_habitacion'],$datosFormulario['area'],$datosFormulario['cantidad'],
    // $datosFormulario['adulto'],$datosFormulario['ninos'],$datosFormulario['precio_noche'],
    // $datosFormulario['descripcion'],$datosFormulario['id_habitacion']];
    // if(actualizarTabla($consultaSQL1,$valores,'siiiiisi')){
    //     $bandera =1;
    // }

    $eliminarServicios = eliminarValoresTabla("DELETE FROM `servicios_habitacion` WHERE id_habitacion=?", [$datosFormulario['id_habitacion']], 'i');
    // Eliminar los registros de la tabla 'servicios_habitacion' relacionados con la habitación específica
    $eliminarCaracteristicas = eliminarValoresTabla("DELETE FROM `caracteristicas_habitacion` WHERE id_habitacion=?", [$datosFormulario['id_habitacion']], 'i');
    // Eliminar los registros de la tabla 'caracteristicas_habitacion' relacionados con la habitación específica

    if (!($eliminarCaracteristicas && $eliminarServicios)) {
        // Verificar si no se pudieron eliminar correctamente los registros de características y servicios

        $bandera = 0;
        // Establecer la bandera en 0 (indicador de fallo)
    }

    $consultaSQL2 = "INSERT INTO `servicios_habitacion`( `id_habitacion`, `id_servicio`) VALUES (?,?)";
    // Consulta SQL para insertar nuevos registros de servicios relacionados con la habitación

    if ($sentenciaPreparada = mysqli_prepare($conexion, $consultaSQL2)) {
        // Preparar una sentencia SQL utilizando la función 'mysqli_prepare' con la conexión a la base de datos y la consulta SQL

        foreach ($servicios as $f) {
            // Iterar sobre cada servicio en el array $servicios

            mysqli_stmt_bind_param($sentenciaPreparada, 'ii', $datosFormulario['id_habitacion'], $f);
            // Asociar los parámetros de la sentencia preparada con los valores correspondientes
            // Se utiliza 'ii' para indicar que ambos valores son enteros

            mysqli_stmt_execute($sentenciaPreparada);
            // Ejecutar la sentencia preparada
        }

        $bandera = 1;
        // Establecer la bandera en 1 (indicador de éxito)
        mysqli_stmt_close($sentenciaPreparada);
        // Cerrar la sentencia preparada

    } else {
        $bandera = 0;
        die('El query de habitacion no esta siendo preparado - INSERT');
        // Si la preparación de la sentencia falla, establecer la bandera en 0 y mostrar un mensaje de error
        // La ejecución del script se detiene con la función 'die'
    }

    $consultaSQL3 = "INSERT INTO `caracteristicas_habitacion`( `id_habitacion`, `id_caracteristica`) VALUES (?,?)";
    // Consulta SQL para insertar nuevos registros de características relacionadas con la habitación

    if ($sentenciaPreparada = mysqli_prepare($conexion, $consultaSQL3)) {
        // Preparar una sentencia SQL utilizando la función 'mysqli_prepare' con la conexión a la base de datos y la consulta SQL

        foreach ($caracteristicas as $f) {
            // Iterar sobre cada característica en el array $caracteristicas

            mysqli_stmt_bind_param($sentenciaPreparada, 'ii', $datosFormulario['id_habitacion'], $f);
            // Asociar los parámetros de la sentencia preparada con los valores correspondientes
            // Se utiliza 'ii' para indicar que ambos valores son enteros

            mysqli_stmt_execute($sentenciaPreparada);
            // Ejecutar la sentencia preparada
        }

        $bandera = 1;
        // Establecer la bandera en 1 (indicador de éxito)

        mysqli_stmt_close($sentenciaPreparada);
        // Cerrar la sentencia preparada

    } else {
        $bandera = 0;
        die('El query de habitacion no esta siendo preparado - INSERT');
        // Si la preparación de la sentencia falla, establecer la bandera en 0 y mostrar un mensaje de error
        // La ejecución del script se detiene con la función 'die'
    }

    if ($bandera) {
        echo 1;
        // Si la bandera es verdadera (1), imprimir '1' (indicador de éxito)
    } else {
        echo 0;
        // Si la bandera es falsa (0), imprimir '0' (indicador de fallo)
    }
}

if (isset($_POST['barraEstadoHabitacion'])) {
    $datosFormulario = filtrarPor($_POST);
    $consultaSQL = "UPDATE `habitacion` SET `estado`=? WHERE `id_habitacion`=?";
    // Consulta SQL para actualizar el estado de la habitación en la tabla 'habitacion'

    $valores = [$datosFormulario['value'], $datosFormulario['barraEstadoHabitacion']];
    // Almacenar los valores a ser utilizados en la consulta SQL
    if (actualizarTabla($consultaSQL, $valores, 'ii')) {
        // Llamar a la función 'actualizarTabla' pasando la consulta SQL, los valores y tipos de datos correspondientes
        // La función 'actualizarTabla' ejecuta la consulta y devuelve verdadero o falso según el éxito o el fallo

        echo 1;
        // Si la actualización fue exitosa, imprimir '1'
    } else {
        echo 2;
        // Si la actualización falló, imprimir '2'
    }
}

if (isset($_POST['agregarImagen'])) {
    $datosFormulario = filtrarPor($_POST);
    $resultadoSubidaImagen = cargarImagen($_FILES['imagen'], ROOMS_FOLDER);
    // Llamar a la función 'cargarImagen' para subir la imagen
    if ($resultadoSubidaImagen == 'imagenInvalida') {
        echo $resultadoSubidaImagen;
        // Si la subida de la imagen falló debido a una imagen inválida, imprimir 'imagenInvalida'
    } else if ($resultadoSubidaImagen == 'dimencionInvalida') {
        echo $resultadoSubidaImagen;
        // Si la subida de la imagen falló debido a dimensiones inválidas, imprimir 'dimencionInvalida'
    } else if ($resultadoSubidaImagen == 'cargaFallida') {
        echo $resultadoSubidaImagen;
        // Si la subida de la imagen falló debido a una carga fallida, imprimir 'cargaFallida'
    } else {
        $consultaSQL = "INSERT INTO `room_images`(`id_habitacion`, `image`) VALUES (?,?)";
        // Consulta SQL para insertar los valores en la tabla 'room_images'
        $valores = [$datosFormulario['id_habitacion'], $resultadoSubidaImagen];
        // Almacenar los valores a ser utilizados en la consulta SQL
        $respuesta = insertarValoresTabla($consultaSQL, $valores, 'is');
        // Llamar a la función 'insertarValoresTabla' pasando la consulta SQL, los valores y tipos de datos correspondientes

        echo $respuesta;
        // Imprimir el resultado de la inserción en la tabla 'room_images'
    }
}

if (isset($_POST['obtenerImagenesHabitacion'])) {
    $datosFormulario = filtrarPor($_POST);
    $respuesta = seleccionarTabla("SELECT * FROM `room_images` WHERE id_habitacion=?", [$datosFormulario['obtenerImagenesHabitacion']], 'i');
    // Ejecutar una consulta SQL para seleccionar todas las imágenes de la habitación especificada

    $direccion = ROOMS_IMG_PATH;

    while ($fila = mysqli_fetch_assoc($respuesta)) {
        // Iterar sobre cada fila de resultados

        if ($fila['thumb'] == 1) {
            $thumb_btn = "<i class='bi bi-check2-square text-light bg-success px-2 py-1 rounded fs-5'></i>";
        } else {
            $thumb_btn = "
            <button onclick='imagenVisible($fila[id],$fila[id_habitacion])' class='btn btn-secondary shadow-none' >
                <i class='bi bi-check2-square'></i>
            </button>
            ";
        }

        echo <<<data
            <tr class='align-middle'>
                <td><img src='$direccion$fila[image]' class='img-fluid'></td>
                <td>$thumb_btn</td>
                <td>
                    <button onclick='eliminarImagenHabitacion($fila[id],$fila[id_habitacion])' class='btn btn-danger shadow-none' >
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>
        data;
    }
}

if (isset($_POST['eliminarImagenHabitacion'])) {

    $datosFormulario = filtrarPor($_POST);

    $valores = [$datosFormulario['imagen'], $datosFormulario['id_habitacion']];

    $consultaSqlPreparada = "SELECT * FROM `room_images` WHERE id=? AND id_habitacion=? ";
    $respuesta = seleccionarTabla($consultaSqlPreparada, $valores, 'ii');
    $img = mysqli_fetch_assoc($respuesta); // Obtener los datos de la habitación utilizando la función 'mysqli_fetch_assoc' para extraer una fila de resultados

    if (borrarImagen($img['image'], ROOMS_FOLDER)) {
        $consultaSQL = "DELETE FROM `room_images` WHERE `id`=? AND id_habitacion=?";
        $respuesta = eliminarValoresTabla($consultaSQL, $valores, 'ii');
        echo $respuesta;
    } else {
        echo 0;
    }
}



if (isset($_POST['imagenVisible'])) {
    $datosFormulario = filtrarPor($_POST);

    $consultaSqlPreparada = "UPDATE `room_images` SET `thumb`=? WHERE `id_habitacion`=?";
    $valoresPreparados = [0, $datosFormulario['id_habitacion']];
    $respuestaPreparada = actualizarTabla($consultaSqlPreparada, $valoresPreparados, 'ii');

    $consultaSQL = "UPDATE `room_images` SET `thumb`=? WHERE id=? AND `id_habitacion`=?";
    $valores =[1,$datosFormulario['imagen'],$datosFormulario['id_habitacion']];
    $respuesta=actualizarTabla($consultaSQL,$valores,'iii');

    echo $respuesta;
}



if (isset($_POST['ieliminarHabitacion'])) {
    $datosFormulario = filtrarPor($_POST);

    $respuesta1= seleccionarTabla("SELECT * FROM `room_images` WHERE id_habitacion=?",[$datosFormulario['id_habitacion']],'i');

    while($fila=mysqli_fetch_assoc($respuesta1)){
         // Obtener los datos utilizando la función 'mysqli_fetch_assoc' para extraer una fila de resultados
        borrarImagen($fila['image'],ROOMS_FOLDER);

    }

    $respuesta2 =eliminarValoresTabla("DELETE FROM `room_images` WHERE  id_habitacion=?",[$datosFormulario['id_habitacion']],'i');
    $respuesta3 =eliminarValoresTabla("DELETE FROM `caracteristicas_habitacion` WHERE id_habitacion=?",[$datosFormulario['id_habitacion']],'i');
    $respuesta4 =eliminarValoresTabla("DELETE FROM `servicios_habitacion` WHERE id_habitacion=?",[$datosFormulario['id_habitacion']],'i');
    $respuesta5 =eliminarValoresTabla("UPDATE habitacion SET eliminado=? WHERE  id_habitacion=?",[1,$datosFormulario['id_habitacion']],'ii');


    if($respuesta2 || $respuesta3 || $respuesta4 || $respuesta5){
        echo 1;
    }else{
        echo 0;
    }

    
}