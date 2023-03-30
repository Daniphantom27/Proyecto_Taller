console.log("funcionando");

/* function Alert(e) {
    e.preventDefault();
    Swal.fire(
        '¡ERROR!',
        '!Debes completar todos los campos!',
        'error'
    )
}; */

$codi = $("#codigo").val();
$nomb = $("#nombre").val();

function validar(e) {
    e.preventDefault();
    if ($codi == '' || $codi == '') {
        console.log('los campos son obligatorios');
    } else {
        console.log($codi, $nomb)
    }
}