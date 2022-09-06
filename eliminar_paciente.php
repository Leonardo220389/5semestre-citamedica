<?php 
    include("db.php");

    if(isset($_GET['idpaciente'])){
        $idpaciente = $_GET['idpaciente'];
        $query = "DELETE FROM paciente WHERE idpaciente = $idpaciente";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }
        $_SESSION['message']='Paciente Eliminado Satisfactoriamente';
        $_SESSION['message_type']='danger';

        header("Location:index.php");
    }
?>