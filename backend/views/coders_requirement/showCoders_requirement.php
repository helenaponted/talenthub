<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Requerimientos Coder</title>

</head>
<body>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="px-6 py-3">Id coder</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Primer apellido</th>
                <th scope="col" class="px-6 py-3">Segundo apellido</th>
                <th scope="col" class="px-6 py-3">Nombre del requerimiento</th>
                <th scope="col" class="px-6 py-3">Estado</th>
                <th scope="col" class="px-6 py-3">Fecha de entrega</th>
            </tr>
        </thead>
        <tbody>
            <?php
            use App\Controllers\Coders_requirementController;
            require "./../../vendor/autoload.php";

            $id_coder = isset($_GET["id_coder"]) ? $_GET["id_coder"] : null;
            $id_requirement = isset($_GET["id_requirement"]) ? $_GET["id_requirement"] : null;
            $coders_requeriment = new Coders_requirementController;
            $results = $coders_requeriment->show($id_coder, $id_requirement);
            

            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name_coder'] . "</td>";
                echo "<td>" . $row['surname1'] . "</td>";
                echo "<td>" . $row['surname2'] . "</td>";
                echo "<td>" . ($row['name_requirement'] ?? '') . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";

            }

            ?>
            
        </tbody>
        </table>
        <br><br>
        <?php
    echo "<tr>";
    echo "<td>
                
                <a href='../coders/getAllCoders.php?" . $row["id"] . "'>
                <button type='button' class='text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700'>
                REGRESAR</button>
                </a>

                <a href='../coders/editCoder.php?id=" . $row["id"] . "'>
                <button type='button' class='text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700'>
                EDITAR CODER</button>
                </a>

                <a href='editCoders_requirement.php?id=" . $row["id"] . "'>
                <button type='button' class='text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700'>
                EDITAR REQUERIMIENTOS</button>
                </a>



                </td>";
                
                echo "</tr>";
                ?>


        
</body>
</html>
