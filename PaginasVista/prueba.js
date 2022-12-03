b1=true;

const expresiones = {
    cadena: /^[A,N]{2,3}$/,
}

const uni1 = document.getElementById('uni1');
uni1.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    uni1.value = valorinput.replace(/\s/g, '').trim();
    console.log(valorinput);
    if (expresiones.cadena.test(valorinput.replace(/\s/g, '').trim() ) && encontrado == false) {
        b1 = true;
        uni1.removeAttribute("style");
        uni1.style.border = "5px solid green";
        

    }
    else {
        b1 = false;
        uni1.removeAttribute("style");
        uni1.style.border = "5px solid red";
        validar();
    }
});

function validar(){
   
    const bot = document.getElementById('btn');
    
        /* console.log("habilitado"); */
        /*  bot.disabled=false;  */
       /* location.href = '../ModificacionesBD/InsertaEstu.php'  */
       if(b1==true){
        location.href = '../ModificacionesBD/CapturaCalif.php'
       }
           
  
}