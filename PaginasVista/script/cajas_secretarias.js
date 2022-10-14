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

//expresion regular para aceptar simbolo # , letras y numeros
//onst expreg = /^[a-zA-Z0-9#]+$/;

var expreg = /^\S+$/;
const expresiones = {

    alumnos:/^TECNM[\d]{10}$/,
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
    //calle:/^(^[\w\WáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    //calle:/^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    calle:/^(^[a-zA-Z0-9#áéíóúÁÉÍÓÚñÑ ]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    //correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/,
}

const numeroEmple = document.getElementById('numeroEmple');
numeroEmple.addEventListener('keyup', (e) => {
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
    numeroEmple.value = valorinput.replace(/\s/g, '').trim();
    if (expresiones.secretaria.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        numeroEmple.removeAttribute("style");
        numeroEmple.style.border = "3px solid green";
        validar();

    }
    else {
        b1 = false;
        numeroEmple.removeAttribute("style");
        numeroEmple.style.border = "3px solid red";
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
//const apellidoP = document.getElementById('apellidoP');
apellidoP.addEventListener('keyup', (e) => {
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
    //apellidoP.value = valorinput.replace(/\s/g, '').trim();
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
/* const apellidoM = document.getElementById('apellidoM');
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
    //apellidoM.value = valorinput.replace(/\s/g, '').trim();
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
}); */
const calle = document.getElementById('calle');
calle.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var encontrado = false;
    
    if (expresiones.calle.test(valorinput) && encontrado == false) {
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
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //colonia.value = valorinput.replace(/\s/g, '').trim();
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
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //municipio.value = valorinput.replace(/\s/g, '').trim();
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
   /*  while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
    //estado.value = valorinput.replace(/\s/g, '').trim();
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
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
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
    /* while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    } */
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
    if (expresiones.correo.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b11 = true;
        correo.removeAttribute("style");
        correo.style.border = "3px solid green";
        validar();

    }
    else {
        b11 = false;
        correo.removeAttribute("style");
        correo.style.border = "3px solid red";
        validar();
    }
});

function validar(){
    const bot = document.getElementById('btn');
    if(b1 == true && b2 == true && b3 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true && b10 == true && b11 == true){
        bot.disabled=false;
    }
    else{
        bot.disabled=true;
    }
}