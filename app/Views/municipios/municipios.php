<head>
<link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <h1 class="titulo"><?php echo "Administrar Municipios"; ?></h1>

    <div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
    <button type="button" class="btn btn-secondary">Eliminados</button>
    <a href="<?php echo base_url('/principal');?>"class="btn btn-primary regresar_btn">Regresar</a>
    </div>
    <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
                            <th>Id</th>
                            <th>Departamento</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:12px;">
                        <?php foreach ($municipios as $dato) { ?>
                        <tr>
                            <td><?php echo $dato ['id'];?></td>
                            <td><?php echo $dato ['nombre_departamento'];?></td>
                            <td><?php echo $dato ['nombre'];?></td>
                            <td><?php echo $dato ['estado'];?></td>
                            <td><button type="button" class="btn btn-info"><i class="bi bi-person-plus"></i></button>
                            <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button></td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>

            <form method="POST" action="<?php echo base_url('/municipios/insertarMun'); ?> " autocomplete="off">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Departamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Departamento:</label>
                        <select name="departamento" class="form-select">
                            <option selected>Seleccionar Departamento</option>
                            <?php foreach ($departamentos as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="recipient-name" name='nombre'>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>

</body>