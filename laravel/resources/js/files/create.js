// Load our customized validationjs library
import Validator from '../validator'
 
// Submit form ONLY when validation is OK
const form = document.getElementById("create")
 
form.addEventListener("submit", function( event ) {
   // Reset errors messages
   // TODO
   document.querySelector('#error').innerHTML = "";
   document.querySelector('#error').classList.remove('show');


   // Create validation
   let data = {
       "upload": document.getElementsByName("upload")[0].value,
   }
   let rules = {
       "upload": "required",
   }
   let validation = new Validator(data, rules)
   // Validate fields
   if (validation.passes()) {
       // Allow submit form (do nothing)
       console.log("Validation OK")
   } else {
       // Get error messages
       let errors = validation.errors.all()
       console.log(errors)
       // Show error messages
       document.querySelector('#error').classList.add('show');
       for(let inputName in errors) {
            //TODO
            if(currentLocale == 'ca'){
                document.querySelector('#error').innerHTML = 'El camp ' + inputName + ' es obligatori.';
            }
            if(currentLocale == 'es'){
                document.querySelector('#error').innerHTML = 'El campo ' + inputName + ' es obligatorio.';
            }
            if(currentLocale == 'en'){
                document.querySelector('#error').innerHTML = 'The field ' + inputName + ' is mandatory.';
            }
           
       }
       // Avoid submit
       event.preventDefault()
       return false
   }
})
