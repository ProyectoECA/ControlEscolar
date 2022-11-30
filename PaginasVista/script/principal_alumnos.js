

const USER_CONTENEDOR = document.getElementById("nameuser");



//ejecuta el script despues que el HTML se parsea
document.addEventListener("DOMContentLoaded", function(){
    //crea la tabla con js
    fetch("../php/nombre_usuario.php",
    {
        method:"POST"
    }).then(response => response.json())
    .then(data =>{

        var item_nombre = document.createElement("p");
        item_nombre.innerHTML = "Bienvenid@ " + data.nombre;
        USER_CONTENEDOR.appendChild(item_nombre);
    

    });
});