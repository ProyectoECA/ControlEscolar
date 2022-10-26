var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('/ModificacionesBD/InsertaSecre.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='error'){
            alert("No se puede establecer una conexión");
        }else if (data==='control'){
            alert("Ya existe un usuario registrado con este número de control");
        }else{
            alert("Estudiante registrado con éxito");
            location.href = "principal_secretarias.php";
        }
    })
})
