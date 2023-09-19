<?PHP
require_once "functions/autoload.php";


// $seccion = $_GET['sec'] ?? "Inicio";

// title
$secciones_validas = [
    "Inicio" => [
        "titulo" => "Inicio | MM",
    ],
    "TodosLosProductos" => [
        "titulo" => "Indumentaria Masculina | MM",
    ],
    "Productos" => [
        "titulo" => "Nuestro catálogo | MM",
    ],
    "Formulario" => [
        "titulo" => "Contactanos | MM",
    ],
    "Nosotros" => [
        "titulo" => "Nuestra Historia | MM",
    ],
    "detalleProducto" => [
        "titulo" => "Detalle de producto | MM",
    ],
    "Alumno" => [
        "titulo" => "Datos del Alumno | MM"
    ],
    "login" => [
        "titulo" => "Login | MM" 
    ],
    "carrito" => [
        "titulo" => "Carrito | MM" 
    ]
];

$seccion = $_GET['sec'] ?? "Inicio";

$userData = $_SESSION["loggedIn"] ?? FALSE;
if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "404";
    $titulo = "404 - Página no encontrada";
} else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}
//$miTituloSeccionBonito = ucfirst(str_replace("_", " ", $vista));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords(str_replace("_", " ", $titulo))  ?></title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- JS de jQuery (requerido por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JS de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="./CSS/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php require_once "./Nav/Nav.php" ?>
    <main class="container">
        <?PHP
            require file_exists("Vistas/$vista.php") ? "Vistas/$vista.php" : "Vistas/404.php"
        ?>
    </main>
    <footer class="bg-secondary text-light text-center">
        <a href="https://drive.google.com/file/d/1tjH59lBogGgAcrmZ3B4aZhydWkvV5P9T/view" target="_blank">
            <p>&copy 2023 | Matias Varas DWT3AP | Programacón 2 | FINAL</p>
        </a>
    </footer>
</body>
</html>