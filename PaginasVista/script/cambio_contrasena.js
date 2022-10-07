var bcontraseña = false;
var busuario = false;


var expreg = /^\S+$/;
const expresiones = {
    alumnos:/^TECNM[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    password:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,16}$/,
}
let contra=" ";
let aux=" ";

//escuchador de eventos para caja usuario

const contrasena = document.getElementById('contrasena');
contrasena.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    contra = e.target.value;
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    if(valorinput!=aux && valorinput.length > 0){
        bcontraseña = false;
        correctopass.style.display = "none";
        confirma.removeAttribute("style");
        confirma.style.border = "5px solid red";
        incorrectopass.style.display = "block";
        incorrectopass.style.color = "red";
        verifica();
    }
    if (valorinput==aux && valorinput.length>0){
        bcontraseña = true;
        incorrectopass.style.display = "none";
        confirma.removeAttribute("style");
        confirma.style.border = "5px solid green";

        correctopass.style.display = "block";
        correctopass.style.color = "green";
        verifica();
    }  
});



//const contrasena = document.getElementById('contrasena');
contrasena.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    contra = e.target.value;
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    contrasena.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);



    if ((expresiones.password.test(valorinput.replace(/\s/g, '').trim()) || expresiones.secretaria.test(valorinput.replace(/\s/g, '').trim()) ) && encontrado == false) {
        busuario = true;
        incorrectoco.style.display = "none";
        contrasena.removeAttribute("style");
        contrasena.style.border = "5px solid green";

        correctoco.style.display = "block";
        correctoco.style.color = "green";
        verifica();
    
    }
    else {
        busuario = false;
        correctoco.style.display = "none";
        contrasena.removeAttribute("style");
        contrasena.style.border = "5px solid red";
        incorrectoco.style.display = "block";
        incorrectoco.style.color = "red";
        verifica();
    }
});
//escuchador de eventos para caja contraseña
const confirma = document.getElementById('confirma');
confirma.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    var i = 0;
    aux=e.target.value;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    confirma.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (valorinput == contra && encontrado == false) {
        bcontraseña = true;
        incorrectopass.style.display = "none";
        confirma.removeAttribute("style");
        confirma.style.border = "5px solid green";

        correctopass.style.display = "block";
        correctopass.style.color = "green";
        verifica();
    }
    else {
        bcontraseña = false;
        correctopass.style.display = "none";
        confirma.removeAttribute("style");
        confirma.style.border = "5px solid red";
        incorrectopass.style.display = "block";
        incorrectopass.style.color = "red";
        verifica();
    }
});


//const contrasena = document.getElementById('contrasena');
contrasena.addEventListener('blur', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    if(valorinput!=aux && valorinput.length > 0){
        bcontraseña = false;
        correctopass.style.display = "none";
        confirma.removeAttribute("style");
        confirma.style.border = "5px solid red";
        incorrectopass.style.display = "block";
        incorrectopass.style.color = "red";
    }
    if (valorinput==aux && valorinput.length>0){
        bcontraseña = true;
        incorrectopass.style.display = "none";
        confirma.removeAttribute("style");
        confirma.style.border = "5px solid green";

        correctopass.style.display = "block";
        correctopass.style.color = "green";
    }    
});

        
//escuchador de eventos para verificacion en el boton
function verifica() {
    const btn = document.getElementById('btn');
    if (bcontraseña == true && busuario == true) {
        btn.disabled=false;
        
    }
    else {
        btn.disabled=true;
        
    }
}
//codigo 