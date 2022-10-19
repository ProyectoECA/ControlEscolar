
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
        alert(response.mensaje);
    }
}
xhr.send(data);
});