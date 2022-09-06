<?php   
include("db.php");
     
     if(isset($_POST['actualizar_cita'])){
        $idcita = $_GET['idcita'];
        $medico = $_POST['medico'];
        $fecha_atencion = $_POST['fecha_atencion'];
        $hora_atencion =$_POST['hora_atencion'];

        $query = "UPDATE cita SET idmedico = '$medico', fecha_atencion ='$fecha_atencion', hora_atencion='$hora_atencion' WHERE idcita=$idcita";
        mysqli_query($conn,$query);

        $_SESSION['message']='Cita Actualizado Satisfactoriamente';
        $_SESSION['message_type']='success';

        header("Location:index.php");
    }

?>