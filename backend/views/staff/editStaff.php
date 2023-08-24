<?php
use App\Controllers\StaffController;
require "./../../vendor/autoload.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newNameStaff = $_POST['name_staff'];
    $newSurname1 = $_POST['surname1'];
    $newSurname2 = $_POST['surname2'];
    $newEmail = $_POST["email"];
    $newId_rol = $_POST["id_rol"];
    $newId_bootcamp = $_POST["id_bootcamp"];

    $data = [
      
        'name_staff' => $newNameStaff,
        'surname1' => $newSurname1,
        'surname2' => $newSurname2,
        'email' => $newEmail,
        'id_rol' => $newId_rol,
        'id_bootcamp' => $newId_bootcamp
    ];


    
} else {
    $id = $_GET["id"];
    $staffController = new StaffController();
    $staffData = $staffController->show($id);
    $newNameStaff = $staffData['name_staff'];
    $newSurname1 = $staffData['surname1'];
    $newSurname2 = $staffData['surname2'];
    $newEmail = $staffData['email'];
    $newId_rol = $staffData['id_rol'];
    $newId_bootcamp = $staffData['id_bootcamp'];
  
}
?>


<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de nuevo Bootcamp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="./../coders/addCoder.css">
    

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
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">FemCoders Barcelona</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Unique</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Rural Camp</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Digital Academy</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500"><i class="fa-solid fa-plus mr-2"></i>Añadir bootcamp</a></li>
        </ul>
      </li>
      <li>
        <a href="./getAllCoders.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-users mr-2"></i>
          <span class="text-sm font-medium">Todos los coders</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
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
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Formadoras</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Coformadoras</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Responsables Proyecto</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Ver todo el staff</a></li>
        </ul>
      </li>
    </ul>
    <div class="px-4 py-2 mt-auto">
      <div class="flex items-center space-x-2 config">
        <a href="#" class="text-gray-500 hover:text-orange-500">
          <i class="fas fa-cog text-lg"></i>
        </a>
        <a href="#" class="text-gray-500 hover:text-orange-500">
          <i class="fas fa-sign-out-alt text-lg"></i>
        </a>
      </div>
    </div>
  </aside>
  <main class="h-full ml-14 mt-14 mb-10 md:ml-56 p-8  sm:10">
    <h2 class="text-2xl font-semibold mb-4">Edición Staff</h2>
        <form action="./editStaff.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
<input type="hidden" name="id_bootcamp" value="<?= $newId_bootcamp ?>">

            <label for="name_staff" class="block font-semibold">Nombre</label>
            <input type="text" name="name_staff" class="form-input" value="<?= $newNameStaff ?>"required>

            <label for="surname1" class="block font-semibold">Apellido 1</label>
            <input type="text" name="surname1" class="form-input" value="<?= $newSurname1 ?>" required>

            <label for="surname2" class="block font-semibold">Apellido 2</label>
            <input type="text" name="surname2" class="form-input" value="<?= $newSurname2 ?>"required>

            <label for="email" class="block font-semibold">Email</label>
            <input type="text" name="email" class="form-input" value="<?= $newEmail ?>"required>

            <label for="id_rol" class="block font-semibold">Rol</label>
            <select name="id_rol" class="form-select" value="<?= $newId_rol ?>">
                <option value="">-- Selecciona Rol --</option>
                <option value=0>sin definir</option>
                <option value=1>RP</option>
                <option value=2>FORMADORA</option>
                <option value=8>CO-FORMADORA</option>           
            </select>
            <label for="id_bootcamp" class="block font-semibold">Bootcamp</label>
            <select name="id_bootcamp" class="form-select" value="<?= $newId_bootcamp ?>">
                <option value="">-- Selecciona BootCamp--</option>
                <option value=1>SIN DEFINIR</option>
                <option value=2>FEMCODERS NORTE</option>
                <option value=3>DIGITAL ACADEMY</option>
                <option value=4>UNIQUE</option>
                <option value=5>RURAL CAMP</option>           
            </select>


            <div class="text-center mt-6">
                <a href="./indexStaff.php">
                <button type="submit" name="submit" class="form-button">Actualizar Staff</button>
                </a>
            </div>
        </form>
    </div>

    <footer class="bg-transparent dark:bg-gray-900 w-9/12 md:w-4/6  sm:w-2/3 fixed bottom-0">
    <div class="footerContainer px-6 py-8 mx-auto">
        <div class="flex flex-col items-center text-center">
            <a href="#">
                <img class="w-auto h-7" src="./../../../public/LogoF5Footer.png" alt="">
            </a>
            <p class="max-w-md mx-auto mt-4 text-gray-500 dark:text-gray-400">TalentHub</p>
            
        </div>
        <hr class="my-10 border-gray-200 dark:border-gray-700" />
        <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <p class="text-sm text-gray-500">© Copyright 2023. All Rights Reserved.</p>
            <div class="flex mt-3 -mx-2 sm:mt-0">
                <a href="#" class="mx-2 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-500 dark:hover:text-gray-300" aria-label="Reddit"> Teams </a>
                <a href="#" class="mx-2 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-500 dark:hover:text-gray-300" aria-label="Reddit"> Privacy </a>
                <a href="#" class="mx-2 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-500 dark:hover:text-gray-300" aria-label="Reddit"> Cookies </a>
            </div>
        </div>
    </div>
</footer>
    
  </main>
 </body>
</html>


