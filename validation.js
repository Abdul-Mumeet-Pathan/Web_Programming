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
  

 
    // Mobile number validation (for Bangladeshi number)
    const mobileField = document.querySelector("input[name='contact_number']");
    const mobileValue = mobileField ? mobileField.value.trim() : '';
    const mobilePattern = /^01\d{9}$/; 

    if (mobileValue && !mobilePattern.test(mobileValue)) {
        displayError("contact_number", "Please enter a valid Bangladeshi mobile number (11 digits, starting with 01).");
        isValid = false;
    }
   // Password validation
   const passwordField = document.querySelector("input[name='password']");
   const confirmPasswordField = document.querySelector("input[name='confirm_password']");
   const password = passwordField ? passwordField.value.trim() : '';
   const confirmPassword = confirmPasswordField ? confirmPasswordField.value.trim() : '';

   const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/;

   if (!password) {
       displayError("password", "Password is required.");
       isValid = false;
   } else if (!passwordPattern.test(password)) {
       displayError("password", "Password must contain at least one uppercase letter, one lowercase letter, and one number. It should be between 8 and 20 characters long.");
       isValid = false;
   }

   // Confirm Password validation
   if (!confirmPassword) {
       displayError("confirm_password", "Please confirm your password.");
       isValid = false;
   } else if (password !== confirmPassword) {
       displayError("confirm_password", "Passwords do not match.");
       isValid = false;
   }

   // Prevent paste in password fields
   passwordField.addEventListener("paste", function(e) {
       e.preventDefault();
       displayError("password", "Pasting is not allowed in the password field.");
   });

   confirmPasswordField.addEventListener("paste", function(e) {
       e.preventDefault();
       displayError("confirm_password", "Pasting is not allowed in the confirm password field.");
   });

   
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
