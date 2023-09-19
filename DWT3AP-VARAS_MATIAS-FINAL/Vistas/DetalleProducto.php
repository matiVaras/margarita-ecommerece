<?php
$id = $_GET['id'] ?? FALSE;
$miObjetoProducto = new Producto();
$detalleProducto = $miObjetoProducto->producto_por_id(intval($id));
?>

<div class="row">

<?php if(isset($detalleProducto)){ ?>

    <div class="col p-5">
            <div>
                <div class="row m-0">
                    <div class="col-md-5">
                        <a href="img/<?= $detalleProducto->getPortada(); ?>" target="_blank">
                            <img src="img/<?= $detalleProducto->getPortada(); ?>" class="img-fluid rounded-start border-end bg-light" alt="Portada de <?= $detalleProducto->numeroId; ?>">
                        </a>
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0 fs-5">
                            <h2 class="card-title fs-1 mb-5"><?= $detalleProducto->getTitulo(); ?></h2>
                            <p class="card-text"><?= $detalleProducto->getDescripcion(); ?></p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fs-5"><span class="fw-bold">Marca:</span> <?= $detalleProducto->getMarca(); ?></li>
                            <li class="list-group-item fs-5"><span class="fw-bold">Talles:</span> <?= $detalleProducto->getTalle(); ?></li>
                            <li class="list-group-item fs-5"><span class="fw-bold">Temporada:</span> <?= $detalleProducto->getTemporada(); ?></li>
                            <li class="list-group-item fs-5"><span class="fw-bold">Material:</span> <?= $detalleProducto->getMaterial(); ?></li>
                        </ul>

                        <div class="card-body flex-grow-0 mt-auto">
                            <!-- precio -->
                            <div class="fs-3 mb-3 fw-bold text-center text-success">$<?= $detalleProducto->precio_formateado(); ?></div>
                            <form action="admin/actions/add_item_carrito.php" method="GET" class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <label for="q" class="fw-bold me-2">Cantidad: </label>
                                    <input type="number" class="form-control" value="1" name="cantidad" id="cantidad">
                                </div>
                                <div class="col-6">
                                    <!-- comprar -->
                                    <button class="btn btn-success w-100 fs-5 rounded-bottom-4 rounded-top-0" type="submit">
                                        <h5>Agregar al carrito<i class="fa-solid fa-cart-shopping fa-beat fa-xl"></i></h5>
                                    </button>
                                    <input type="hidden" value="<?= $id ?>" name="id" id="id">
                                    <!-- <input type="submit" value="COMPRAR" class="btn btn-success w-100 fs-5 rounded-bottom-4 rounded-top-0">
                                    <input type="hidden" value="<?= $id ?>" name="id" id="id"> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>

<?php } ?>

</div>