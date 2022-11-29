var b1=false;

const expresiones = {
    clave:/^RH[\d]{3}$/, 

}

const clave = document.getElementById('maestro');
clave.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    clave.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.clave.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        clave.removeAttribute("style");
        clave.style.border = "5px solid green";
        /* validar(); */

    }
    else {
        b1 = false;
        clave.removeAttribute("style");
        clave.style.border = "5px solid red";
        /* validar(); */
    }
});

function validar(){
    const bot = document.getElementById('btn');
    if(b1 == true && b2 == true && b3 == true ){
        location.href = '/ModificacionesBD/AsignaMaestros.php'
    }
    else{
        if (b1==false){
            clave.style.border = "5px solid red";
        }
    }
}