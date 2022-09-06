<?php error_reporting(E_ERROR | E_PARSE);?>

<?php 
include("db.php");

    if(isset($_GET['idcita'])){
        $idcita = $_GET['idcita'];
        $query= "SELECT idcita,p.nombres as paciente_nombre, p.apellidos as paciente_apellido, p.cedula as paciente_cedula, ci.nombre as ciudad_nombre, p.direccion as paciente_direccion, p.correo as correo_paciente,m.nombres, m.apellidos,e.nombre, fecha_atencion, hora_atencion FROM  cita c,paciente p,medico m,especialidad e, ciudad ci where c.idpaciente=p.idpaciente and c.idmedico=m.idmedico and m.idespecialidad=e.idespecialidad and ci.idciudad=p.idciudad";
        $result= mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombres = $row['paciente_nombre'];
            $apellidos = $row['paciente_apellido'];
            $cedula = $row['paciente_cedula'];
            $ciudad = $row['ciudad_nombre'];
            $direccion = $row['paciente_direccion'];
            $correo = $row['correo_paciente'];
            $medico_nombre = $row['nombres'];
            $medico_apellido = $row['apellidos'];
            $especialidad = $row['nombre'];
            $fecha_atencion = $row['fecha_atencion'];
            $hora_atencion = $row['hora_atencion'];
        }

    }


?>

<?php include ("includes/header.php"); ?>


<?php include("formulario_editar_cita.php")?>


<?php include ("includes/footer.php"); ?>