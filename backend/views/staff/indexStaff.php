<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["action"]) && $_GET["action"] === "list") {
        $staff = new StaffController;
        $Staffs = $staff->getAll();
        
    }

}
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="indexStaff.css">
</head>
<body>
    <h2 class="text-2xl font-semibold mb-4 text-secondary titulo">Lista del Staff</h2>
    <a href="addStaff.php">
        <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2">CREAR</button>
    </a>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">   
    <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Nombre</th>
            <th scope="col" class="px-6 py-3">Apellido 1</th>
            <th scope="col" class="px-6 py-3">Apellido 2</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">id_Rol</th>
            <th scope="col" class="px-6 py-3">id_Bootcamp</th>
           
        </tr>
       <?php 
       use App\Controllers\StaffController;
       require "./../../vendor/autoload.php";
       
        $staffList = new StaffController;
        $result = $staffList ->index();
            foreach ($result as $row) { ?>
                <tr>
                    <td scope="col" class="px-6 py-3"><?php echo $row['id']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['name_staff']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['surname1']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['surname2']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['email']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['id_rol']; ?></td>
                    <td scope="col" class="px-6 py-3"><?php echo $row['id_bootcamp']; ?></td>
                    <td>
                        
                        <a href="editStaff.php?id=<?php echo $row['id']; ?>" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-1 text-center mr-2 mb-2">Editar</a> 
                        <a href="deleteStaff.php?id=<?php echo $row['id']; ?>" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-1 text-center mr-2 mb-2">Eliminar</a> 
                    </td>  
                </tr>
               
        <?php } ?>
            </thead> 
    </table>

</body>
</html>