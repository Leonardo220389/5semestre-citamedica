<?php 
    include("db.php");

    if(isset($_GET['idcita'])){
        $idcita = $_GET['idcita'];
        $query = "DELETE FROM cita WHERE idcita = $idcita";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }
        $_SESSION['message']='Cita Eliminada Satisfactoriamente';
        $_SESSION['message_type']='danger';

        header("Location:index.php");
    }
?>