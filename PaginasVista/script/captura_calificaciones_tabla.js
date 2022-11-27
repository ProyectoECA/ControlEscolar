const TABLA = document.getElementById("tabla_calificaciones").getElementsByTagName('tbody')[0];

document.addEventListener("DOMContentLoaded", function(){
    //crea la tabla con js
    var url_string = window.location;
    var url = new URL(url_string);
    var clave_carrera = url.searchParams.get("claveCa");
    var clave_materia = url.searchParams.get("claveMa");
  
    var form = new FormData();
    form.append("claveCa", clave_carrera);
    form.append("claveMa",clave_materia);

    fetch("../php/tabla_calificaciones.php",
    {
        method:"POST",
        body: form
    }).then(response => response.json())
    .then(data =>{

        RellenarTabla(data.alumnosT);

    });
});

function RellenarTabla(alumnos) {

    //le cooloco relleno a la tabla
    for (let i = 0; i < alumnos.length; i++) {

        var fila = TABLA.insertRow();
       
        for (let index = 0; index < 14; index++) {
            var celda = document.createElement("td");

            if(index < 2){
                var texto = document.createTextNode(alumnos[i][index]);
                celda.appendChild(texto);
            }else{
                var input = document.createElement("input");
                input.className = "input_busqueda";
                input.type = "int";
                input.name = "calificacion_final";
                input.id = "cali_final";
                input.value = alumnos[i][index];
                celda.appendChild(input);
                
            }
            fila.appendChild(celda);
            
            
        }

        var celda = document.createElement("td");
        var input = document.createElement("input");
        input.className = "input_busqueda";
        input.type = "int";
        input.name = "calificacion_final";
        input.id = "cali_final";
        input.value = 0;
        celda.appendChild(input);
        fila.appendChild(celda);
    }
}
