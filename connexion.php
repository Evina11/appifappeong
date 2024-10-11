<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #434771;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #eef1ff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 30px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Connexion reservée à l'administrateur</h2>
    <form id="loginForm">
        <div class="form-group">
            <label for="username">Nom Admin</label>
            <input type="text" id="username" name="username" required>
            <div class="error" id="usernameError"></div>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
            <div class="error" id="passwordError"></div>
        </div>
        <button type="submit">Administrer</button>
    </form>
    <p><a href="index.php"> Retour à l'accueil</a></p>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.toggle-password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            passwordToggle.textContent = '👁️';
        }
    }

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire pour la validation
        let valid = true;
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Réinitialiser les messages d'erreur
        document.getElementById('usernameError').textContent = '';
        document.getElementById('passwordError').textContent = '';

        // Validation simple
        if (username === '') {
            document.getElementById('usernameError').textContent = 'Veuillez entrer votre nom d\'utilisateur.';
            valid = false;
        }
        if (password === '') {
            document.getElementById('passwordError').textContent = 'Veuillez entrer votre mot de passe.';
            valid = false;
        }

        // Vérification des identifiants
        if (valid && username === 'evina' && password === 'eagOngAfr9/q3#') {
            window.location.href = 'admin.php'; // Redirection vers admin.php
        } else if (valid) {
            alert('Nom d\'utilisateur ou mot de passe incorrect.'); // Message d'erreur
        }
    });
</script>

</body>
</html>