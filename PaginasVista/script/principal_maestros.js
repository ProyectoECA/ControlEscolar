

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
      

        RellenarTabla(data.materias);

    });
});

function RellenarTabla(materias) {

    //le cooloco relleno a la tabla
    for (let i = 0; i < materias.length; i++) {

        var fila = TABLA.insertRow();
        var celda_clave = document.createElement("td");
        var celda_nombre = document.createElement("td");
        var celda_carrera = document.createElement("td");

        var carrera = materias[i][2];
        var clave = materias[i][0];

        var clave_materia = document.createTextNode(clave);
        var nombre_materia = document.createTextNode(materias[i][1]);
        var carrera_materia = document.createTextNode(carrera);

        var link_clave = document.createElement("a");
        var link_nombre = document.createElement("a");

        //agregamos el texto y el nombre a los links
        link_clave.appendChild(clave_materia);
        link_nombre.appendChild(nombre_materia);
        
        link_clave.href = "../ModificacionesBD/CapturaCalif.php?clave="+encodeURIComponent(clave)+"&carrera="+encodeURIComponent(carrera); 
        link_nombre.href = "../PaginasVista/fechas_evaluacion.php?clave="+encodeURIComponent(clave)+"&carrera="+encodeURIComponent(carrera);

        celda_clave.appendChild(link_clave);
        celda_nombre.appendChild(link_nombre);
        celda_carrera.appendChild(carrera_materia);
        
        fila.appendChild(celda_carrera);
        fila.appendChild(celda_clave);
        fila.appendChild(celda_nombre);

        
    }
}

