<?php error_reporting(E_ERROR | E_PARSE);?>

<?php include("db.php")?>

<?php include ("includes/header.php")?>
 

<div class="m-4">
    <div class="row">
        <div class="col-md-3">
            <h5 class="text-center">INGRESAR DATOS DEL PACIENTE</h5>
            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            
            <?php session_unset(); }?>

            <div class="card card-body rounded shadow-sm">
                <form action="grabar_paciente.php" method="POST">
                    <div class="form-group mb-2">
                        <label for="" class="form-label"><b>Nombres</b></label>
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" autofocus required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label"><b>Apellidos</b></label>
                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" autofocus required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label"><b>Cédula</b></label>
                        <input type="number" name="cedula" class="form-control" placeholder="Cédula" autofocus required>
                    </div>
                    <label for="" class="form-label"><b>Ciudad</b></label>
                    <select class = "form-select mb-2" name="ciudad">
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
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" autofocus required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label"><b>Correo</b></label>
                        <input type="email" name="correo" class="form-control" placeholder="Correo" autofocus required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label"><b>Telefono</b></label>
                        <input type="number" name="telefono" class="form-control" placeholder="Telefono" autofocus required>
                    </div>
                    <label for="" class="form-label"><b>Sexo</b></label>
                    <select class = "form-select mb-2" name= "sexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <div class="form-group mb-3">
                        <label for="" class="form-label"><b>Fecha de nacimiento</b></label>
                        <input type="date" name="fecha_nacimiento" class="form-control" placeholder="DD/MM/YYYY" autofocus required>
                    </div>
                    <input type="submit" class="btn btn-success btm-block" name="grabar_paciente" value="Grabar Paciente">
                </form>
            </div>
        </div>
                

        <div class="col-md-8">
            <h5 class="text-center">PACIENTES REGISTRADOS</h5>
            <table class="table table-bordered shadow-sm " id="tabla">
                <thead>
                    <tr>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Cédula</th>
                        <th class="text-center">Ciudad</th>
                        <th class="text-center">Direccion</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Fecha de nacimiento</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query= "SELECT idpaciente,nombres, apellidos, cedula, nombre, direccion, correo,telefono,sexo, fecha_nacimiento FROM paciente P, ciudad C WHERE P.idciudad=C.idciudad";
                    $result_paciente = mysqli_query($conn,$query);

                    while($row= mysqli_fetch_array($result_paciente)) {?>
                        <tr>
                            <td class="text-center"> <?php echo $row['nombres']?></td>
                            <td class="text-center"> <?php echo $row['apellidos']?></td>
                            <td class="text-center"> <?php echo $row['cedula']?></td>
                            <td class="text-center"> <?php echo $row['nombre']?></td>
                            <td class="text-center"> <?php echo $row['direccion']?></td>
                            <td class="text-center"> <?php echo $row['correo']?></td>
                            <td class="text-center"> <?php echo $row['telefono']?></td>
                            <td class="text-center"> <?php echo $row['sexo']?></td>
                            <td class="text-center"> <?php echo $row['fecha_nacimiento']?></td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="crear_cita.php?idpaciente=<?php echo $row['idpaciente']?>">Crear Cita</a></li>
                                        <li><a class="dropdown-item" href="editar_paciente.php?idpaciente=<?php echo $row['idpaciente']?>">Editar Paciente</a></li>
                                        <li><a class="dropdown-item" href="eliminar_paciente.php?idpaciente=<?php echo $row['idpaciente']?>">Eliminar Paciente</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>

            </table>
            <div class="col-md-12">
                <h5 class="text-center">CITAS REGISTRADAS</h5>
                <table class="table table-bordered shadow-sm " id="tabla_citas">
                    <thead>
                        <tr>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Médico</th>
                            <th class="text-center">Fecha de Atención</th>
                            <th class="text-center">Hora de Atención</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query= "SELECT idcita,p.nombres as paciente_nombre, p.apellidos as paciente_apellido, p.cedula, m.nombres, m.apellidos,e.nombre, fecha_atencion, hora_atencion FROM  cita c,paciente p,medico m,especialidad e where c.idpaciente=p.idpaciente and c.idmedico=m.idmedico and m.idespecialidad=e.idespecialidad";
                        $result_cita = mysqli_query($conn,$query);

                        while($row= mysqli_fetch_array($result_cita)) {?>
                            <tr>
                                <td class="text-center"> <?php echo $row['paciente_nombre']?></td>
                                <td class="text-center"> <?php echo $row['paciente_apellido']?></td>
                                <td class="text-center"> <?php echo $row['cedula']?></td>
                                <td class="text-center"> <?php echo $row['nombres']?> <?php echo $row['apellidos']?> - <?php echo $row['nombre']?></td>
                                <td class="text-center"> <?php echo $row['fecha_atencion']?></td>
                                <td class="text-center"> <?php echo $row['hora_atencion']?></td>
                            <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li><a class="dropdown-item" href="editar_cita.php?idcita=<?php echo $row['idcita']?>">Editar Cita</a></li>
                                            <li><a class="dropdown-item" href="eliminar_cita.php?idcita=<?php echo $row['idcita']?>">Eliminar Cita</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>$('#tabla').DataTable({
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            "paginate":{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
});</script>

<script>$('#tabla_citas').DataTable({
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            "paginate":{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
});</script>



<?php include("includes/footer.php")?>
