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

//expresion regular para texto que comience letra y continue numero
const expresion = /^[a-zA-Z][a-zA-Z0-9]*$/;
//expresion regular de correo
const expresion2 = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
//expresion regular de letras con acentos
const expresion3 = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;




var expreg = /^\S+$/;
const expresiones = {
    
    alumnos:/^TECNM[\d]{10}$/,
    codigo:/^[\d]{5}$/,
    maestros:/^RH[\d]{3}$/,  
    rfc:/^[a-zA-Z0-9]{12,13}$/,
    telefono:/^[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    //nom:/^([a-zA-Z]{3,30})+$/,
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,30}$/,
    //apellido:/^([a-zA-Z]{3,15})+$/,
    apellido:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,15}$/,
    colonia:/^([a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{4,10})+$/,
    estado:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,20})+$/,
    titulo:/^([\d]{8})+$/,
    municipio:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25})+$/,
    calle:/^(^[a-zA-Z0-9#áéíóúÁÉÍÓÚñÑ ]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    //correo:/^([a-zA-Z0-9_\.\-]{1,30})+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    //correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/,
}


//escuchador de eventos para caja usuario
const clave = document.getElementById('clave');
clave.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
   /*  while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    clave.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.maestros.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        clave.removeAttribute("style");
        clave.style.border = "5px solid green";
        validar();

    }
    else {
        b1 = false;
        clave.removeAttribute("style");
        clave.style.border = "5px solid red";
        validar();
    }
});
const nombre = document.getElementById('nombre');
nombre.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //nombre.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b2 = true;
        nombre.removeAttribute("style");
        nombre.style.border = "5px solid green";
        validar();

    }
    else {
        b2 = false;
        nombre.removeAttribute("style");
        nombre.style.border = "5px solid red";
        validar();
    }
});
const apePat = document.getElementById('apePat');
apePat.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
   /*  while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //apePat.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b3= true;
        apePat.removeAttribute("style");
        apePat.style.border = "5px solid green";
        validar();

    }
    else {
        b3 = false;
        apePat.removeAttribute("style");
        apePat.style.border = "5px solid red";
        validar();
    }
});
/* const apeMat = document.getElementById('apeMat');
apeMat.addEventListener('keyup', (e) => {
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
    //apeMat.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b4= true;
        apeMat.removeAttribute("style");
        apeMat.style.border = "5px solid green";
        validar();

    }
    else {
        b4= false;
        apeMat.removeAttribute("style");
        apeMat.style.border = "5px solid red";
        validar();
    }
}); */
const calle = document.getElementById('calle');
calle.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);

    var encontrado = false;

    
    console.log(valorinput);
    if (expresiones.calle.test(valorinput) && encontrado == false) {
        b5 = true;
        calle.removeAttribute("style");
        calle.style.border = "5px solid green";
        validar();

    }
    else {
        b5 = false;
        calle.removeAttribute("style");
        calle.style.border = "5px solid red";
        validar();
    }
});
const colonia = document.getElementById('colonia');
colonia.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //colonia.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.colonia.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b6 = true;
        colonia.removeAttribute("style");
        colonia.style.border = "5px solid green";
        validar();

    }
    else {
        b6= false;
        colonia.removeAttribute("style");
        colonia.style.border = "5px solid red";
        validar();
    }
});
const municipio = document.getElementById('municipio');
municipio.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //municipio.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.municipio.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b7 = true;
        municipio.removeAttribute("style");
        municipio.style.border = "5px solid green";
        validar();

    }
    else {
        b7 = false;
        municipio.removeAttribute("style");
        municipio.style.border = "5px solid red";
        validar();
    }
});
const estado = document.getElementById('estado');
estado.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //estado.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.estado.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b8 = true;
        estado.removeAttribute("style");
        estado.style.border = "5px solid green";
        validar();

    }
    else {
        b8 = false;
        estado.removeAttribute("style");
        estado.style.border = "5px solid red";
        validar();
    }
});
const cp = document.getElementById('cp');
cp.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
   /*  while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    cp.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.codigo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b9 = true;
        cp.removeAttribute("style");
        cp.style.border = "5px solid green";
        validar();

    }
    else {
        b9 = false;
        cp.removeAttribute("style");
        cp.style.border = "5px solid red";
        validar();
    }
});
const telefono = document.getElementById('telefono');
telefono.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    telefono.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b10 = true;
        telefono.removeAttribute("style");
        telefono.style.border = "5px solid green";
        validar();

    }
    else {
        b10 = false;
        telefono.removeAttribute("style");
        telefono.style.border = "5px solid red";
        validar();
    }
});
const rfc = document.getElementById('rfc');
rfc.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    rfc.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.rfc.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b11= true;
        rfc.removeAttribute("style");
        rfc.style.border = "5px solid green";
        validar();

    }
    else {
        b11 = false;
        rfc.removeAttribute("style");
        rfc.style.border = "5px solid red";
        validar();
    }
});
const titulo = document.getElementById('titulo');
titulo.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    titulo.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.titulo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b12 = true;
        titulo.removeAttribute("style");
        titulo.style.border = "5px solid green";
        validar();

    }
    else {
        b12 = false;
        titulo.removeAttribute("style");
        titulo.style.border = "5px solid red";
        validar();
    }
});
const correo = document.getElementById('correo');
correo.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    correo.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.correo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b13 = true;
        correo.removeAttribute("style");
        correo.style.border = "5px solid green";
        validar();

    }
    else {
        b13= false;
        correo.removeAttribute("style");
        correo.style.border = "5px solid red";
        validar();
    }
});

function validar(){
    const btn = document.getElementById('btn');
    if (b1 == true && b2 == true && b3 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true && b10 == true && b11 == true && b12 == true && b13 == true) {
        btn.disabled=false;
    }
    else {
        btn.disabled=true;
    }
}