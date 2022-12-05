b1=true;
b2=true;
b3=true;
b4=true;
b5=true;
b6=true;
b7=true;
b8=true;
b9=true;
b10=true;

const expresiones = {
    cadenas:/^([0-9]|[0-9][0-9]|[1][0][0])$/,
    numer:/^NA$/,
}

const uni1 = document.getElementById('uni1');
    uni1.addEventListener('keyup', (e) => {
    let valorInput = e.target.value;
    console.log(uni1.value);
    uni1.value = valorInput.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '').trim()
    if (!expresiones.cadenas.test(valorInput)) {
        uni1.style.border = "3px solid red";
        b1 = false
        if (!expresiones.numer.test(valorInput)) {
            b1 = false
        }else{
            uni1.removeAttribute("style");
            b1 = true
        }
	}else{
        uni1.removeAttribute("style");
        b1 = true
        
    }
});

const uni2 = document.getElementById('uni2');
    uni2.addEventListener('keyup', (e) => {
    let valorInput = e.target.value;
    uni2.value = valorInput.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '').trim()
    if (!expresiones.cadenas.test(valorInput)) {
        uni2.style.border = "3px solid red";
        b2 = false
        if (!expresiones.numer.test(valorInput)) {
            uni2.style.border = "3px solid red";
            b2 = false
        }else{
            uni2.removeAttribute("style");
            b2 = true
        }
	}else{
        uni2.removeAttribute("style");
        b2 = true  
    }
});
const uni3 = document.getElementById('uni3');
    uni3.addEventListener('keyup', (e) => {
    let valorInput = e.target.value;
    console.log(uni3.value);
    uni3.value = valorInput.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '').trim()
    if (!expresiones.cadenas.test(valorInput)) {
        uni3.style.border = "3px solid red";
        b3 = false
        if (!expresiones.numer.test(valorInput)) {
            uni3.style.border = "3px solid red";
            b3 = false
        }else{
            uni3.removeAttribute("style");
            b3= true
        }
	}else{
        uni3.removeAttribute("style");
        b3 = true 
    }
});


function validar(){
   
    const bot = document.getElementById('btn');
    
        /* console.log("habilitado"); */
        /*  bot.disabled=false;  */
       /* location.href = '../ModificacionesBD/InsertaEstu.php'  */
       if(b1==true && b2==true && b3==true && b4==true && b5==true && b6==true && b7==true && b8==true && b9==true && b10==true){
        bot.disabled=false;
        location.href = '../ModificacionesBD/CapturaCalif.php'
       }
       else{
        bot.disabled=true;
       }
           
  
}