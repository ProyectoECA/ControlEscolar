const form = document.getElementById('formulario');
form.addEventListener('submit', registrarAlumno);

function registrarAlumno(event){
    event.preventDefault();
    let form = new FormData(event.target);
    fetch("php/Registro.php",
    {
        method: 'POST',
        body: form,
    })
    .then(response => response.json())
    .then(data => {
        data.error ?showAlert(data.mensaje,true,data.identificador):showAlert(data.mensaje,false,data.identificador);
        
    });

}

function showAlert(mensaje,error,identificador){
    Toastify({
        text: mensaje,
        duration: 1000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: error?"linear-gradient(to right, #ff0000, #96c93d)" : "linear-gradient(to right, #00b09b, #96c93d)",
        },
        callback: function() {
            if(identificador !== "no hay"){
            
                window.open("codigo/imagen_qr.php?identificador="+encodeURIComponent(identificador), '_blank');
            }
             
            Toastify.reposition();
          },
          close: true,
      }).showToast();
}