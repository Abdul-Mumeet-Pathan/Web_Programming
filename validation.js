// Function to validate the form
function validateForm(event) {
    // Clear previous error messages
    clearErrors();

    // Get all input fields and check if they are empty
    const inputs = document.querySelectorAll("input, textarea, select");
    let isValid = true;

    inputs.forEach(input => {
        const fieldName = input.name;
        const value = input.value.trim();

        // Skip radio buttons and checkboxes, we will handle them separately
        if (input.type !== 'radio' && input.type !== 'checkbox' && value === '') {
            displayError(fieldName, "This field is required.");
            isValid = false;
        }
    });

    // Validate radio buttons (ensure at least one option is selected)
    const radioGroups = document.querySelectorAll(".radio-group");
    radioGroups.forEach(group => {
        const selectedRadio = group.querySelector("input[type='radio']:checked");
        if (!selectedRadio) {
            const groupName = group.name;
            displayError(groupName, "Please select an option.");
            isValid = false;
        }
    });

 // Email validation (to ensure a valid email format is entered)
 const emailField = document.querySelector("input[name='email']");
 const emailValue = emailField ? emailField.value.trim() : '';
 const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

 if (emailValue && !emailPattern.test(emailValue)) {
     displayError("email", "Please enter a valid email address.");
     isValid = false;
 }

 // If not valid, prevent form submission
 if (!isValid) {
     event.preventDefault();
 }

 return isValid;
}


// Function to display error messages
function displayError(fieldName, message) {
    const errorElement = document.getElementById(fieldName + "Error");
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.style.color = "red";
    }
}

// Function to clear all error messages
function clearErrors() {
    const errorElements = document.querySelectorAll(".error");
    errorElements.forEach(function (errorElement) {
        errorElement.textContent = "";
    });
}
