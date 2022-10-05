
var bcontraseña = false;
var busuario = false;


var expreg = /^\S+$/;
const expresiones = {
    alumnos:/^TECNM[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    password:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,16}$/,
}


//escuchador de eventos para caja usuario
const usuario = document.getElementById('usuario');
usuario.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    usuario.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if ((expresiones.alumnos.test(valorinput.replace(/\s/g, '').trim()) || expresiones.secretaria.test(valorinput.replace(/\s/g, '').trim()) ) && encontrado == false) {
        busuario = true;
        incorrectousuario.style.display = "none";
        usuario.removeAttribute("style");
        usuario.style.border = "5px solid green";

        correctousuario.style.display = "block";
        correctousuario.style.color = "green";

    }
    else {
        busuario = false;
        correctousuario.style.display = "none";
        usuario.removeAttribute("style");
        usuario.style.border = "5px solid red";
        incorrectousuario.style.display = "block";
        incorrectousuario.style.color = "red";
    }
});
//escuchador de eventos para caja contraseña
const contraseña = document.getElementById('contraseña');
contraseña.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    var i = 0;
    var encontrado = false;
    while (i < valorinput.length && encontrado == false) {
        if (valorinput.charAt(i) == "ñ" || valorinput.charAt(i) == "Ñ") {
            encontrado = true;
        }
        i++;
    }
    contraseña.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.password.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        bcontraseña = true;
        incorrectopass.style.display = "none";
        contraseña.removeAttribute("style");
        contraseña.style.border = "5px solid green";

        correctopass.style.display = "block";
        correctopass.style.color = "green";

    }
    else {
        bcontraseña = false;
        correctopass.style.display = "none";
        contraseña.removeAttribute("style");
        contraseña.style.border = "5px solid red";
        incorrectopass.style.display = "block";
        incorrectopass.style.color = "red";
    }
});


//escuchador de eventos para verificacion en el boton
function verifica() {
    if (bcontraseña == true && busuario == true) {
        //return true;
        console.log("formulario enviado");
        alert("formulario enviado");
    }
    else {
        //return false;
        console.log("formulario no enviado");
        alert("formulario no enviado");
    }
}