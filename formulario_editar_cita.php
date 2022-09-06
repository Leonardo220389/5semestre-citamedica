<div class="container p-3">
    <form class="row g-3" action="envio_editar_cita.php?idcita= <?php echo $_GET['idcita']; ?>" method="POST">
        <h5 class="text-center">EDITAR CITA MÉDICA</h5>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Nombres</b></label>
                <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="<?php echo $nombres?>" autofocus disabled>
                <input type="hidden" name="idpaciente" class="form-control" placeholder="Nombres" value="<?php echo $idpaciente?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Apellidos</b></label>
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $apellidos?>" autofocus disabled>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Cédula</b></label>
                <input type="text" name="cedula" class="form-control" placeholder="Cédula" value="<?php echo $cedula?>" autofocus disabled>
            </div>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label"><b>Ciudad</b></label>
                <select class = "form-select mb-2" name="ciudad" disabled >
                    <?php 
                    $query= "SELECT * FROM ciudad";
                    $result_ciudad = mysqli_query($conn,$query);
                    while($row= mysqli_fetch_array($result_ciudad)){
                        $idciudad=$row['idciudad'];
                        $nombreciudad= $row['nombre'];
                    ?>
                    <option value="<?php echo $idciudad?>"><?php echo $nombreciudad ?></option>
                    <?php } ?>
                </select>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Dirección</b></label>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="<?php echo $direccion?>" autofocus disabled>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Correo</b></label>
                <input type="mail" name="correo" class="form-control" placeholder="Correo" value="<?php echo $correo?>" autofocus disabled>
            </div>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label"><b>Médico</b></label>
                <select class = "form-select mb-2" name="medico">
                    <?php 
                    $query= "SELECT idmedico,nombres,apellidos,nombre FROM medico M, especialidad E where M.idespecialidad=E.idespecialidad ";
                    $result_medico = mysqli_query($conn,$query);
                    while($row= mysqli_fetch_array($result_medico)){
                        $idmedico=$row['idmedico'];
                        $nombre_medico= $row['nombres'];
                        $apellido_medico= $row['apellidos'];
                        $nombre_especialidad= $row['nombre'];

                    ?>
                    <option value="<?php echo $idmedico?>"><?php echo $nombre_medico ?> <?php echo $apellido_medico ?> - <?php echo $nombre_especialidad ?></option>
                    <?php } ?>
                </select>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Fecha de Atención</b></label>
                <input type="date" name="fecha_atencion" class="form-control" placeholder="DD/MM/YYYY" value="<?php echo $fecha_atencion?>" autofocus required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label for="" class="form-label"><b>Hora de Atención</b></label>
                <input type="time" name="hora_atencion" class="form-control" placeholder="DD/MM/YYYY" value="<?php echo $hora_atencion?>" autofocus required>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-success btm-block" name="actualizar_cita" value="Editar Cita Médica">
        </div>
    </form>
</div>