

const USER_CONTENEDOR = document.getElementById("nameuser");
const TABLA = document.getElementById("tabla_maestros").getElementsByTagName('tbody')[0];


//ejecuta el script despues que el HTML se parsea
document.addEventListener("DOMContentLoaded", function(){
    //crea la tabla con js
    fetch("../php/principal_maestros.php",
    {
        method:"POST"
    }).then(response => response.json())
    .then(data =>{

        var item_nombre = document.createElement("p");
        item_nombre.innerHTML = "Bienvenid@ " + data.nombre;
        USER_CONTENEDOR.appendChild(item_nombre);
      


    });
});

