<head>
  <link rel="stylesheet" href="<?php echo base_url('/css/vistasXD.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body style="background:#9f8756">
  <h1 class="titulo" style="font-family:monospace bold; font-size:40px"><?php echo "Administrar Paises"; ?></h1><br>

  <div>
    <button style="font-family: monospace" type="button" class="btn btn-secondary fs-5 paises_btn" data-bs-toggle="modal" data-bs-target="#añadirModal" onclick="seleccionaPaises(<?php echo 1 . ',' . 1 ?>);"><i class="bi bi-house-add-fill"></i></button>

    <a style="font-family: monospace" href="<?php echo base_url('eliminados_paises'); ?>" class="btn btn-secondary paises_btn fs-5"><i class="bi bi-trash3-fill"></i></a>

    <a style="font-family: monospace" href="<?php echo base_url('/principal'); ?>" class="btn btn-secondary fs-5 paises_btn"><i class="bi bi-arrow-bar-left"></i></a>
  </div>
  <div class="table-responsive paises_table">
    <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:monospace bold;font-size:20px;">
          <th>Id</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Estado</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody style="font-family:monospace;font-size:20px;">
        <?php foreach ($paises as $dato) { ?>
          <tr>
            <td><?php echo $dato['id']; ?></td>
            <td><?php echo $dato['codigo']; ?></td>
            <td><?php echo $dato['nombre']; ?></td>
            <td><?php echo $dato['estado']; ?></td>
            <td><button type="button" class="btn btn-secondary pais_actu" data-bs-toggle="modal" id="btn_guardar" data-bs-target="#añadirModal" onclick="seleccionaPaises(<?php echo $dato['id'] . ',' . 2 ?>);">
                <i class="bi bi-pencil-fill"></i>
              </button>
              <button type="button" class="btn btn-danger" href="#" data-href="<?php echo base_url('/paises/eliminar') . '/' . $dato['id'] . '/' . 'E'; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma"><i class="bi bi-person-x-fill"></i></button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <form id="formulario" method="POST" action="<?php echo base_url('/paises/insertarPaises'); ?>" autocomplete="off">

    <div class="modal fade" id="añadirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="titulo">Agregar País</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Codigo:</label>
                <input type="text" maxlength="3" class="form-control" name="codigo" id="codigo" require>
                <input id="tp" name="tp" hidden>
                <input id="id" name="id" hidden>
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

  <!-- Modal Confirma Eliminar -->
  <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div style="background:#ffffff" class="modal-content">
        <div style="text-align:center;" class="modal-header">
          <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="modal-confirma">Eliminación de Registro</h5>

        </div>
        <div style="text-align:center;font-weight:bold;color:#98040a;font-size:20px;" class="modal-body">
          <p>¿Seguro Desea Eliminar éste Registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" style="background:#131d39; color:#ffffff " class="btn close" data-bs-dismiss="modal">No</button>
          <a class="btn btn-danger btn-ok">Si</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Elimina -->

  <script>

    function seleccionaPaises(id, tp) {
      if (tp == 2) {
        dataURL = "<?php echo base_url('/paises/buscar_Paises'); ?>" + "/" + id;
        $.ajax({
          type: "POST",
          url: dataURL,
          dataType: "json",
          success: function(rs) {
            $("#tp").val(2);
            $("#id").val(id);
            $("#codigo").val(rs[0]['codigo']);
            $("#nombre").val(rs[0]['nombre']);
            $("#btn_Guardar").text('Actualizar');
            $("#titulo").text('Editar País');
            $("#añadirModal").modal("show");
          }
          
        })
      } else {
        $("#tp").val(1);
        $("#codigo").val('');
        $("#id").val('');
        $("#nombre").val('');
        $("#btn_Guardar").text('Guardar');
        $("#titulo").text('Agregar País');
      }
    };
  </script>

  <script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    })
  </script>
</body>