<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include './conexion_be.php';
 

    $Nombres =$_POST['Nombres'];
    $ApellidoP=$_POST['ApellidoP'];
    $ApellidoM=$_POST['ApellidoM'];
    $Telefono=$_POST['telefono'];
    $CI=$_POST['CI'];
    $pasaporte=$_POST['pasaporte'];
    $correo=$_POST['correo'];
    $Contrasena=$_POST['password'];
    $ContrasenaC=$_POST['passwordCF'];
   
    $Usuario=$_POST['Usuario'];
    $rol='cliente';

    if (empty($Nombres) || empty($ApellidoP) || empty($ApellidoM) || empty($Telefono) || empty($CI) || empty($pasaporte) || empty($correo) || empty($Contrasena) || empty($Usuario)) {
        echo'
        <script>
            alert("complete todos los campos vacios gualele");
            window.location="../index.php";
        </script>
        ';
    } else if($ContrasenaC != $Contrasena){
        
        echo'
        <script>
            alert("tu contrasena no coincide gualele");
            window.location="../index.php";
        </script>
        ';

    }else{
       
    $query="INSERT INTO Usuarios (nombre, apellido_paterno, apellido_materno, telefono, ci, pasaporte, correo_electronico, rol, nombre_usuario, contrasena)
    VALUES ('$Nombres', '$ApellidoP', '$ApellidoM', '$Telefono', '$CI', '$pasaporte', '$correo', '$rol', '$Usuario', '$Contrasena')";

    $ver_usu="SELECT * FROM Usuarios WHERE nombre_usuario='$Usuario'";
    $verificar_usuario = mysqli_query($conexion,$ver_usu);

    if(mysqli_num_rows($verificar_usuario)>0){
        echo'
        <script>
            alert("Usted ya se encuentra registrado");
            window.location="../index.php";
        </script>
        ';
        mysqli_close($conexion);
        exit();
    }

    $ver_ci="SELECT * FROM Usuarios WHERE ci='$CI'";
    $verificar_ci = mysqli_query($conexion,$ver_ci);


    
    if(mysqli_num_rows($verificar_ci)>0){
        echo'
        <script>
            alert("Usted ya se encuentra registrado");
            window.location="../index.php";
        </script>
        ';
        mysqli_close($conexion);
        exit();
    }
 

    if ($conexion->query($query) === TRUE) {
        $ejecutar = true;
        
        $last_id = $conexion->insert_id;
    
        
        if ($rol == "cliente") {
            
            $sql_cliente = "INSERT INTO cliente (id_cliente) VALUES ('$last_id')";
    
            if ($conexion->query($sql_cliente) === TRUE) {
                echo "Registro insertado correctamente como cliente";
            } else {
                echo "Error al insertar en la tabla Cliente: " . $conexion->error;
            }
        } elseif ($rol == "admin" || $rol == "personal") {
           
            $sql_personal = "INSERT INTO personal (id_personal) VALUES ('$last_id')";
    
            if ($conexion->query($sql_personal) === TRUE) {
                echo "Registro insertado correctamente como administrador o personal";
            } else {
                echo "Error al insertar en la tabla Personal: " . $conexion->error;
            }
        } else {
            $ejecutar=false;
            echo "Rol no válido";
        }
    } else {
        echo "Error al insertar en la tabla Usuarios: " . $conexion->error;
    }
    
 
    


    
    

    

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location="../index.php";
            </script>

        ';
    }else{
        echo '
        <script>
            alert("error");
            window.location="../index.php";
        </script>

    ';
    }

    mysqli_close($conexion);
    }
   



?>