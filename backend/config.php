

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de nuevo Bootcamp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./../../styles.css">
    <link rel="stylesheet" href="./../coders/addCoder.css">
</head>
<body>
    <aside class="w-56 bg-white h-screen fixed top-0 left-0 bottom-0 overflow-hidden border-r shadow-md">
        <!-- Sidebar content here... -->
    </aside>
    <main class="h-full ml-14 mt-14 mb-10 md:ml-56 p-8 sm:10">
        <h2 class="text-2xl font-semibold mb-4">Configuración</h2>
        <div class="grid grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-3">Formulario 1</h3>
                <form action="./addStaff.php" method="POST">
                    <!-- Form fields for the first card... -->
                </form>
                
            </div>


            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-3">Formulario 2</h3>
                <form action="./addStaff.php" method="POST">
                    <!-- Form fields for the second card... -->
                </form>
            </div>
        </div>
    </main>
</body>
</html>
