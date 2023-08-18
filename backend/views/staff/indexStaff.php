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
    <title>Staff List</title>
</head>
<body>
    <h2>Staff List</h2>
    <a href="./addStaff.php">
        <button>Crear Staff</button>
    </a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname 1</th>
            <th>Surname 2</th>
            <th>Email</th>
            <th>id_Rol</th>
            <th>id_Bootcamp</th>
           
        </tr>
       <?php 
       use App\Controllers\StaffController;
       require "./../../vendor/autoload.php";
       
        $staffList = new StaffController;
        $result = $staffList ->index();
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name_staff']; ?></td>
                    <td><?php echo $row['surname1']; ?></td>
                    <td><?php echo $row['surname2']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['id_rol']; ?></td>
                    <td><?php echo $row['id_bootcamp']; ?></td>
                    <td>
                        
                        <a href="editStaff.php?id=<?php echo $row['id']; ?>">Editar</a> <!-- Enlace para editar -->
                        <a href="deleteStaff.php?id=<?php echo $row['id']; ?>">Eliminar</a> <!-- Enlace para eliminar -->
                    </td>  
                </tr>
               
        <?php } ?>
    </table>

</body>
</html>