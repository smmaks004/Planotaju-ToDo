function validation(form){
    
    function removeError(input){
        const parent = input.parentNode;

        if (parent.classList.contains('error')){
            parent.querySelector('.error-label').remove()
            parent.classList.remove('error')
        }
    }

    function createError(input, text){
        const parent = input.parentNode;
        const errorLabel = document.createElement('label')
        console.log(parent)

        errorLabel.classList.add('error-label')
        errorLabel.textContent = text
        
        parent.classList.add('error')
        parent.append(errorLabel)
    }
    let result = true;
    const allInputs = form.querySelectorAll('input');

    for (const input of allInputs){
        removeError(input)

        if (input.dataset.minLength){
            if (input.value.length < input.dataset.minLength){
                removeError(input)
                createError(input, `Min ${input.dataset.minLength} characters`)
                result = false
            }
        }

        if (input.dataset.required == "true"){
            removeError(input)
            if (input.value == ""){
                removeError(input)
                createError(input, "Validation Error")
                result = false
            }
        }
    }
    return result
}

document.getElementById('task_creation').addEventListener('submit', function(event){
    event.preventDefault()
    var form = document.getElementById('task_creation');

    if (validation(this) == true){
      var formData = new FormData(form);
      var request = new XMLHttpRequest();
      request.open('POST', 'save_task.php');

      request.onload = function() {
        if (request.status === 200) {
          // Request completed successfully
          window.location.href = 'http://localhost/save_task.php';
        } else {
          // An error occurred while executing the request
          alert('Error saving task. Please try again.');
        }
      };

      request.send(formData);
      
    }
})

