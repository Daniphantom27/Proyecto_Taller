<head>
    <link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <h1 class="titulo"><?php echo "Administrar Departamentos"; ?></h1>

    <div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#añadirModal" onclick="seleccionaDpto(<?php echo 1 . ',' . 1 ?>);">Agregar</button>
        <button type="button" class="btn btn-secondary">Eliminados</button>
        <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_btn">Regresar</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
                    <th>Id</th>
                    <th>Pais</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:Arial;font-size:12px;">
                <?php foreach ($departamentos as $dato) { ?>
                    <tr>
                        <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['nombre_pais']; ?></td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['estado']; ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal" id="btn_guardar" data-bs-target="#añadirModal" onclick="seleccionaDpto(<?php echo $dato['id'] . ',' . 2 ?>);"><i class="bi bi-person-plus"></i></button>
                            <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <form method="POST" action="<?php echo base_url('/departamentos/insertarDpto'); ?> " autocomplete="off">

        <div class="modal fade" id="exampleModal" id="añadirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulo">Agregar Departamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Pais:</label>
                                <input id="tp" name="tp" hidden>
                                <input id="id" name="id" hidden>
                                <select name="pais" id="pais" class="form-select">
                                    <option selected>Seleccionar Pais</option>
                                    <?php foreach ($paises as $dato) { ?>
                                        <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name='nombre'>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btn_Guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function seleccionaDpto(id, tp) {
            if (tp == 2) {
                dataURL = "<?php echo base_url('/departamentos/buscar_Dpto'); ?>" + "/" + id;
                $.ajax({
                    type: "POST",
                    url: dataURL,
                    dataType: "json",
                    success: function(rs) {
                        $("#tp").val(2);
                        $("#id").val(id);
                        $("#pais").val(rs[0]['id_pais']);
                        $("#nombre").val(rs[0]['nombre']);
                        $("#btn_Guardar").text('Actualizar');
                        $("#titulo").text('Editar Departamento');
                        $("#añadirModal").modal("show");
                    }
                })
            } else {
                $("#tp").val(1);
                $("#pais").val('');
                $("#id").val('');
                $("#nombre").val('');
                $("#btn_Guardar").text('Guardar');
                $("#titulo").text('Agregar Departamento');
            }
        };
    </script>

</body>