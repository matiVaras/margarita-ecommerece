<?PHP
$id = $_GET['id'] ?? FALSE;
$producto = (new Producto())->producto_por_id($id);
?>
<div class="row my-5 g-3">
	<h1 class="text-center mb-5 text-danger fw-bold">Eliminar Producto de la Base de Datos</h1>
	<div class="col-12 col-md-6">
        <img src="../IMG/<?= $producto->getPortada() ?>" width="300" alt="Imágen Illustrativa de <?= $producto->getTitulo() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
    </div>
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-6">
                <h2 class="fs-6">Título</h2>
                <p><?= $producto->getTitulo() ?></p>
            </div>
            <div class="col-6">
                <h2 class="fs-6">ID</h2>
                <p><?= $producto->getId() ?></p>
            </div>
            <div class="col-12">
                <h2 class="fs-6">Descripción</h2>
                <p><?= $producto->getDescripcion() ?></p>
            </div>
            <div class="col-12">
                <h2 class="fs-6">Temporada</h2>
                <p><?= $producto->getTemporada() ?></p>
            </div>
            <div class="col-12">
                <h2 class="fs-6">Talle</h2>
                <p><?= $producto->getTalle() ?></p>
            </div>
            <div class="col-6">
                <h2 class="fs-6">Precio</h2>
                <p>$ <?= $producto->getPrecio() ?></p>
            </div>
            <div class="col-12">
                <a href="actions/delete_producto_acc.php?id=<?= $producto->getId() ?>" role="button" class="btn btn-danger w-100 fs-5 rounded-bottom-4 rounded-top-0">Eliminar</a>
            </div>
        </div>
    </div>
</div>