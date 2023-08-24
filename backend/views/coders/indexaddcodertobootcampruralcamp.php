<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="getAllCoders.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="./addCoder.css">
    <title>CODERS</title>
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
          <li><a href="./../bootcamp/RPaddBootcamp.php" class="block px-4 py-2 text-gray-500 hover:text-orange-500"><i class="fa-solid fa-plus mr-2"></i>Añadir bootcamp</a></li>
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
<main class="h-full ml-14 mt-14 mb-10 md:ml-56 p-8  sm:10">

    <div class="button-coders">
        <h1>Listado de Coders</h1>
        <a href="./RPaddCoder.php">
            <button class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear nuevo coder</button>
        </a>
    </div>
    <div id="table" class="relative overflow-x-auto">
        <form method="post" action="addCoderToBootcampruralcamp.php">
            <table id="codersTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre del coder
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido 1
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido 2
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th> 
                        <th scope="col" class="px-6 py-3">
                            Bootcamp
                        </th> 
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th> 
                       
                        <th scope="col" class="px-6 py-3">
                            Seleccionar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    use App\Controllers\CodersController;
                    require "./../../vendor/autoload.php";

                    $codersController = new CodersController;

                    

                    $bootcampMap = [
                      0=> 'NO ASIGNADO',
                        1=> 'SIN DEFINIR',
                        2 => 'FEMCODERS',
                        3 => 'DIGITAL ACADEMY',
                        4 => 'UNIQUE',
                        5 => 'RURAL CAMP'
                    ];

                    $rolMap = [
                        0 =>'SIN DEFINIR',
                        1 =>'RP',
                        2 => 'FORMADORA',
                        3 => 'CODER ASPIRANTE',
                        4 => 'CODER ADMITIDO',
                        5 => 'CODER EN RESERVA',
                        6 => 'EXCODER',
                        7 => 'EXCLUIDO'
                    ];
                    $result = $codersController -> getAll();

                    foreach ($result as $row){
                        echo "<tr>";
                        echo "<td>" .$row["name_coder"] . "</td>";
                        echo "<td>" .$row["surname1"] . "</td>";
                        echo "<td>" .$row["surname2"] . "</td>";
                        echo "<td>" .$row["email"] . "</td>";
                        echo "<td>" .$row["phone"] . "</td>";
                        echo "<td>" .$bootcampMap [$row["id_bootcamp"]] . "</td>";
                        echo "<td>" .$rolMap [$row["id_rol"]] . "</td>";
                        echo "<td>
                            <input type='checkbox' name='selectedCoders[]' value='" . $row["id"] . "'>
                            
                        </td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="form-button">Añadir coder al bootcamp</button>
        </form>
   
</div>
      

                  </main>
                  
   <script>
    $(document).ready(function() {
  $('#codersTable').DataTable();
});

</script>  
</body>
</html>