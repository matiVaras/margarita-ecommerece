<?PHP
require_once "../functions/autoload.php";

$session = isset($_SESSION['loggedIn']) ? '' : 'd-none';

$secciones_validas = [
    "Inicio" => [
        "titulo" => "Admin",
        "restringido" => TRUE
    ],
    "admin_productos" => [
        "titulo" => "Adeministrar Prendas",
        "restringido" => TRUE
    ],
    "add_producto" => [
        "titulo" => "Agregar Prenda",
        "restringido" => TRUE
    ],
    "edit_producto" => [
        "titulo" => "Editar Prenda",
        "restringido" => TRUE
    ],
    "delete_producto" => [
        "titulo" => "Eliminar datos Prenda",
        "restringido" => TRUE
    ],
    "login" => [
        "titulo" => "Iniciar sesión",
        "restringido" => FALSE
    ],
];

// null coalesce (??). Unicamente en PHP 7+
// Si una variable esta definida y no es NULL la asigna, 
// sino asginga la alternativa. Lo mismo pero mas conciso.
$seccion = $_GET['sec'] ?? "Inicio";

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "404";
    $titulo = "404 - Página no encontrada";
} else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
    if( $secciones_validas[$seccion]['restringido'] ){
        if( !isset($_SESSION['loggedIn'])){
            header('location: index.php?sec=login');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?> | MM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="../CSS/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?sec=Inicio">
                <img src="../IMG/logo-blanco.png" alt="logo MM" width='70'>Margarita Margarol
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fs-5" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item <?= $session ?>">
                        <a class="nav-link" href="index.php?sec=Inicio">Inicio</a>
                    </li>
                    <li class="nav-item <?= $session ?>">
                        <a class="nav-link" href="index.php?sec=admin_productos">Administración</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=login">Login</a>
                    </li>  -->
                    <li class="nav-item <?= $session ?>">
                        <a class="nav-link" href="actions/auth_logout.php">
                           <i class="fa-solid fa-right-from-bracket fa-xl"></i>
                        </a>
                    </li>     
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">

        <?PHP
            require file_exists("Vistas/$vista.php") ? "Vistas/$vista.php" : "Vistas/404.php";
        ?>

    </main>
    <footer class="bg-secondary text-light text-center">
        <a href="https://drive.google.com/file/d/1tjH59lBogGgAcrmZ3B4aZhydWkvV5P9T/view" target="_blank">
            <p>&copy 2023 | Matias Varas DWT3AP | Programacón 2 | FINAL</p>
        </a>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>