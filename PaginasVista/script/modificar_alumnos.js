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



var expreg = /^\S+$/;
const expresiones = {

    alumnos:/^TNM[\d]{10}$/,
    codigo:/^[\d]{5}$/,
    maestros:/^RH[\d]{3}$/,  
    rfc:/^[\w\W]{13}$/,
    telefono:/^[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,30}$/,
    apellido:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,15}$/,
    colonia:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,10})+$/,
    estado:/^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,20})+$/,
    titulo:/^([a-zA-Z]{20})+$/,
    municipio:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25})+$/,
    calle:/^(^[\w\WáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
}

const control = document.getElementById('ncontrol');
control.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    control.value = valorinput.replace(/\s/g, '').trim();
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
const pat = document.getElementById('apaterno');
pat.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b3 = true;
        pat.removeAttribute("style");
        pat.style.border = "3px solid green";
        validar();

    }
    else {
        b3 = false;
        pat.removeAttribute("style");
        pat.style.border = "3px solid red";
        validar();
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
        validar();

    }
    else {
        b4 = false;
        calle.removeAttribute("style");
        calle.style.border = "3px solid red";
        validar();
    }
});
const col= document.getElementById('colonia');
col.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.colonia.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b5 = true;
        col.removeAttribute("style");
        col.style.border = "3px solid green";
        validar();

    }
    else {
        b5 = false;
        col.removeAttribute("style");
        col.style.border = "3px solid red";
        validar();
    }
});
const mun= document.getElementById('municipio');
mun.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    if (expresiones.municipio.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b6 = true;
        mun.removeAttribute("style");
        mun.style.border = "3px solid green";
        validar();

    }
    else {
        b6 = false;
        mun.removeAttribute("style");
        mun.style.border = "3px solid red";
        validar();
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
        validar();

    }
    else {
        b7 = false;
        estado.removeAttribute("style");
        estado.style.border = "3px solid red";
        validar();
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
        validar();

    }
    else {
        b8 = false;
        cp.removeAttribute("style");
        cp.style.border = "3px solid red";
        validar();
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
        validar();

    }
    else {
        b9 = false;
        tel.removeAttribute("style");
        tel.style.border = "3px solid red";
        validar();
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
        validar();

    }
    else {
        b10 = false;
        correo.removeAttribute("style");
        correo.style.border = "3px solid red";
        validar();
    }
});
const tutor= document.getElementById('tutor');
tutor.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

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
const teltutor= document.getElementById('teltutor');
teltutor.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

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
function validar() {
    const btn = document.getElementById('btn');
    const btn1 = document.getElementById('btn1');
    if (b1 == true && b2 == true && b3 == true && b4 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true & b10 == true && b11 == true && b12 == true) {
        btn.disabled=false;
        btn1.disabled=false;
        
    }
    else {
        btn.disabled=true;
        btn1.disabled=true;
        
    }
}