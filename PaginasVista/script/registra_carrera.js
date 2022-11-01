var b1=false;
var b2=false;
var b3=false;

var expreg = /^\S+$/;
const expresiones = { 
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,30}$/,
}
const clave = document.getElementById('clave');
clave.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    if (valorinput!=""){
        b1=true;
        validar();
    }
    else{
        b1=false;
        validar();
    }
});
const nombre = document.getElementById('nombre');
nombre.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b2 = true;
        nombre.removeAttribute("style");
        nombre.style.border = "3px solid green";
        validar();

    }
    else {
        b2 = false;
        nombre.removeAttribute("style");
        nombre.style.border = "3px solid red";
        validar();
    }
});

function validar() {
    const btn = document.getElementById('btn');
    if ( b1 == true && b2 == true) {
        btn.disabled=false;
        
    }
    else {
        btn.disabled=true;
        
    }
}