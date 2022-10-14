var b1=false;
var b2=false;
var b3=false;

var expreg = /^\S+$/;
const expresiones = {
    clave:/^[\d]{5}$/, 
    semestre:/^[\d]{1,2}$/, 
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,30}$/,
}

const clave = document.getElementById('clave');
clave.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    clave.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.clave.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        clave.removeAttribute("style");
        clave.style.border = "3px solid green";
        validar();

    }
    else {
        b1 = false;
        clave.removeAttribute("style");
        clave.style.border = "3px solid red";
        validar();
    }
});

const semestres = document.getElementById('semestres');
semestres.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    semestres.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.semestre.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b2 = true;
        semestres.removeAttribute("style");
        semestres.style.border = "3px solid green";
        validar();

    }
    else {
        b2 = false;
        semestres.removeAttribute("style");
        semestres.style.border = "3px solid red";
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
        b3 = true;
        nombre.removeAttribute("style");
        nombre.style.border = "3px solid green";
        validar();

    }
    else {
        b3 = false;
        nombre.removeAttribute("style");
        nombre.style.border = "3px solid red";
        validar();
    }
});

function validar() {
    const btn = document.getElementById('btn');
    const btn1 = document.getElementById('btn1');
    if (b1 == true && b2 == true && b3 == true) {
        btn.disabled=false;
        btn1.disabled=false;
        
    }
    else {
        btn.disabled=true;
        btn1.disabled=true;
        
    }
}