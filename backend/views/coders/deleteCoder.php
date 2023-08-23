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
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
  <title>Borrar coders</title>
</head>

<body style="background-color:#FFA37F;">
  <div class= "flex justify-center">
    <div class="mt-10">
      <p><?php echo $message; ?></p>
      <a href="getAllCoders.php" >
      <div class="mt-5">  
      <button type="submit" name="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        VOLVER
                    </button>
      </div>
      <!-- <a href="getAllCoders.php" >Volver a la lista de roles</a> -->
    </div>
  </div>
</body>

</html>