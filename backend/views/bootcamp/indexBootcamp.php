<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="./../coders/addCoder.css">
    <title>Talenthub</title>
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
          <li><a href="./../staff/getTrainers.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Formadoras</a></li>
          <li><a href="./../staff/getCoformadora.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Coformadoras</a></li>
          <li><a href="./../staff/getRP.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Responsables Proyecto</a></li>
          <li><a href="./../staff/indexStaff.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500">Ver todo el staff</a></li>
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
  <div class="h-full ml-14 mt-14 mb-10 md:ml-64 sm:10"> 
    <h2 class="text-2xl font-semibold mb-4 text-secondary titulo">Listado de Bootcamps</h2>
    <a href="./addBootcamp.php">
        <button class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear Bootcamp</button>
    </a>
    <div id="table" class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Nombre del Bootcamp</th>
                <th scope="col" class="px-6 py-3">Empieza</th>
                <th scope="col" class="px-6 py-3">Acaba</th>
                <th scope="col" class="px-6 py-3">¿Es remoto?</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            use App\Controllers\BootcampController;
            require "./../../vendor/autoload.php";

            $bootcampList = new BootcampController;
            $remoteMap = [
              0=>'SIN DEFINIR',
              1 =>'REMOTO',
              2 => 'PRESENCIAL',
              ""=>""
           
          ];
            $result = $bootcampList->index();

            foreach ($result as $row) {
                echo "<tr>"; 
                echo "<td >" . $row["id"] . "</td>";
                echo "<td>" . $row["name_bootcamp"] . "</td>";
                echo "<td>" . $row["start"] . "</td>";
                echo "<td>" . $row["end"] . "</td>";
                echo "<td>" .$remoteMap [$row["remote"]] . "</td>";
                echo "<td>
                    <form action='editBootcamp.php' method='GET'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700'>Edit</button>
                    </form>
                </td>";
                echo "<td>
                    <form action='deleteBootcamp.php' method='GET'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
  </div>
</body>
</html>
