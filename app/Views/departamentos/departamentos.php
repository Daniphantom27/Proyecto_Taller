<head>
<link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">

</head>

<body>
    <h1 class="titulo"><?php echo "Administrar Departamentos"; ?></h1>

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
                            <th>Pais</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:12px;">
                        <?php foreach ($departamentos as $dato) { ?>
                        <tr>
                            <td><?php echo $dato ['id'];?></td>
                            <td><?php echo $dato ['codigo'];?></td>
                            <td><?php echo $dato ['id_pais'];?></td>
                            <td><?php echo $dato ['nombre'];?></td>
                            <td><?php echo $dato ['estado'];?></td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>

</body>