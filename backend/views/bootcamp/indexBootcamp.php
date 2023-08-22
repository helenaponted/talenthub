<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Talenthub</title>
</head>
<body>
    <h1 class="text-2xl font-semibold mb-4 text-secondary">Listado de Bootcamps</h1>
    <a href="./addBootcamp.php">
        <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2">Crear Bootcamp</button>
    </a>
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
            $result = $bootcampList->index();
            foreach ($result as $row) {
                echo "<tr>"; 
                echo "<td >" . $row["id"] . "</td>";
                echo "<td>" . $row["name_bootcamp"] . "</td>";
                echo "<td>" . $row["start"] . "</td>";
                echo "<td>" . $row["end"] . "</td>";
                echo "<td>" . $row["remote"] . "</td>";
                echo "<td>
                    <form action='editBootcamp.php' method='GET'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-1 text-center mr-2 mb-2'>Edit</button>
                    </form>
                </td>";
                echo "<td>
                    <form action='deleteBootcamp.php' method='GET'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-1 text-center mr-2 mb-2'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
