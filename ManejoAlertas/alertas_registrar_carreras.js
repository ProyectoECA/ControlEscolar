const clave_input = document.getElementById("clave");
const nombre_input = document.getElementById("nombre");
const semestres_select = document.getElementById("semestres");

const form = document.getElementById("formulario");

form.addEventListener('submit', function (event) {

event.preventDefault();//para que no haga lo que debe por defecto
var data = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST', "../ManejoDeCarreras/Insertar_carreras.php");

xhr.onload = function () {
    
    if (xhr.status === 200) {
        // si la respuesta fue un JSON y no hubo ningun error
        var response = JSON.parse(xhr.responseText);
        limpiar();
        alert(response.mensaje);

    }
}
xhr.send(data);
});


function limpiar() {
    clave_input.value = "";
    nombre_input.value = "";
    semestres_select.value = "1";
    
}