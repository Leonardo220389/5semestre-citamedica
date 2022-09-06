<?php error_reporting(E_ERROR | E_PARSE);?>
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


    if(isset($_POST['update'])){
        $idpaciente = $_GET['idpaciente'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $cedula =$_POST['cedula'];
        $ciudad = $_POST['ciudad'];
        $direccion =$_POST['direccion'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $sexo = $_POST['sexo'];
        $fecha_nacimiento =$_POST['fecha_nacimiento'];

        $query = "UPDATE paciente SET nombres = '$nombres', apellidos = '$apellidos', cedula = '$cedula', idciudad = '$ciudad', direccion = '$direccion', correo = '$correo', telefono = '$telefono', sexo = '$sexo', fecha_nacimiento = '$fecha_nacimiento' WHERE idpaciente=$idpaciente";
        mysqli_query($conn,$query);

        $_SESSION['message']='Paciente Actualizado Satisfactoriamente';
        $_SESSION['message_type']='success';

        header("Location:index.php");
    }

?>

<?php include ("includes/header.php"); ?>

<div class="container p-3">
    <div class="row">
        <div class="col-md-4 mx-auto">
                <h5 class="text-center">ACTUALIZACIÓN DE DATOS PACIENTE</h5>
                <div class="card card-body shadow">
                    <form action="editar_paciente.php?idpaciente= <?php echo $_GET['idpaciente']; ?>" method="POST">
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Nombres</b></label>
                            <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="<?php echo $nombres?>" autofocus required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Apellidos</b></label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $apellidos?>" autofocus required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Cédula</b></label>
                            <input type="number" name="cedula" class="form-control" placeholder="Cédula" value="<?php echo $cedula?>" autofocus required>
                        </div>
                        <label for="" class="form-label"><b>Ciudad</b></label>
                        <select class = "form-select mb-2" name="ciudad"  >
                            <?php 
                            $query= "SELECT * FROM ciudad";
                            $result_ciudad = mysqli_query($conn,$query);
                            while($row= mysqli_fetch_array($result_ciudad)){
                                $idciudad=$row['idciudad'];
                                $nombreciudad= $row['nombre'];
                            ?>
                            <option value="<?php echo $idciudad?>"><?php echo $nombreciudad ?></option>
                            <?php
                            } ?>
                        </select>
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Dirección</b></label>
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="<?php echo $direccion?>" autofocus required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Correo</b></label>
                            <input type="email" name="correo" class="form-control" placeholder="Correo" value="<?php echo $correo?>" autofocus required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Telefono</b></label>
                            <input type="number" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $telefono?>"autofocus required>
                        </div>
                        <label for="" class="form-label"><b>Sexo</b></label>
                        <select class = "form-select mb-2" name= "sexo">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <div class="form-group mb-2">
                            <label for="" class="form-label"><b>Fecha de nacimiento</b></label>
                            <input type="date" name="fecha_nacimiento" class="form-control" placeholder="DD/MM/YYYY" value="<?php echo $fecha_nacimiento?>" autofocus required>
                        </div>
                        <button class="btn btn-success" name="update">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include ("includes/footer.php"); ?>