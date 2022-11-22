var b1=true;
var b2=true;
var b3=true;
var b4=true;
var b5=true;
var b6=true;
var b7=true;
var b8=true;
var b9=true;
var b10=true;
var b11=true;
var b12=true;


var expreg = /^\S+$/;
const expresiones = {

    alumnos:/^TNM[\d]{10}$/,
    codigo:/^[\d]{5}$/,
    maestros:/^RH[\d]{3}$/,  
    rfc:/^[a-zA-Z0-9]{12,13}$/,
    telefono:/^[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,30}$/,
    apellido:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,15}$/,
    colonia:/^([a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{4,10})+$/,
    estado:/^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,20})+$/,
    titulo:/^([a-zA-Z]{20})+$/,
    municipio:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25})+$/,
    calle:/^(^[a-zA-Z0-9#áéíóúÁÉÍÓÚñÑ ]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/,
}

/* const control = document.getElementById('control');
control.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.alumnos.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        control.removeAttribute("style");
        control.style.border = "3px solid green";
        validar();

    }
    else {
        b1 = false;
        control.removeAttribute("style");
        control.style.border = "3px solid red";
        validar();
    }
}); */
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
        /* validar(); */

    }
    else {
        b2 = false;
        nombre.removeAttribute("style");
        nombre.style.border = "3px solid red";
        /* validar(); */
    }
});
const ap = document.getElementById('ap');
ap.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b3 = true;
        ap.removeAttribute("style");
        ap.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b3 = false;
        ap.removeAttribute("style");
        ap.style.border = "3px solid red";
       /*  validar(); */
    }
});
const calle= document.getElementById('calle');
calle.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.calle.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b4 = true;
        calle.removeAttribute("style");
        calle.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b4 = false;
        calle.removeAttribute("style");
        calle.style.border = "3px solid red";
        /* validar(); */
    }
});
const colonia= document.getElementById('colonia');
colonia.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.colonia.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b5 = true;
        colonia.removeAttribute("style");
        colonia.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b5 = false;
        colonia.removeAttribute("style");
        colonia.style.border = "3px solid red";
        /* validar(); */
    }
});
const municipio= document.getElementById('municipio');
municipio.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.municipio.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b6 = true;
        municipio.removeAttribute("style");
        municipio.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b6 = false;
        municipio.removeAttribute("style");
        municipio.style.border = "3px solid red";
        /* validar(); */
    }
});
const estado= document.getElementById('estado');
estado.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.estado.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b7 = true;
        estado.removeAttribute("style");
        estado.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b7 = false;
        estado.removeAttribute("style");
        estado.style.border = "3px solid red";
       /*  validar(); */
    }
});
const cp= document.getElementById('cp');
cp.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.codigo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b8 = true;
        cp.removeAttribute("style");
        cp.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b8 = false;
        cp.removeAttribute("style");
        cp.style.border = "3px solid red";
       /*  validar(); */
    }
});
const tel= document.getElementById('tel');
tel.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b9 = true;
        tel.removeAttribute("style");
        tel.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b9 = false;
        tel.removeAttribute("style");
        tel.style.border = "3px solid red";
        /* validar(); */
    }
});
const correo= document.getElementById('correo');
correo.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.correo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b10 = true;
        correo.removeAttribute("style");
        correo.style.border = "3px solid green";
       /*  validar(); */

    }
    else {
        b10 = false;
        correo.removeAttribute("style");
        correo.style.border = "3px solid red";
        /* validar(); */
    }
});
const teltu= document.getElementById('teltu');
teltu.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b11 = true;
        teltu.removeAttribute("style");
        teltu.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b11 = false;
        teltu.removeAttribute("style");
        teltu.style.border = "3px solid red";
        /* validar(); */
    }
});
const nomtu= document.getElementById('nomtu');
nomtu.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b12 = true;
        nomtu.removeAttribute("style");
        nomtu.style.border = "3px solid green";
        /* validar(); */

    }
    else {
        b12 = false;
        nomtu.removeAttribute("style");
        nomtu.style.border = "3px solid red";
        /* validar(); */
    }
});
//funcion validar
function validar() {
    if (b2 == true && b3 == true && b4 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true && b10 == true && b11 == true && b12 == true) {
        /* document.getElementById("btn").disabled = false;
        document.getElementById("btn2").disabled = false; */
    }
    else {
        /* document.getElementById("btn").disabled = true;
        document.getElementById("btn2").disabled = true; */
    }
}