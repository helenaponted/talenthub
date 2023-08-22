<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
</head>
<body>
    <h1>Listado de roles</h1>
    <a href="./addRol.php">
        <button>Crear nuevo rol</button>
    </a>
    <table>
        <thead>
            <tr>
                
                <th>Nombre del Rol</th>
                <th>Tipo</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 

            use App\Controllers\RolController;
            require "./../../vendor/autoload.php";

            $rolList = new RolController;
            $result = $rolList ->index();
            foreach ($result as $row){
                echo "<tr>";
                
                echo "<td>" .$row["name_rol"] . "</td>";
                echo "<td>" .$row["type"] . "</td>";
                echo "<td>
                <div>
                    <a href='editRol.php?id=" . $row["id"] . "'>
                    <button>EDITAR</button>
                    </a>
                    
                    <a href='deleteRol.php?id=" . $row["id"] . "'>
                    <button>BORRAR</button>
                    </a>
                </div>
                </td>";

        echo "<td>";
    
        
            }

            ?>
        </tbody>
    </table>
</body>
</html>
