

const USER_CONTENEDOR = document.getElementById("nameuser");



//ejecuta el script despues que el HTML se parsea
document.addEventListener("DOMContentLoaded", function(){
    //crea el cuadrito con el nombre
    fetch("../php/principal_alumnos.php",
    {
        method:"POST"
    }).then(response => response.json())
    .then(data =>{

        var item_nombre = document.createElement("p");
        item_nombre.innerHTML = "Bienvenid@ " + data.nombre;
        USER_CONTENEDOR.appendChild(item_nombre);

        Rellenar_Tabla(data.arreglo);
    }); 
});

function Rellenar_Tabla(datos) {
    const celdas = [...document.getElementsByClassName('datos')]

    for (let i = 0; i < celdas.length; i++) {
        celdas[i].textContent = datos[0][i];
    }
}