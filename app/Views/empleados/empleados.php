<head>
  <link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <h1 class="titulo"><?php echo "Administrar Empleados"; ?></h1>

  <div>
    <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarEmpleados" onclick="seleccionaEmpleados(<?php echo 1 . ',' . 1 ?>);">Agregar</a>
    <button type="button" class="btn btn-secondary">Eliminados</button>
    <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_btn">Regresar</a>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Nacimiento</th>
          <th>Cargo</th>
          <th>Pais</th>
          <th>Departamentos</th>
          <th>Municipio</th>
           <th>Salarios</th> 
          <th>Estado</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody style="font-family:Arial;font-size:12px;">
        <?php foreach ($empleados as $dato) { ?>
          <input id="id_salario" name="id_salario" value="<?php echo $dato['id_salario']; ?>" hidden> </>
          <tr>
            <td><?php echo $dato['id']; ?></td>
            <td><?php echo $dato['nombre']; ?></td>
            <td><?php echo $dato['apellidos']; ?></td>
            <td><?php echo $dato['nacimiento']; ?></td>
            <td><?php echo $dato['nombre_cargo']; ?></td>
            <td><?php echo $dato['nombre_pais']; ?></td>
            <td><?php echo $dato['nombre_departamento']; ?></td>
            <td><?php echo $dato['nombre_municipio']; ?></td>
            <td><?php echo $dato['salario']; ?></td>
            <td><?php echo $dato['estado']; ?></td> 
            <td><a type="button" class="btn btn-info" data-bs-toggle="modal" id="btn_guardar" data-bs-target="#AgregarEmpleados" onclick="seleccionaEmpleados(<?php echo $dato['id'] . ',' . 2 ?>);">
                <i class="bi bi-person-plus"></i></a>
              <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <form method="POST" action="<?php echo base_url('empleados/insertarEmpleados'); ?> " autocomplete="off">

    <div class="modal fade" id="AgregarEmpleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" name="titulo" id="titulo">Agregar Empleado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Nombre:</label>
                <input id="tp" name="tp" hidden>
                <input id="id" name="id" hidden>
                <input id="salario" name="salario" hidden>
                <input type="text" name="nombre" class="form-control" id="nombre">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nacimiento:</label>
                <select class="form-select" name="nacimiento" id="nacimiento">
                                <option selected value="">-- Seleccionar Año --</option>
                                <?php $years = range(2004, 1940); ?>
                                <?php foreach ($years as $year) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endforeach; ?>
                            </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Cargo:</label>
                <select name="cargo" id="cargo" class="form-select">
                  <option selected>Seleccionar Cargo</option>
                  <?php foreach ($cargos as $dato) { ?>
                    <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Pais:</label>
                <select name="pais" id="pais" class="form-select">
                  <option selected>Seleccionar Pais</option>
                  <?php foreach ($paises as $dato) { ?>
                    <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Departamento:</label>
                <select name="departamento" id="departamento" class="form-select">
                  <option selected>Seleccionar Departamento</option>
                  <?php foreach ($departamentos as $dato) { ?>
                    <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Municipio:</label>
                <select name="municipio" id="municipio" class="form-select">
                  <option selected>Seleccionar Municipio</option>
                  <?php foreach ($municipios as $dato) { ?>
                    <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="message-text" class="col-form-label">Salario:</label>
                <input type="text" name="salari" id="salari" class="form-control">
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
    function seleccionaEmpleados(id, tp) {
      if (tp == 2) {
        dataURL = "<?php echo base_url('/empleados/buscar_Empleados'); ?>" + "/" + id;
        $.ajax({
          type: "POST",
          url: dataURL,
          dataType: "json",
          success: function(rs) {
            $("#tp").val(2);
            $("#id").val(id);
            $("#salari").val(rs[0]['salario']);
            $("#municipio").val(rs[0]['id_municipio']);
            $("#cargo").val(rs[0]['id_cargo']);
            $("#pais").val(rs[0]['id_pais']);
            $("#departamento").val(rs[0]['id_departamento']);
            $("#nombre").val(rs[0]['nombre']);
            $("#apellido").val(rs[0]['apellidos']);
            $("#nacimiento").val(rs[0]['nacimiento']);  
            $("#btn_Guardar").text('Actualizar');
            $("#titulo").text('Editar Empleado'); 
            $("#AgregarEmpleados").modal("show");
          }
        })
      } else {
        $("#tp").val(1);
        $("#id").val(id);
        $("#municipio").val('');
        $("#cargo").val('');
        $("#pais").val('');
        $("#departamento").val('');
        $("#nombre").val('');
        $("#apellido").val(''); 
        $("#salari").val('');
        $("#nacimiento").val('');
        $("#btn_Guardar").text('Guardar');
        $("#titulo").text('Agregar Empleado');

      }
    };
  </script>

</body>