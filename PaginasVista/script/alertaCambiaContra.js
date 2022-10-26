var formulario = document.getElementById('formulario');
var respuesta=document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('/CamContra.php', { 
        method:'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(data=>{
        if (data==='error'){
            alert("No se puede establecer una conexión");
        }else if (data==='modificado'){
            alert("Estudiante modificado con éxito");
            location.href = "principal_secretarias.php";
        }else{
            alert("Estudiante eliminado con éxito");
            location.href = "principal_secretarias.php";
        }
    })
})
