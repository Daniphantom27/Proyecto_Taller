console.log("funcionando");
function Alert(e){
    e.preventDefault();
    Swal.fire(
        '¡ERROR!',
        '!Debes completar todos los campos!',
        'error'
      )
};

