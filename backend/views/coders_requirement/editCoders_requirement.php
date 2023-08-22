<?php

use App\Controllers\Coders_requirementController;
require "./../../vendor/autoload.php";

$id_coder = $_GET['id_coder'];

$editCoders_requirement = new Coders_requirementController;
$results = $editCoders_requirement->edit($id_coder);

$requirement = $results['requirement'];
$coder = $results['coder'];


$required_fields = ["name_requirement", "state", "date"];
$requirements_filtered = array_column($requirement, 'name_requirement');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar requisitos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="editCoders_requirement.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_coder; ?>">
        <div class="row">
    <div class="col">
        <label for="name_coder">Nombre</label>
        <input type="text" name="name_coder" id="name_coder" value="<?php echo isset($coder['name_coder']) ? $coder['name_coder'] : ''; ?>" readonly>
    </div>
    <div class="col">
        <label for="surname1">Apellido 1</label>
        <input type="text" name="surname1" id="surname1" value="<?php echo isset($coder['surname1']) ? $coder['surname1'] : ''; ?>" readonly>
    </div>
    <div class="col">
        <label for="surname2">Apellido 2</label>
        <input type="text" name="surname2" id="surname2" value="<?php echo isset($coder['surname2']) ? $coder['surname2'] : ''; ?>" readonly>
    </div>
</div>
        </div>
        <div class="row">
            <div class="col">
            <h3>Editar requisitos</h3>
    
                <table class="table">
                    <thead>
                        <tr>
                            <th>Requerimiento</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        foreach ($requirements_filtered as $requirement) {
            echo "<tr>";
            echo "<td>" . $requirement . "</td>";
            echo '<td>';
            echo '<select name="state[]" class="state-select">';
            echo '<option value="no entregado">No Entregado</option>';
            echo '<option value="entregado">Entregado</option>';
            echo '</select>';
            echo '</td>';
            echo '<td>';
            echo '<input type="date" name="date[]" class="date-input">';
            echo '</td>';
            echo "</tr>";
        }
                        
                        
                        ?>
    

                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="mt-4 flex justify-center">

        <a href="showCoders_requirement.php?id_coder=<?php echo $id_coder; ?>">
                <button type="button" class="...">REGRESAR</button>
            </a>
            <button type="submit">Guardar</button>
        </div>
    </form>
</body>

</html>
