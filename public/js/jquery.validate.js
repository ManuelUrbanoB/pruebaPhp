$(document).ready(function(){
    $('#form-empleado').validate({
        rules:{
            fields:{
                required:true,
            },message:{
                required:"Este campo es obligatorio"
            },
            nombre:{
                required:true,
                lettersonly:true,
            },
            
            email:{
                required:true,
                email:true
            },
            descripcion:{
                required:true,
            },
            genero:{
                required:true,
            }

        }
    });  
    jQuery.validator.addMethod('lettersonly', function(value, element) {
        return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
    }, "Letras y espacios solamente");      
    
});