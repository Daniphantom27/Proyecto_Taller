<head>
<link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">

</head>

<body>
    <h1 class="titulo"><?php echo "Administrar Empleados"; ?></h1>

    <div>
    <button type="button" class="btn btn-success">Agregar</button>
    <button type="button" class="btn btn-secondary">Eliminados</button>
    <a href="<?php echo base_url('/principal');?>"class="btn btn-primary regresar_btn">Regresar</a>
    </div>
    <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
                            <th>Id</th>
                            <th>Codigo</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Nacimiento</th>
                            <th>Cargo</th>
                            <th>Municipio</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:12px;">
                        <?php foreach ($empleados as $dato) { ?>
                        <tr>
                            <td><?php echo $dato ['id'];?></td>
                            <td><?php echo $dato ['codigo'];?></td>
                            <td><?php echo $dato ['nombre'];?></td>
                            <td><?php echo $dato ['apellidos'];?></td>
                            <td><?php echo $dato ['nacimiento'];?></td>
                            <td><?php echo $dato ['id_cargo'];?></td>
                            <td><?php echo $dato ['id_municipio'];?></td>
                            <td><?php echo $dato ['estado'];?></td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>

</body>
