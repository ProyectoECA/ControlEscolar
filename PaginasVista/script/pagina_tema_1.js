var b1=true;
var b2=true;
var b3=true;
var b4=true;
var b5=true;
var b6=true;
const expresiones = {
    fecha: /^([0-9]{2})-([0-9]{2})-([0-9]{4})$/,
}

const proi = document.getElementById('ProI');
proi.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    proi.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.fecha.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        proi.removeAttribute("style");
        proi.style.border = "5px solid green";
        validar();

    }
    else {
        b1 = false;
        proi.removeAttribute("style");
        proi.style.border = "5px solid red";
        validar();
    }
});
const ProT = document.getElementById('ProT');
ProT.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    ProTe.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.fecha.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b2 = true;
        ProT.removeAttribute("style");
        ProT.style.border = "5px solid green";
        validar();

    }
    else {
        b2 = false;
        ProT.removeAttribute("style");
        ProT.style.border = "5px solid red";
        validar();
    }
});
const RealI = document.getElementById('RealI');
RealI.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    RealI.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.fecha.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b3 = true;
        RealI.removeAttribute("style");
        RealI.style.border = "5px solid green";
        validar();

    }
    else {
        b3 = false;
        RealI.removeAttribute("style");
        RealI.style.border = "5px solid red";
        validar();
    }
});
const RealT = document.getElementById('RealT');
RealT.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    RealT.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.fecha.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b4 = true;
        RealT.removeAttribute("style");
        RealT.style.border = "5px solid green";
        validar();

    }
    else {
        b4 = false;
        RealT.removeAttribute("style");
        RealT.style.border = "5px solid red";
        validar();
    }
});
const EvaP = document.getElementById('EvaP');
EvaP.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    EvaP.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.fecha.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b5 = true;
        EvaP.removeAttribute("style");
        EvaP.style.border = "5px solid green";
        validar();

    }
    else {
        b5 = false;
        EvaP.removeAttribute("style");
        EvaP.style.border = "5px solid red";
        validar();
    }
});
const clave = document.getElementById('EvaR');
clave.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    clave.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.fecha.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b6 = true;
        clave.removeAttribute("style");
        clave.style.border = "5px solid green";
        validar();

    }
    else {
        b6 = false;
        clave.removeAttribute("style");
        clave.style.border = "5px solid red";
        validar();
    }
});

function validar(){
   
     const bot = document.getElementById('btn');
     if(b1 == true && b2 == true && b3 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true && b10 == true && b11 == true && b12 == true &&  b13 == true){
         /* console.log("habilitado"); */
         /*  bot.disabled=false;  */
        /* location.href = '../ModificacionesBD/InsertaEstu.php'  */
        location.href = '../ModificacionesBD/InsertaFechasEvaluacion.php'     
    }
     else{
         /* console.log("deshabilitado"); */
         /*  bot.disabled=true;  */
          if(b1== false){
             proi.style.border = "3px solid red";
         }
         if(b2== false){
             ProT.style.border = "3px solid red";
         }
         if(b3== false){
             RealI.style.border = "3px solid red";
         }
         if(b5== false){
             EvaP.style.border = "3px solid red";
         }
         if(b6== false){
             clave.style.border = "3px solid red";
         }
         if(b4== false){
             RealT.style.border = "3px solid red";
         }
 
     }
 }