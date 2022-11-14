 (function () {

        let pattern1 = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
        let pattern2 = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 
        let pattern3 = /^[A-Z|a-z|0-9|&|$|@|-|%|*|#|,|.|;|+|/]{6,14}$/; 
  
  
        var forms = document.querySelectorAll('.needs-validation')
    
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              var formulario = form.getElementsByTagName("input");
              var alertas = form.getElementsByClassName("invalid-feedback");
              console.log(formulario);
    
    
              if (!formulario[0].value.match(pattern1)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion1").innerText = "Ingrese un nombre valido";
                if(formulario[0].value == ""){
                  document.getElementById("validacion1").innerText = "Este campo es obligatorio";
      
                }
              }
    
             if (!formulario[1].value.match(pattern2)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion2").innerText = "Ingrese un email valido";
                if(formulario[1].value == ""){
                  document.getElementById("validacion2").innerText = "Este campo es obligatorio";
                }
              }
             
             if (!formulario[2].value.match(pattern3)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion3").innerText = "La contraseña debe tener un minimo de 6 caracteres y maximo 14";
                
                if(formulario[2].value == ""){
                  document.getElementById("validacion3").innerText = "Este campo es obligatorio";
      
                }
              }
              form.classList.add('was-validated')
    
            }, false)
          })
      })()