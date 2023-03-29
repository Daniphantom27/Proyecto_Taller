<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="<?php echo base_url('/css/vistasXD.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body style="background:#9f8756">
<h1 class="titulo"style="font-family:monospace bold; font-size:40px"><?php echo "Cargos Eliminados"; ?></h1>

  <div>
    <div>
    </div>
    <div class="card-body">

      <div class="row col-sm-12">
        <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-5"></div>
        <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-2">
        </div>
      </div>

      <br>
      <div class="table-responsive paises_table">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="color:#98040a;font-weight:300;text-align:center;font-family:monospace bold;font-size:20px;">
              <th>Id</th>
              <th>Nombre</th>
              <th>Estado</th>
              <th colspan="2">Acciones</th>
            </tr>
          </thead>
          <tbody style="font-family:monospace;font-size:20px;">
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

      <a href="<?php echo base_url('/cargos'); ?>" class="btn btn-secondary paises_btn "><i class="bi bi-arrow-bar-left"></i></a>

      <!-- Modal Activar  -->
      <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div style="background:#ffffff"  class="modal-content">
            <div style="text-align:center;" class="modal-header">
              <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Activación de Registro</h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
              <p>¿Seguro Desea Activar éste Registro?</p>
            </div>
            <div class="modal-footer">
              <button type="button" style="background:#131d39; color:#ffffff " class="btn btn-primary close" data-bs-dismiss="modal">No</button>
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