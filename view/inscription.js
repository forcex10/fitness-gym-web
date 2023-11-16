function displayErrorMessage(elementId, message) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerHTML = message;
    errorElement.style.color = 'red';
}

function clearErrorMessages() {
    var errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(function (element) {
        element.innerHTML = '';
    });
}

function validateForm() {
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');

    clearErrorMessages();

    if (firstName.value === "") {
        displayErrorMessage('firstNameError', 'Veuillez entrer votre prénom.');
        return;
    }

    if (lastName.value === "") {
        displayErrorMessage('lastNameError', 'Veuillez entrer votre nom.');
        return;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        displayErrorMessage('emailError', 'Veuillez entrer une adresse e-mail valide.');
        return;
    }

    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone.value)) {
        displayErrorMessage('phoneError', 'Veuillez entrer un numéro de téléphone valide.');
        return;
    }

    if (password.value.length < 6) {
        displayErrorMessage('passwordError', 'Le mot de passe doit contenir au moins 6 caractères.');
        return;
    }

    if (confirmPassword.value !== password.value) {
        displayErrorMessage('confirmPasswordError', 'Les mots de passe ne correspondent pas.');
        return;
    }

    document.getElementById('registrationForm').submit();
}







    
   function showFields() {
    var userType = document.getElementById('userType').value;
    var clientFields = document.getElementById('clientFields');
    var employeeFields = document.getElementById('employeeFields');
    var directorFields = document.getElementById('directorFields');

    if (userType === 'client') {
        clientFields.style.display = 'block';
        employeeFields.style.display = 'none';
        directorFields.style.display = 'none';
    } else if (userType === 'employe') {
        clientFields.style.display = 'none';
        employeeFields.style.display = 'block';
        directorFields.style.display = 'none';
    } else if (userType === 'directeur') {
        clientFields.style.display = 'none';
        employeeFields.style.display = 'none';
        directorFields.style.display = 'block';
    } else {
        // Masquer tous les champs si le type d'utilisateur est inconnu ou non spécifié
        clientFields.style.display = 'none';
        employeeFields.style.display = 'none';
        directorFields.style.display = 'none';
    }
}


    document.getElementById('registrationForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Récupérer les valeurs du formulaire
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var userType = document.getElementById('userType').value;

        // Récupérer les valeurs spécifiques au type d'utilisateur
        var clientPreference = document.getElementById('clientPreference').value;
        var employeePosition = document.getElementById('employeePosition').value;
        var directorResponsibilities = document.getElementById('directorResponsibilities').value;
        // Ajoutez d'autres récupérations de valeurs pour d'autres types d'utilisateurs si nécessaire

        // // Vous pouvez utiliser ces valeurs comme nécessaire, par exemple, les envoyer à un serveur
        // console.log('Prénom:', firstName);
        // console.log('Nom:', lastName);
        // console.log('E-mail:', email);
        // console.log('Téléphone:', phone);
        // console.log('Type d\'utilisateur:', userType);

        // // Utilisez les valeurs spécifiques au type d'utilisateur comme nécessaire
        // console.log('Préférences du client:', clientPreference);
        // console.log('Poste de l\'employé:', employeePosition);
        // console.log('Responsabilités du directeur:', directorResponsibilities);
        // Ajoutez d'autres utilisations de valeurs spécifiques au type d'utilisateur si nécessaire

        validateForm();
    });