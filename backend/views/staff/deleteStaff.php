<?php
use App\Controllers\StaffController;
require "./../../vendor/autoload.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $id=$_GET["id"]; 
    
    
        $delete = new StaffController;
        $delete->delete([$id]); 
        $message = "El registro se ha eliminado";
    
    
    } else {
        $message = "Error al eliminar el registro";
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrar Staff</title>
</head>

<body>
  <div>
    <div>

      <p><?php echo $message; ?></p>
      <a href="/talenthub/backend/views/staff/indexStaff.php" >Volver a la lista</a>
    </div>
  </div>
</body>

</html>