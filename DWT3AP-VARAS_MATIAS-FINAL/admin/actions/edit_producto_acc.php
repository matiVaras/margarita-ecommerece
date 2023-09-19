<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;

try {

    $producto = new Producto();
    
    if (!empty($fileData['tmp_name'])) {
 
        if(!empty($postData['imagen_og'])){ 
            (new Imagen())->borrarImagen(__DIR__ . "/../../IMG/" . $postData['imagen_og']);
        }
        $portada = (new Imagen())->subirImagen(__DIR__ . "/../../IMG", $fileData);
        $producto->reemplazar_portada($portada, $id);
    }

    $producto->edit($postData['titulo'], $postData['descripcion'], $postData['precio'], $id);
    header('Location: ../index.php?sec=admin_productos');
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo editar el producto");
}
