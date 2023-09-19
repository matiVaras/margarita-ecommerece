<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'];

echo "<pre>";
print_r($postData);
echo "</pre>";
//$portada = "";
try {
    
    $portada = (new Imagen())->subirImagen(__DIR__ . "/../../IMG", $fileData);
    (new Producto())->insert(
        $postData['titulo'],
        $postData['prenda_id'],
        1,
        1,
        1,
        $postData['talle'],
        $postData['descripcion'],
        $portada,
        $postData['precio'],
    );
    header('Location: ../index.php?sec=admin_productos');
   

} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo cargar el producto");
}
