var b1=false;
var b2=false;
var b3=false;
var b4=false;
var b5=false;
var b6=false;
var b7=false;
var b8=false;
var b9=false;
var b10=false;
var b11=false;
var b12=false;
var b13=false;


var expreg = /^\S+$/;
const expresiones = {
    alumnos:/^TECNM[\d]{10}$/,
    codigo:/^[\d]{5}$/,
    rfc:/^[\w\W]{13}$/,
    telefono:/^[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    nom:/^([a-zA-Z]{3,30})+$/,
    apellido:/^([a-zA-Z]{3,15})+$/,
    colonia:/^([a-zA-Z]{4,10})+$/,
    estado:/^([a-zA-Z]{4,20})+$/,
    titulo:/^([a-zA-Z]{20})+$/,
    municipio:/^([a-zA-Z]{4,25})+$/,
    calle:/^([\w\W]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    correo:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
}

const numerocontrol = document.getElementById('numerocontrol');
numerocontrol.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    numerocontrol.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.alumnos.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        numerocontrol.removeAttribute("style");
        numerocontrol.style.border = "3px solid green";
        validar();

    }
    else {
        b1 = false;
        numerocontrol.removeAttribute("style");
        numerocontrol.style.border = "3px solid red";
        validar();
    }
});
const nombre = document.getElementById('nombre');
nombre.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    nombre.value = valorinput.replace(/\s/g, '').trim();
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
const apellidoP = document.getElementById('apellidoP');
apellidoP.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    apellidoP.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b3 = true;
        apellidoP.removeAttribute("style");
        apellidoP.style.border = "3px solid green";
        validar();
    }
    else {
        b3 = false;
        apellidoP.removeAttribute("style");
        apellidoP.style.border = "3px solid red";
        validar();
    }
});
const apellidoM = document.getElementById('apellidoM');
apellidoM.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    apellidoM.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b4 = true;
        apellidoM.removeAttribute("style");
        apellidoM.style.border = "3px solid green";
        validar();

    }
    else {
        b4 = false;
        apellidoM.removeAttribute("style");
        apellidoM.style.border = "3px solid red";
        validar();
    }
});
const calle = document.getElementById('calle');
calle.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    calle.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.calle.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b5= true;
        calle.removeAttribute("style");
        calle.style.border = "3px solid green";
        validar();

    }
    else {
        b5 = false;
        calle.removeAttribute("style");
        calle.style.border = "3px solid red";
        validar();
    }
});
const colonia = document.getElementById('colonia');
colonia.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    colonia.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.colonia.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b6 = true;
        colonia.removeAttribute("style");
        colonia.style.border = "3px solid green";
        validar();

    }
    else {
        b6 = false;
        colonia.removeAttribute("style");
        colonia.style.border = "3px solid red";
        validar();
    }
});
const municipio = document.getElementById('municipio');
municipio.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    municipio.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.municipio.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b7 = true;
        municipio.removeAttribute("style");
        municipio.style.border = "3px solid green";
        validar();

    }
    else {
        b7 = false;
        municipio.removeAttribute("style");
        municipio.style.border = "3px solid red";
        validar();
    }
});
const estado = document.getElementById('estado');
estado.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    estado.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.estado.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b8 = true;
        estado.removeAttribute("style");
        estado.style.border = "3px solid green";
        validar();

    }
    else {
        b8 = false;
        estado.removeAttribute("style");
        estado.style.border = "3px solid red";
        validar();
    }
});
const cp = document.getElementById('cp');
cp.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    cp.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.codigo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b9 = true;
        cp.removeAttribute("style");
        cp.style.border = "3px solid green";
        validar();

    }
    else {
        b9 = false;
        cp.removeAttribute("style");
        cp.style.border = "3px solid red";
        validar();
    }
});
const tel = document.getElementById('tel');
tel.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    tel.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b10 = true;
        tel.removeAttribute("style");
        tel.style.border = "3px solid green";
        validar();

    }
    else {
        b10 = false;
        tel.removeAttribute("style");
        tel.style.border = "3px solid red";
        validar();
    }
});
const tutor = document.getElementById('tutor');
tutor.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    tutor.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b11 = true;
        tutor.removeAttribute("style");
        tutor.style.border = "3px solid green";
        validar();

    }
    else {
        b11 = false;
        tutor.removeAttribute("style");
        tutor.style.border = "3px solid red";
        validar();
    }
});
const teltutor = document.getElementById('teltutor');
teltutor.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    teltutor.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b12 = true;
        teltutor.removeAttribute("style");
        teltutor.style.border = "3px solid green";
        validar();

    }
    else {
        b12 = false;
        teltutor.removeAttribute("style");
        teltutor.style.border = "3px solid red";
        validar();
    }
});
const correo = document.getElementById('correo');
correo.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    correo.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.correo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b13 = true;
        correo.removeAttribute("style");
        correo.style.border = "3px solid green";
        validar();

    }
    else {
        b13 = false;
        correo.removeAttribute("style");
        correo.style.border = "3px solid red";
        validar();
    }
});

function validar(){
    const bot = document.getElementById('btn');
    if(b1 == true && b2 == true && b3 == true && b4 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true && b10 == true && b11 == true && b12 == true &&  b13 == true ){
        bot.disabled=false;
    }
    else{
        bot.disabled=true;
    }
}