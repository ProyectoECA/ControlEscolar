$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: '/PaginasVista/mostrar_datos_alumnos.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta:consulta},
    })

    .done(function(respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

$(document).on('keyup','#dato', function(){
    var valor=$(this).val();
    if(valor!=""){
        buscar_datos(valor);
    }
    else{
        buscar_datos();
    }
})