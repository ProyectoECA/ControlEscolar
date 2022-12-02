
const TABLA = document.getElementById("tabla_alumnos");
const TABLA_HEADER = TABLA.getElementsByTagName('thead')[0];
const TABLA_BODY = TABLA.getElementsByTagName('tbody')[0];
//ejecuta el script despues que el HTML se parsea
document.addEventListener("DOMContentLoaded", function(){
    //crea el cuadrito con el nombre
    //crea la tabla con js
    var url_string = window.location;
    var url = new URL(url_string);
    var clave = url.searchParams.get("claveAlu");
    var semestre = url.searchParams.get("semestre");
  
    var form = new FormData();
    form.append("claveAlu", clave);
    form.append("semestre", semestre);

    fetch("../php/calificaciones_alumnosV.php",
    {
        method:"POST",
        body: form
    }).then(response => response.json())
    .then(data =>{

        Rellenar_Tabla(data);
    }); 

});

function Rellenar_Tabla(datos) {

    var celda = document.createElement("th");
    var titulo = document.createTextNode("Materias");
    celda.appendChild(titulo);
    TABLA_HEADER.appendChild(celda);

    var cantidadUnidadesMax = 1;

    for (let i = 0; i < datos.length; i++) {

        var fila = TABLA_BODY.insertRow();

        if(datos[i][0] > cantidadUnidadesMax){
            cantidadUnidadesMax = datos[i][0];
        }
        for (let j = 1; j < (datos[i][0]+2); j++) {
            
            var calificacion = datos[i][j] == 0 ? "" :  datos[i][j];

            var celda = document.createElement("td");
            var texto = document.createTextNode(calificacion);
            celda.appendChild(texto);
            fila.appendChild(celda);
            
        }
        var calificacion = datos[i][12] == 0 ? "" :  datos[i][12];
        var celda = document.createElement("td");
        var texto = document.createTextNode(calificacion);
        celda.appendChild(texto);
        fila.appendChild(celda);
    }

    for (let i = 0; i < cantidadUnidadesMax; i++) {
        
        var celda = document.createElement("th");
        var titulo = document.createTextNode("Unidad " + (i+1));
        celda.appendChild(titulo);
        TABLA_HEADER.appendChild(celda);

    }

    var celda = document.createElement("th");
    var titulo = document.createTextNode("Calificacion final");
    celda.appendChild(titulo);
    TABLA_HEADER.appendChild(celda);

    
    
}