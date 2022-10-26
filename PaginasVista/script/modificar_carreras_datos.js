//botones
const boton_buscar = document.getElementById("btn_buscar");
const boton_eliminar = document.getElementById("btn1");
const boton_modificar = document.getElementById("btn");
//inputs
const campo_clave = document.getElementById("clave");
const campo_nombre = document.getElementById("nombre");
const campo_semestre = document.getElementById("semestres");

//contenedor inputs
const  contenedor_inputs = document.getElementById("contenedorInput");


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

        ocultar();

        if(data.mensaje != null || data.mensaje != undefined ){
            MostrarMensaje(data.mensaje);
        }

        if(data.clave != null || data.clave != undefined){
            
            ColocarDatos(data.clave, data.nombre, data.numero_semestres);
            mostrar();

        }
        if(boton_desencadenador == 3){
            
            limpiarCampos();
        }
        if(boton_desencadenador == 2 || boton_desencadenador == 3){
            mostrar();
        }
       
    });
}

function ColocarDatos(clave,nombre,numero_semestres) {
    //coloca los datos en el formulario
    campo_clave.value = clave;
    campo_nombre.value = nombre;
    campo_semestre.value = numero_semestres;
}

function MostrarMensaje(mensaje) {
    //muestra el mensaje desde el servidor
    alert(mensaje);
}

boton_buscar.addEventListener("click", function() {
    boton_desencadenador = 1;

});

//boton modificar
boton_modificar.addEventListener("click", function() {
    boton_desencadenador = 2;
    buscarCarrera();
});
//boton eliminar
boton_eliminar.addEventListener("click", function() {
    boton_desencadenador = 3;
    buscarCarrera();
});

function limpiarCampos() {
    

    campo_clave.value = "";
    campo_nombre.value = "";
    campo_semestre.value = "";
}

function ocultar(){
    //oculta los botones y los campos
    contenedor_inputs.hidden = true;
    boton_eliminar.hidden = true;
    boton_modificar.hidden = true;
}
function mostrar() {
    //muestra los botones
    contenedor_inputs.hidden = false;
    boton_eliminar.hidden = false;
    boton_modificar.hidden = false;
}