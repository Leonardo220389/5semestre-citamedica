<?php 
include("db.php");

    if(isset($_GET['idpaciente'])){
        $idpaciente = $_GET['idpaciente'];
        $query = "SELECT idpaciente,nombres, apellidos, cedula, nombre, direccion, correo,telefono ,sexo, fecha_nacimiento FROM paciente P, ciudad C WHERE P.idciudad=C.idciudad and idpaciente=$idpaciente";
        $result= mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $cedula = $row['cedula'];
            $ciudad = $row['nombre'];
            $direccion = $row['direccion'];
            $correo = $row['correo'];
            $telefono = $row['telefono'];
            $sexo = $row['sexo'];
            $fecha_nacimiento = $row['fecha_nacimiento'];
        }

    }

?>

<?php include ("includes/header.php"); ?>


<?php include("formulario_crear.php")?>


<?php include ("includes/footer.php"); ?>