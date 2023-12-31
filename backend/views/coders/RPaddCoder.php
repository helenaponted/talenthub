<?php
use App\Controllers\CodersController;
require_once __DIR__ . '/../../vendor/autoload.php';

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name_coder' => $_POST["name"],
        'surname1' => $_POST["surname1"],
        'surname2' => $_POST["surname2"],
        'email' => $_POST["email"],
        'phone' => $_POST["phone"],
        'city' => $_POST["city"],
        'id_rol' => $_POST["id_rol"],
        'id_bootcamp' => $_POST["id_bootcamp"],

    ];

    $coder = new CodersController;
    $coder->store($data);
    header("Location: getAllCoders.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de nuevo coder</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="addCoder.css">
    

</head>
<body>
<aside class="w-56 bg-white h-screen fixed top-0 left-0 bottom-0 overflow-hidden border-r shadow-md">
    <div class="logo flex items-center justify-center h-20 shadow-md mt-6 bg-secondary">
      <img src="./../../../src/assets/logo-color.svg" alt="Logo" />
    </div>
    <ul class="py-4">
      <li>
        <a href="./../landingPage/LandingPage.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-house mr-2"></i>
          <span class="text-sm font-medium ">Inicio</span>
        </a>
      </li>
      <li class="group has-submenu">
        <a href="./../bootcamp/indexBootcamp.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-graduation-cap mr-2"></i>
          <span class="text-sm font-medium ">Bootcamps</span>
        </a>
        <ul class="sub-menu ml-12 mt-2 space-y-1 bg-white border-l border-t border-b">
          <li><a href="./indexFemCodersNorte.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">FemCoders Norte</a></li>
          <li><a href="./indexUnique.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Unique</a></li>
          <li><a href="./indexRuralCamp.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Rural Camp</a></li>
          <li><a href="./indexDigitalAcademy.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Digital Academy</a></li>
          <li><a href="./../bootcamp/addBootcamp.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500"><i class="fa-solid fa-plus mr-2"></i>Añadir bootcamp</a></li>
        </ul>
      </li>
      <li>
        <a href="./getAllCoders.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-users mr-2"></i>
          <span class="text-sm font-medium">Todos los coders</span>
        </a>
      </li>
      <li>
        <a href="./getReserveCoders.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-regular fa-clock mr-2"></i>
          <span class="text-sm font-medium">Coders en reserva</span>
        </a>
      </li>
      <li class="group has-submenu">
        <a href="./../staff/indexStaff.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-clipboard mr-2"></i>
          <span class="text-sm font-medium">Staff</span>
        </a>
        <ul class="sub-menu ml-12 mt-2 space-y-1 bg-white border-l border-t border-b">
          <li><a href="./../staff/getTrainers.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Formadoras</a></li>
          <li><a href="./../staff/getCoformadora.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Coformadoras</a></li>
          <li><a href="./../staff/getRP.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Responsables Proyecto</a></li>
          
        </ul>
      </li>
    </ul>
    <div class="px-4 py-2 mt-auto">
      <div class="flex items-center space-x-2 config">
        <a href="./../../config.php" class="text-gray-500 hover:text-orange-500">
          <i class="fas fa-cog text-lg"></i>
        </a>
        <a href="./../../index.php" class="text-gray-500 hover:text-orange-500">
          <i class="fas fa-sign-out-alt text-lg"></i>
        </a>
      </div>
    </div>
  </aside>

  <main class="ml-56 p-8">
    <h2 class="text-2xl font-semibold mb-4">Alta de nuevo coder</h2>
        <form action="./rpaddCoder.php" method="POST">
            <label for="name" class="block font-semibold">Nombre</label>
            <input type="text" name="name" class="form-input" required>

            <label for="surname1" class="block font-semibold">Primer apellido</label>
            <input type="text" name="surname1" class="form-input" required>

            <label for="surname2" class="block font-semibold">Segundo apellido</label>
            <input type="text" name="surname2" class="form-input" required>

            <label for="email" class="block font-semibold">Correo Electrónico</label>
            <input type="email" name="email" class="form-input" required>

            <label for="phone" class="block font-semibold">Teléfono</label>
            <input type="tel" name="phone" class="form-input" required>

            <label for="city" class="block font-semibold">Ciudad</label>
            <input type="text" name="city" class="form-input" required>

            <label for="id_bootcamp" class="block font-semibold">Asignar Bootcamp</label>
            <select name="id_bootcamp" class="form-select">
                <option value="">-- Selecciona un Bootcamp --</option>
                <option value=1>SIN DEFINIR</option>
                <option value=2>FEMCODERS NORTE</option>
                <option value=3>DIGITAL ACADEMY</option>
                <option value=4>UNIQUE</option>
                <option value=5>RURAL CAMP</option>                
            </select>

            <label for="id_rol" class="block font-semibold">Asignar Estado</label>
            <select name="id_rol" class="form-select">
                <option value="">-- Selecciona un Estado --</option>
                <option value=3>ASPIRANTE</option>
                <option value=4>CODER</option>
                <option value=5>EN RESERVA</option>
                <option value=6>EXCODER</option>
                <option value=7>EXCLUIDO</option>
            </select>

            <div class="text-center mt-6">
                <button type="submit" name="submit" class="form-button">Registrar coder</button>
            </div>
        </form>
    </div>

    
    
  </main>
  
 

</body>
</html>