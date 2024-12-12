<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $Servidor="localhost";
    $usuario="root";
    $claveSecretaServidor="";
    $nombreBaseDatos="hotel_tuyuyu";

   
    $conexion=mysqli_connect($Servidor,$usuario,$claveSecretaServidor,$nombreBaseDatos);

    if($conexion->connect_error){

        die("Error al conectar a la base de datos de la pagina" .$conexion->connect_error);
    }


function filtrarPor($dato){
    foreach($dato as $llaveDato => $valores){
      // Limpia y sanitiza la cadena:
      // elimina espacios en blanco y caracteres de escape, convierte caracteres especiales en entidades HTML y elimina etiquetas HTML y PHP.
        $valores = trim($valores);
        $valores = stripslashes($valores);
        $valores = htmlspecialchars($valores);
        $valores = strip_tags($valores);
        $dato[$llaveDato] = $valores;
    }
    return $dato;
}


function seleccionarTodaLa($tabla){
    $conexionBaseDeDatos = $GLOBALS['conexion'];
    
    
    $respuesta = mysqli_query($conexionBaseDeDatos, "SELECT * FROM $tabla");
    
    return $respuesta;// devuelve toda la tabla que le enviaste
}


function seleccionarTabla($consultaSQL, $valores, $tipoDeDatos){
    $conexionBaseDeDatos = $GLOBALS['conexion'];
    
    // Prepara la consulta SQL
    if($sentencia = mysqli_prepare($conexionBaseDeDatos, $consultaSQL)){
        // Asocia los valores a la consulta preparada
        mysqli_stmt_bind_param($sentencia, $tipoDeDatos, ...$valores);
        
        // Ejecuta la consulta preparada
        if(mysqli_stmt_execute($sentencia)){
            // Obtiene el resultado de la consulta
            $res = mysqli_stmt_get_result($sentencia);
            
            // Cierra la consulta preparada
            mysqli_stmt_close($sentencia);
            
            return $res;
        }else{
            mysqli_stmt_close($sentencia);
            
            // Muestra un mensaje de error si la consulta no se está ejecutando correctamente
            die("Query no se está ejecutando - select");
        }
    }else{
        // Muestra un mensaje de error si la consulta no se está preparando correctamente
        die("Query no se está preparando - select");
    }
}




function actualizarTabla($consultaSQL, $valores, $tipoDeDatos) {
    
    $conexionBaseDeDatos = $GLOBALS['conexion'];
    
    // Prepara la consulta SQL
    if ($sentencia = mysqli_prepare($conexionBaseDeDatos, $consultaSQL)) {
        // Asocia los valores a la consulta preparada
        mysqli_stmt_bind_param($sentencia, $tipoDeDatos, ...$valores);
        
        // Ejecuta la consulta preparada
        if (mysqli_stmt_execute($sentencia)) {
            // Obtiene el número de filas afectadas por la consulta
            $res = mysqli_stmt_affected_rows($sentencia);
            
            // Cierra la consulta preparada
            mysqli_stmt_close($sentencia);
            
            return $res;
        } else {
            mysqli_stmt_close($sentencia);
            
            // Muestra un mensaje de error si la consulta no se está ejecutando correctamente
            die("Query no se está ejecutando - actualizarTabla");
        }
    } else {
        // Muestra un mensaje de error si la consulta no se está preparando correctamente
        die("Query no se está preparando - actualizarTabla");
    }
}


function insertarValoresTabla($consultaSQL, $valores, $tipoDeDatos) {
   
    $conexionDeLaBaseDatos = $GLOBALS['conexion'];
    
    // Prepara la consulta SQL
    if ($sentencia = mysqli_prepare($conexionDeLaBaseDatos, $consultaSQL)) {
        // Asocia los valores a la consulta preparada
        mysqli_stmt_bind_param($sentencia, $tipoDeDatos, ...$valores);
        
        // Ejecuta la consulta preparada
        if (mysqli_stmt_execute($sentencia)) {
            // Obtiene el número de filas afectadas por la consulta
            $res = mysqli_stmt_affected_rows($sentencia);
            
            // Cierra la consulta preparada
            mysqli_stmt_close($sentencia);
            
            return $res;
        } else {
            mysqli_stmt_close($sentencia);
            
            // Muestra un mensaje de error si la consulta no se está ejecutando correctamente
            die("Query no se está ejecutando - insertarValoresTabla");
        }
    } else {
        // Muestra un mensaje de error si la consulta no se está preparando correctamente
        die("Query no se está preparando - insertarValoresTabla");
    }
}

function eliminarValoresTabla($consultaSQL, $valores, $tipoDeDatos) {
   
    $conexionBaseDeDatos = $GLOBALS['conexion'];
    
    // Prepara la consulta SQL
    if ($sentencia = mysqli_prepare($conexionBaseDeDatos, $consultaSQL)) {
        // Asocia los valores a la consulta preparada
        mysqli_stmt_bind_param($sentencia, $tipoDeDatos, ...$valores);
        
        // Ejecuta la consulta preparada
        if (mysqli_stmt_execute($sentencia)) {
            // Obtiene el número de filas afectadas por la consulta
            $res = mysqli_stmt_affected_rows($sentencia);
            
            // Cierra la consulta preparada
            mysqli_stmt_close($sentencia);
            
            return $res;
        } else {
            mysqli_stmt_close($sentencia);
            
            // Muestra un mensaje de error si la consulta no se estáAquí tienes el código con comentarios aplicando las prácticas de código limpio:

        }
    }
}

?>