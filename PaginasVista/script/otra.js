formulario.nombreCliente.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.nombreCliente.value = valorInput
    // Eliminar numeros
    //.replace(/[0-9]/g, '')
     // Eliminar caracteres especiales
    .replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '')
    if (!expresiones.cadenas.test(valorInput)) {
        nombreCliente.style.border = "3px solid red";
        bandNombre = false
        if (!expresiones.numer.test(valorInput)) {
            nombreCliente.style.border = "3px solid red";
            bandNombre = false
        }else{
            nombreCliente.removeAttribute("style");
            bandNombre = true
        }
	}else{
        nombreCliente.removeAttribute("style");
        bandNombre = true
        
    }
    validar(bandNombre);
})



const uni1 = document.getElementById('uni1');
uni1.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    var i = 0;
    var encontrado = false;

    uni1.value = valorinput.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '').trim();
    console.log(valorinput);
    if (expresiones.cadena.test(valorinput.replace(/[üâäàåçê♪ëèïîìÄÅÉæÆôöòûùÿÖÜ¢£¥₧ƒªº¿⌐¬½¼«»÷±~!¡@#$%^&^*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '').trim() ) && encontrado == false) {
        b1 = true;
        uni1.removeAttribute("style");
        uni1.style.border = "5px solid green";
        validar();
        

    }
    else {
        b1 = false;
        uni1.removeAttribute("style");
        uni1.style.border = "5px solid red";
        validar();
    }
});