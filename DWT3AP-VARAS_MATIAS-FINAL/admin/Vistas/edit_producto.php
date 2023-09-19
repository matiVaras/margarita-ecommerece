<?PHP 
$id = $_GET['id'] ?? FALSE;
$producto = (new Producto())->producto_por_id($id);

// $temporada = (new Temporada())->lista_completa();
// $personaj = (new Prenda())->lista_completa();
// $material = (new Material())->lista_completa();
// $marca = (new Marca())->lista_completa();
?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-1 fw-bold">Editar Producto</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/edit_producto_acc.php?id=<?= $producto->getId() ?>" method="POST" enctype="multipart/form-data">
			<div class="col-md-2 mb-3">
                    <label for="imagen" class="form-label">Imágen actual</label>
                    <img src="../IMG/<?= $producto->getPortada() ?>" alt="Imágen Illustrativa de <?= $producto->getTitulo() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_og" name="imagen_og" value="<?= $producto->getPortada() ?>">
                </div>
			
				<div class="col-md-4 mb-3 w-50">
                    <label for="portada" class="form-label">Nueva Imagen</label>
                    <input class="form-control" type="file" id="portada" name="portada">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $producto->getTitulo() ?>">
                </div>

				<div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $producto->getDescripcion() ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="temporada" class="form-label">Temporada</label>
                    <input type="text" class="form-control" id="temporada" name="temporada" value="<?= $producto->getTemporada() ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="talle" class="form-label">Talle</label>
                    <input type="none" class="form-control" id="talle" name="talle" value="<?= $producto->getTalle() ?>">
                </div>

				<div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="<?= $producto->getPrecio() ?>">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</div>
