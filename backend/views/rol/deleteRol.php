<?php
use App\Controllers\RolController;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"]; 
   
    
    $delete = new RolController;
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
  <title>Borrar roles</title>
</head>

<body>
  <div>
    <div>
      
      <p><?php echo $message; ?></p>
      <a href="/Proyecto%207/talenthub/backend/views/rol/indexRol.php" >Volver a la lista de roles</a>
    </div>
  </div>
</body>

</html>