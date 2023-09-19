
<?PHP
require_once "../functions/autoload.php";

$prenda = (new Prenda())->lista_completa();
$temporada = (new Temporada())->lista_completa();
$material = (new Material())->lista_completa();
$marca = (new Marca())->lista_completa();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar Producto</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_producto_acc.php" method="POST" enctype="multipart/form-data">
                <!-- <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" name="id">
                </div> -->

                <div class="col-md-4 mb-3">
					<label for="prenda_id" class="form-label">Prenda</label>
					<select class="form-select" name="prenda_id" id="prenda_id" required>
						<option value="" selected disabled>Tipo de Prenda</option>
						<?PHP foreach ($prenda as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getNombre() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-6 mb-3">
                    <label for="portada" class="form-label">Portada</label>
                    <input class="form-control" type="file" id="portada" name="portada">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="temporada" class="form-label">Temporada</label>
                    <input type="text" class="form-control" id="temporada" name="temporada">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="talle" class="form-label">Talles</label>
                    <input type="text" class="form-control" id="talle" name="talle">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Cargar</button>
                </div>
            </form>
        </div>
    </div>
</div>
