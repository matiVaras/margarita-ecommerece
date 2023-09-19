<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$producto = (new Producto())->producto_por_id($id);

try {
    if(!empty($producto->getPortada())){
        (new Imagen())->borrarImagen(__DIR__ . "/../../IMG/" . $producto->getPortada());
    }
    $producto->delete();

    header('Location: ../index.php?sec=admin_productos');
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
   die("No se pudo eliminar el producto");

}

