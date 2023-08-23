<?php
      use App\Controllers\StaffController;
      require "./../../vendor/autoload.php"; 
      
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["action"]) && $_GET["action"] === "list") {
        $staff = new StaffController;
        $Staffs = $staff->show($id);
        
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de nuevo Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="./../coders/addCoder.css">
    <link rel="stylesheet" href="./indexStaff.css">
    

</head>
<body>
<div class="w-full relative flex ct-docs-disable-sidebar-content overflow-x-hidden">
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
        <a href="./../landingPage/LandingPageBootcamp.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-graduation-cap mr-2"></i>
          <span class="text-sm font-medium ">Bootcamps</span>
        </a>
        <ul class="sub-menu ml-12 mt-2 space-y-1 bg-white border-l border-t border-b">
          <li><a href="./../coders/indexFemCodersNorte.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">FemCoders Norte</a></li>
          <li><a href="./../coders/indexUniqueCoders.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Unique</a></li>
          <li><a href="./../coders/indexRuralCoders.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Rural Camp</a></li>
          <li><a href="./../coders/indexDigitalCoders.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Digital Academy</a></li>
          <li><a href="./../bootcamp/addBootcamp.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500"><i class="fa-solid fa-plus mr-2"></i>Añadir bootcamp</a></li>
        </ul>
      </li>
      <li>
        <a href="./../coders/getAllCoders.php" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
          <i class="fa-solid fa-users mr-2"></i>
          <span class="text-sm font-medium">Todos los coders</span>
        </a>
      </li>
      <li>
        <a href="./../coders/getReserveCoders" class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-orange-500 px-4 responsive-hidden">
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
          <li><a href="./../staff/indexTrainers" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Formadoras</a></li>
          <li><a href="./../staff/indexCoTrainers" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Coformadoras</a></li>
          <li><a href="./../staff/indexRP" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Responsables Proyecto</a></li>
          
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
  </div>
  <main class="ml-56 p-8">
  
    <h2 class="text-2xl font-semibold mb-4 text-secondary titulo">Lista del Staff</h2>
    <a href="./addStaff.php">
        <button  class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 buttonAddStaff">Crear nuevo staff</button>
    </a>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">   
    <tr>
        
            <th scope="col" class="px-6 py-3">Nombre</th>
            <th scope="col" class="px-6 py-3">Apellido 1</th>
            <th scope="col" class="px-6 py-3">Apellido 2</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Rol</th>
            <th scope="col" class="px-6 py-3">Bootcamp</th>
           
        </tr>
       <?php 
 
       
        $staffList = new StaffController;
        $result = $staffList ->index();
            foreach ($result as $row) { ?>
                <tr>
                    <td scope="col" class="px-6 py-3"><?php echo $row['name_staff']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['surname1']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['surname2']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['email']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['id_rol']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['id_bootcamp']; ?></td>
                    <td>
                        
                        <a href="editStaff.php?id=<?php echo $row['id']; ?>" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700font-medium rounded-lg text-sm px-3 py-1 text-center mr-2 mb-2">Editar</a> 
                        <a href="deleteStaff.php?id=<?php echo $row['id']; ?>" class="text-white text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-red-700 dark:border-red-700 font-medium rounded-lg text-sm px-3 py-1 text-center mr-2 mb-2">Eliminar</a> 
                    </td>  
                </tr>
               
        <?php } ?>
            </thead> 
    </table>
    </main>
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
</body>
</html>