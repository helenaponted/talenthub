<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="getAllCoders.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>CODERS</title>
</head>
<body>
<div class="button-coders">
    <h1>Listado de Coders</h1>
    <a href="./RPaddCoder.php">
        <button  class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear nuevo coder</button>
    </a>
</div>
    <div id="table" class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    Acciones
                </th> 
                
            </tr>
        </thead>
        <tbody>
            <?php 

            use App\Controllers\CodersController;
            require "./../../vendor/autoload.php";

            $codersController = new CodersController;

            $bootcampMap = [
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
                    <a href='editCoder.php?id=" . $row["id"] . "'>
                        <button type='button' class='text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700'>
                          EDITAR
                        </button>
                    </a>
                    
                    <a href='deleteCoder.php?id=" . $row["id"] . "'>
                        <button type='button' class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                        BORRAR
                        </button>
                    </a>
                </td>";

        echo "<td>";
        
            }

            ?>
        </tbody>
    </table>
    
</body>
</html>