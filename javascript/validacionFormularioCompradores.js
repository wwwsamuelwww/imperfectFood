 (function () {

        let pattern1 = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
    
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
    
             
    
              form.classList.add('was-validated')
    
            }, false)
          })
      })()
