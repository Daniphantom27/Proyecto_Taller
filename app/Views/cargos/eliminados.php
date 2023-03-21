<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
<h1 class="titulo"><?php echo "Cargos Eliminados"; ?></h1>

  <div class="card" style="width:72rem;">
    <div>
    </div>
    <div class="card-body">

      <div class="row col-sm-12">
        <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-5"></div>
        <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-2">
          <a href="<?php echo base_url('/cargos'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
        </div>
      </div>

      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="color:#98040a;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
              <th>Id</th>
              <th>Nombre</th>
              <th>Estado</th>
              <th colspan="2">Acciones</th>
            </tr>
          </thead>
          <tbody style="font-family:Arial;font-size:12px;">
            <?php foreach ($datos as $dato) { ?>
              <tr>
                <td><?php echo $dato['id']; ?></td>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['estado']; ?></td>
                <td title="Activar Registro" data-bs-toggle="modal" data-bs-target="#modal-confirma" href="#" data-href="<?php echo base_url('/cargos/eliminarC') . '/' . $dato['id'] . '/' . 'A'; ?>"><i class="bi bi-arrow-clockwise"></i></td>
              </tr> 
            <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- Modal Confirma Eliminar -->
      <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
            <div style="text-align:center;" class="modal-header">
              <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Activación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
              <p>Seguro Desea Activar éste Registro?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary close" data-bs-dismiss="modal">No</button>
              <a class="btn btn-danger btn-ok">Si</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Elimina -->

      <script>
        function EliminaCargos(id) {
          $("#id").val(id);
          dataURL = "<?php echo base_url('/cargos/eliminados'); ?>" + "/" + id + "/" + 'A';
          $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {},
            error: function() {
              alert("No se ha Podido Activar El Registro");
            }
          })
          // $('.close').click(function() {
          //   $("#modal-confirma").modal("hide");
          // });
        };
      </script>


      <script>
        $('#modal-confirma').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        })
      </script>
    </div>
</body>