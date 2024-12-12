<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('SITE_URL','http://127.0.0.1/SoftWare/');
define('ABOUT_IMG_PATH',SITE_URL.'images/about/');
define('CAROUSEL_IMG_PATH',SITE_URL.'images/carousel/');
define('FACILITIES_IMG_PATH',SITE_URL.'images/facilities/');
define('ROOMS_IMG_PATH',SITE_URL.'images/rooms/');


//el baken de carga necesita estos datos
define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/SoftWare/images/');
define('ABOUT_FOLDER','about/');
define('CAROUSEL_FOLDER','carousel/');
define('FACILITIES_FOLDER','facilities/');
define('ROOMS_FOLDER','rooms/');




function adminLogin(){
    session_start();
    
    // Verificar si $_SESSION['adminLogin'] está definida y es igual a true
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] = true)){
        // Redirigir al usuario a la página de inicio
        echo "
        <Script>
        window.location.href='index.php';
        </script>
        ";
        
        // Finalizar la ejecución del script
        exit;
    }
}


function redireccionar($url){
    // Redirigir al usuario a la URL especificada
    echo "
        <Script>
        window.location.href='$url';
        </script>
    ";
    
    // Finalizar la ejecución del script
    exit;
}


function alerta($tipoAlerta, $mensaje){
    // Determinar la clase CSS de la alerta según el tipo de alerta
    $claseAlerta = ($tipoAlerta == "success") ? "alert-success" : "alert-danger";
    
    // Mostrar la alerta en la página
    echo <<<alert
    <div class="alert $claseAlerta alert-dismissible position-fixed fade show custom-alert" role="alert">
        <strong class="me-3">$mensaje </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}


function cargarImagen($imagen, $folder){
    $imagenValida = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mine = $imagen['type'];
    
    // Verificar si el tipo de imagen no está en la lista de tipos permitidos
    if(!in_array($img_mine, $imagenValida)){
        return 'inv_img';  // Imagen inválida o formato no permitido
    }
    // Verificar si el tamaño de la imagen es mayor a 2 MB
    else if(($imagen['size']/(1024*1024)) > 2){
        return 'inv_size';  // Tamaño de imagen inválido
    }
    else{
        $ext = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_'.random_int(11111, 99999).".".$ext;
        
        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        // Mover la imagen cargada al directorio de destino
        if(move_uploaded_file($imagen['tmp_name'], $img_path)){
            return $rname;  // Devolver el nombre de la imagen cargada
        }else{
            return 'upd_failed';  // Error al cargar la imagen
        }
    }
}


function borrarImagen($imagen, $folder){
    // Borrar la imagen del directorio
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$imagen)){
        return true;  // La imagen se borró correctamente
    }else{
        return false;  // Error al borrar la imagen
    }
}


function cargarImagenSVG($image, $folder){
    $imagenValida = ['image/svg+xml'];
    $img_mine = $image['type'];
    
    // Verificar si el tipo de imagen no está en la lista de tipos permitidos
    if(!in_array($img_mine, $imagenValida)){
        return 'inv_img';  // Imagen inválida o formato no permitido
    }
    // Verificar si el tamaño de la imagen es mayor a 1 MB
    else if(($image['size']/(1024*1024)) > 1){
        return 'inv_size';  // Tamaño de imagen inválido
    }
    else{
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_'.random_int(11111, 99999).".".$ext;
        
        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        // Mover la imagen cargada al directorio de destino
        if(move_uploaded_file($image['tmp_name'], $img_path)){
            return $rname;  // Devolver el nombre de la imagen cargada
        }else{
            return 'upd_failed';  // Error al cargar la imagen
        }
    }
}

?>
