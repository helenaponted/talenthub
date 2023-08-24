<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Requerimientos Coder</title>
</head>

<body>
<form action="showCoders_requirement.php"  method="POST">
    <?php $id_coder = isset($_POST["id_coder"]) ? $_POST["id_coder"] : (isset($_GET["id_coder"]) ? $_GET["id_coder"] : null); ?>
    <input type="hidden" name="id_coder" value="<?php echo $id_coder; ?>">


        <div>
            <div class="row">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nombre del requerimiento</th>
                            <th scope="col" class="px-6 py-3">Estado</th>
                            <th scope="col" class="px-6 py-3">Fecha de entrega</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        use App\Controllers\Coders_requirementController;

                        require "./../../vendor/autoload.php";

                       // $id_coder = isset($_GET["id_coder"]) ? $_GET["id_coder"] : null;
                        $id_requirement = isset($_GET["id_requirement"]) ? $_GET["id_requirement"] : null;
                        $coders_requirement = new Coders_requirementController;
                        $results = $coders_requirement->show($id_coder, $id_requirement);


                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
                            $id_coder = $_POST["id_coder"]; 
                            $newStates = $_POST['state'];
                            $newDates = $_POST['date'];

                            foreach ($id_coder as $index => $single_id_coder) {
                                $single_id_requirement = $id_requirement[$index];
                                $newState = $newStates[$index];
                                $newDate = $newDates[$index];
                            
                                $data = [
                                    'state' => $newState,
                                    'date' => $newDate,
                                ];      
                            
                                $update = new Coders_requirementController();
                                $update->update($single_id_coder, $single_id_requirement, $data);
                            }

                            $id_coder_link = $_POST["id_coder"][0]; 
                            
                            //header('Location: showCoders_requirement.php?id_coder=' . $id_coder_link); <------ USA ESTE HEADER SI NECESITAS CARGAR LA MISMA VISTA
                            header('Location: ../coders/getAllCoders.php?id_coder=' . $id_coder);  //<------ USA ESTE HEADER SI NECESITAS REGRESAR A LA VISTA GENERAL DE LOS CODERS
                            exit();
                            

                        }

                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['name_requirement'] . "</td>";
                            echo "<td>";
                            echo "<select name='state[]' class='state-select'>";
                            echo "<option value='' " . ($row['state'] == '' ? "selected" : "") . ">...Seleccionar</option>";
                            echo "<option value='no aplica' " . ($row['state'] == 'no aplica' ? "selected" : "") . ">N/A</option>";
                            echo "<option value='entregado' " . ($row['state'] == 'entregado' ? "selected" : "") . ">Entregado</option>";
                            echo "<option value='no entregado' " . ($row['state'] == 'no entregado' ? "selected" : "") . ">No Entregado</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='date' name='date[]' class='date-input' value='" . str_replace(">", "&gt;", $row['date']) . "'>";
                            echo "<input type='hidden' name='id_coder[]' value='" . $row['id_coder'] . "'>";
                            echo "<input type='hidden' name='id_requirement[]' value='" . $row['id_requirement'] . "'>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <br><br>
        </div>
        <div>        
            <a href="../coders/getAllCoders.php?id_coder=<?php echo $id_coder; ?>" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">REGRESAR</a>
            <a href="../coders/editCoder.php?id=<?php echo $row['id']; ?>" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">EDITAR DATOS CODER</a>
            <input type="submit" name="update" value="GUARDAR REQUISITOS" href="showCoders_requirement.php?id_coder=<?php echo $row['id_coder']; ?>" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
        </div>
    </form>
</body>

</html>