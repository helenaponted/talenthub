<?php
use App\Controllers\RequirementController;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"]; 
   
    
    $delete = new RequirementController;
    $delete->delete([$id]); 
    $message = "El registro se ha eliminado correctamente";
    
   
} else {
    $message = "Ha habido un error al eliminar el registro";
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrar requerimientos</title>
</head>

<body>
  <div>
    <div>
      
      <p><?php echo $message; ?></p>
      <a href="/Proyecto%207/talenthub/backend/views/requirement/indexRequirement.php" >Volver a la lista de requisitos</a>
    </div>
  </div>
</body>

</html>