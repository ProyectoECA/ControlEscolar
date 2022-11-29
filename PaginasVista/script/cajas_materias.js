var b1=false;
var b2=false;
var b3=false;

const expresiones = {
    clave:/^[a-zA-Z]{3}\-[0-9]{4}$/,
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,30}$/,
    creditos:/^[0-9-]{1,10}$/
}

const clave = document.getElementById('clave');
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

const nombre = document.getElementById('nombre');
nombre.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    console.log(valorinput);
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim()) && encontrado == false) {
        b2 = true;
        nombre.removeAttribute("style");
        nombre.style.border = "5px solid green";
        /* validar(); */

    }
    else {
        b2 = false;
        nombre.removeAttribute("style");
        nombre.style.border = "5px solid red";
        /* validar(); */
    }
});

const creditos = document.getElementById('creditos');
creditos.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    creditos.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.creditos.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b3 = true;
        creditos.removeAttribute("style");
        creditos.style.border = "5px solid green";
        /* validar(); */

    }
    else {
        b3 = false;
        creditos.removeAttribute("style");
        creditos.style.border = "5px solid red";
        /* validar(); */
    }
});

function validar(){
    const bot = document.getElementById('btn');
    if(b1 == true && b2 == true && b3 == true ){
        location.href = '../ModificacionesBD/InsertaMateria.php'
    }
    else{
        if (b1==false){
            clave.style.border = "5px solid red";
        }
        if (b2==false){
            nombre.style.border = "5px solid red";
        }
        if (b3==false){
            creditos.style.border = "5px solid red";
        }
    }
}