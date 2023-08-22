<?php
use App\Controllers\CodersController;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"]; 
   
    
    $delete = new CodersController;
    $delete->delete([$id]); 
    $message = "El coder se ha eliminado correctamente";
    
   
} else {
    $message = "Ha habido un error al eliminar el coder";
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrar coders</title>
</head>

<body>
  <div>
    <div>
      
      <p><?php echo $message; ?></p>
      <a href="getAllCoders.php" >Volver a la lista de roles</a>
    </div>
  </div>
</body>

</html>