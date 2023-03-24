console.log("funcionando");

function Alert(e){
    e.preventDefault();
    Swal.fire(
        'Good job!',
        '!Debes completar todos los campos!',
        'error'
      )
};
function Alert2(e){
    e.preventDefault();
    Swal.fire(
        'Good job!',
        '!Pais agregado con éxito!',
        'success'
      )
};
