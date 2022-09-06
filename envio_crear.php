<?php 
include("db.php");

    if(isset($_POST['crear'])){
        $paciente = $_POST['idpaciente'];
        $medico = $_POST['medico'];
        $fecha_atencion = $_POST['fecha_atencion'];
        $hora_atencion = $_POST['hora_atencion'];

        $query= "INSERT INTO cita(idpaciente, idmedico, fecha_atencion, hora_atencion) VALUES ('$paciente', '$medico', '$fecha_atencion', '$hora_atencion')";
        mysqli_query($conn,$query);

        $_SESSION['message']= 'Cita Creada satisfactoriamente';
        $_SESSION['message_type']='success';

        header("Location:index.php");

    }
?>