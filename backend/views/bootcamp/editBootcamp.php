<?php

use App\Controllers\BootcampController;
require "./../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newNameBootcamp = $_POST['name_bootcamp'];
    $newStart = $_POST['start'];
    $newEnd = $_POST['end'];
    $newRemote = $_POST["remote"];
    $data = [
        'name_bootcamp' =>  $newNameBootcamp,
        'start' =>  $newStart,
        'end' => $newEnd,
        'remote' => $newRemote,
        
    ];
    $edit = new BootcampController;
    $edit->edit($id, $data);
    header("Location: indexBootcamp.php");
    exit();
} else {
    $id = $_GET["id"];
    $bootcampController = new BootcampController();
    $bootcampData = $bootcampController->show($id);
    $newNameBootcamp = $bootcampData['name_bootcamp'];
    $start = $startData['start'];
    $end = $endData['end'];
    $remote = $remoteData['remote'];
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="./../coders/addCoder.css">
    <title>Editar bootcamp</title>
    <link rel="stylesheet" href="./bootcamp.css">
</head>
<body>
<aside class="w-56 bg-white h-screen fixed top-0 left-0 bottom-0 overflow-hidden border-r shadow-md">
    <div class="logo-navbar flex items-center justify-center h-20 shadow-md mt-6 bg-secondary">
      <img src="./../../../src/assets/logo-color.svg" alt="LogoTalenthub" />
      
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
          <li><a href="./../coders/indexFemCodersNorte.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">FemCoders Norte</a></li>
          <li><a href="./../coders/indexUniqueCoders.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Unique</a></li>
          <li><a href="./../coders/indexRuralCoders.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Rural Camp</a></li>
          <li><a href="./../coders/indexDigitalCoders.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Digital Academy</a></li>
          <li><a href="#" class="block px-4 py-2 text-gray-500 hover:text-orange-500"><i class="fa-solid fa-plus mr-2"></i>Añadir bootcamp</a></li>
        </ul>
      </li>
      <li>
        <a href="./../coders/getAllCoders.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-users mr-2"></i>
          <span class="text-sm font-medium">Todos los coders</span>
        </a>
      </li>
      <li>
        <a href="./../coders/getReserveCoders.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
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
    <h2 class="text-2xl font-semibold mb-4">Editar Bootcamp</h2>
    <form action="editBootcamp.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $id ?>">
            <label class="block font-semibold" for="name">Nombre</label>
            <input type="text" class="form-input" name="name_bootcamp"  value="<?= $newNameBootcamp ?>">
            <label class="block font-semibold" for="start">Empieza</label>
            <input type="date" class="form-input" name="start" value="<?= $newStart ?>">
            <label class="block font-semibold" for="end">Acaba</label>
            <input type="date" class="form-input" name="end" value="<?= $newEnd ?>">
            <label for="remote" class="block font-semibold">¿Es Remoto?</label>
            <select name="remote" class="form-select" value="<?= $newRemote ?>">
                <option value="">-- Selecciona --</option>
                <option value=0>sin definir</option>
                <option value=1>REMOTO</option>
                <option value=2>PRESENCIAL</option>       
            </select>
            <div class="flex justify-center">
             <input type="submit" class="bg-secondary text-white py-2 px-4 mt-2 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out" name="submit" value="Actualizar">
            </div>
        </fieldset>
    </form>
    <a class="subtitulo mt-2" href="./indexBootcamp.php"> 
        Volver a la lista
    </a>
</div>
    
</body>
</html>