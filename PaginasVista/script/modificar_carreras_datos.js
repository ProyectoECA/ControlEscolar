
const formulario = document.getElementById("formulario_modificar_careras");
formulario.addEventListener('submit', buscarCarrera);
var boton_desencadenador = 1;
// esta parte del codigo solo se usa para buscar y traer la informacion de regreso
function buscarCarrera(event) {
    event.preventDefault();
    let formulario_data = new FormData(event.target);
    formulario_data.set("boton",boton_desencadenador);//agrego el boton que desencadeno el evento
    
    fetch("../ManejoDeCarreras/modificarCarreras.php",
    {
        method: 'POST',
        body: formulario_data,
    })
    .then(response => response.json())
    .then(data => {
        if(data.mensaje != null || data.mensaje != undefined ){
            MostrarMensaje(data.mensaje);
        }
        if(data.clave != null || data.clave != undefined){
            ColocarDatos(data.clave, data.nombre, data.numero_semestres);
        }
        if(boton_desencadenador == 3){
            limpiarCampos();
        }
       
    });
}

function ColocarDatos(clave,nombre,numero_semestres) {
    //coloca los datos en el formulario
    const campo_clave = document.getElementById("clave");
    const campo_nombre = document.getElementById("nombre");
    const campo_semestre = document.getElementById("semestres");

    campo_clave.value = clave;
    campo_nombre.value = nombre;
    campo_semestre.value = numero_semestres;
}

function MostrarMensaje(mensaje) {
    //muestra el mensaje desde el servidor
    alert(mensaje);
}

document.getElementById("btn_buscar").addEventListener("click", function() {
    boton_desencadenador = 1;

});

//boton modificar
document.getElementById("btn").addEventListener("click", function() {
    boton_desencadenador = 2;
    buscarCarrera();
});
//boton eliminar
document.getElementById("btn1").addEventListener("click", function() {
    boton_desencadenador = 3;
    buscarCarrera();
});

function limpiarCampos() {
    const campo_clave = document.getElementById("clave");
    const campo_nombre = document.getElementById("nombre");
    const campo_semestre = document.getElementById("semestres");

    campo_clave.value = "";
    campo_nombre.value = "";
    campo_semestre.value = "";
}