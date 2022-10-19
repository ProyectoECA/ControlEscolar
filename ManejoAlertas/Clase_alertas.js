
class Alertas{

    constructor(nombre_archivo,nombre_formulario){
        this.nombre_formulario = nombre_formulario;
        this.nombre_archivo = nombre_archivo;
    }
    
    set setNombreFormulario(nombre_formulario){
        //pone el nombre del identificador del formulario 
        this.nombre_formulario = nombre_formulario
    }

    set setNombreArchivoPHP(nombre_archivo){
        //coloca el nombre del archivo php que regresara el JSON en respuesta
        this.nombre_archivo = nombre_archivo;
    }

    get getNombreArchivoPHP(){
        return this.nombre_archivo;
    }
    get getNombreFormulario(){
        return this.nombre_formulario;
    }

    EjecutarAlerta(){
        // junta todas las piezas para mostrar alerta en la pagina web
        
        const form = document.getElementById(this.nombre_formulario);

        form.addEventListener('submit', function (event) {

        event.preventDefault();//para que no haga lo que debe por defecto
        var data = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', this.nombre_archivo);

        xhr.onload = function () {
            
            if (xhr.status === 200) {
                alert("wqohdoq");
                // si la respuesta fue un JSON y no hubo ningun error
                var response = JSON.parse(xhr.responseText);
                alert(response.mensaje);
            }
        }
        xhr.send(data);
        });
    }

}

export default Alertas;

