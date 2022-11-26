const USER_CONTENEDOR = document.getElementById("nameuser");
const TABLA = document.getElementById("tabla_unidades").getElementsByTagName('tbody')[0];

document.addEventListener("DOMContentLoaded", function(){
    //crea la tabla con js
    var url_string = window.location;
    var url = new URL(url_string);
    var clave_carrera = url.searchParams.get("claveCa");
    var clave_materia = url.searchParams.get("claveMa");
  
    var form = new FormData();
    form.append("claveCa", clave_carrera);
    form.append("claveMa",clave_materia);

    fetch("../php/fechas_Eva.php",
    {
        method:"POST",
        body: form
    }).then(response => response.json())
    .then(data =>{

        RellenarTabla(data.fechas);

    });
});

function RellenarTabla(fechas) {

    for (let i = 0; i < fechas.length; i++) {

        var fila = TABLA.insertRow();
        var celda_clave = document.createElement("td");
        var celda_uni = document.createElement("td");
        var celda_carrera = document.createElement("td");

        
        var clave = fechas[i][0];
        var uni = fechas[i][2];
        var clave_carrera = fechas[i][3];

        var clave_materia = document.createTextNode(clave);
        var num_uni = document.createTextNode(fechas[i][1]);
        var carrera_materia = document.createTextNode(carrera);

        var link_clave = document.createElement("a");
    
        //agregamos el texto y el nombre a los links
        link_clave.appendChild(clave_materia);
        link_nombre.appendChild(nombre_materia);
        
        link_clave.href = "../PaginasVista/pagina_tema_1.php?claveMa="+encodeURIComponent(clave)+"&unidad="+encodeURIComponent(uni)+"&claveCa="+encodeURIComponent(clave_carrera); 


        celda_clave.appendChild(link_clave);
        celda_nombre.appendChild(link_nombre);
        celda_carrera.appendChild(carrera_materia);
        
        fila.appendChild(celda_carrera);
        fila.appendChild(celda_clave);
        fila.appendChild(celda_nombre);

        
    }
}

