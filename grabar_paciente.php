
<?php

include("db.php");

if(isset($_POST['grabar_paciente'])){
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $query = "INSERT INTO paciente(nombres,apellidos,cedula, idciudad,direccion,correo,telefono,sexo,fecha_nacimiento) VALUES ('$nombres', '$apellidos', '$cedula','$ciudad', '$direccion', '$correo', '$telefono', '$sexo', '$fecha_nacimiento')";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message']= 'Paciente grabado satisfactoriamente';
    $_SESSION['message_type']='success';

    header("Location:index.php");
}

?>