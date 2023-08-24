<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
    <style>
       
    </style>
    <title>Tu Proyecto - Landing Page</title>
</head>

<body class="font-sans flex justify-center items-center h-screen index">

    
     <div class="w-1/2 p-8">
        <div class="logo-container mb-4 bg-white">
            <img src="./../src/assets/logo-no-background.png" alt="LogoTalentHub" class="w-24">
            <img src="./../src/assets/logo-factoria.png" alt="LogoFactoría" class="w-24 m-2">
            </div>
            <h1>#RompemosLosCódigos</h1>
            <h3>Somos la ​primera red de escuelas digitales solidarias, inclusivas y gratuitas en España.
Formamos a personas en situación de vulnerabilidad en las competencias más demandadas por las empresas del sector tecnológico combatiendo la brecha digital de género.</h3>
        </div>
    <div class="flex w-auto max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
       
        
        <div class="w-auto bg-white p-8 flex flex-col justify-center items-center">
            <div class="bg-white rounded-lg shadow p-6 mb-6 w-full">
                <h4>¡Sí, programar es para ti!</h4>
                <p class="text-gray-600 mb-4">¿Quieres aprender? Inscríbete y aprendamos juntas</p>
                <a href="./../backend/views/coders/addCoder.php">
                <button class="form-button">
                    Quiero probar
                </button>
                </a>
                
            </div>
            <div class="bg-white rounded-lg shadow p-6 w-full">
    <h4>¿Tienes una cuenta? Accede aquí</h4>
    <form class="form-container">
        <label for="email" class="block text-sm text-gray-600 mb-2">Correo Electrónico</label>
        <input type="email" id="email" name="email" class="w-full border rounded-lg py-2 px-3 mb-4">

        <label for="password" class="block text-sm text-gray-600 mb-2">Contraseña</label>
        <input type="password" id="password" name="password" class="w-full border rounded-lg py-2 px-3 mb-4">

        <a href="./../backend/views/landingPage/LandingPage.php" class="form-button">
            Iniciar Sesión
        </a>
    </form>
</div>
        </div>
    </div>
</body>
</html>