$('#form').submit(function(event){
    event.preventDefault(); // almacena los datos sin refrescar el sitio
    enviar();
});

function enviar(){
    //console.log("Ejecutado correctamente");
    var datos = $('#form').serialize(); // toma los datos "name" y los lleva a un arreglo
    $.ajax({
        type: "post",
        url: "php/form.php",
        data: datos,
        success: function(texto){
            if (texto == "exito"){
                correcto();
                $('.form-input').val('');
            } else {
                phperror(texto);
            }
        }
    })
}

function correcto(){
    $('#msjSuccess').removeClass('d-none');
    $('#msjError').addClass("d-none");
}

function phperror(texto){
    $('#msjError').removeClass('d-none');
    $('#msjError').html(texto);
    $('#msjSuccess').addClass('d-none')
}