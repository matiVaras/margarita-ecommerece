<?php
require_once "Clases/Conexion.php";
require_once "Clases/Producto.php";
require_once "Clases/Prenda.php";
require_once "Clases/Material.php";
require_once "Clases/Temporada.php";
require_once "Clases/Marca.php";
    $productoSeleccionado = isset($_GET['numeroId']) ? $_GET['numeroId'] : false;
    $catalogo = new Producto();
    $numeroId = $catalogo->traer_catalogo_completo($productoSeleccionado);
?>

<div class="container">
    <h1 class="text-center p-4">Indumentaria Masculina</h1>
    <div class="row">

        <?php if(count($numeroId)) { ?>
            <?php foreach ($numeroId as $detalleProducto) { ?>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <a href="index.php?sec=detalleProducto&id=<?= $detalleProducto->getId() ?>">
                        <div class="card mb-3">
                            <img src="img/<?= $detalleProducto->getPortada(); ?>" class="card-img-top" alt="Portada de <?= $detalleProducto->numeroId; ?>">
                            <div class="card-body">
                                <h2 class="card-title"><?= $detalleProducto->getTitulo(); ?></h2>
                                <p class="card-text"><?= $detalleProducto->descripcion(); ?></p>
                            </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><span class="fw-bold">Marca:</span> <?= $detalleProducto->getMarca(); ?></li>
                                <li class="list-group-item bg-transparent"><span class="fw-bold">Talles:</span> <?= $detalleProducto->getTalle(); ?></li>
                                <li class="list-group-item bg-transparent"><span class="fw-bold">Temporada:</span> <?= $detalleProducto->getTemporada(); ?></li>
                                <li class="list-group-item bg-transparent"><span class="fw-bold">Material:</span> <?= $detalleProducto->getMaterial(); ?></li>
                            </ul>

                            <div class="card-body">
                                <div class="fs-3 mb-3 fw-bold text-center text-success">
                                    <!-- precio producto -->
                                    $<?= $detalleProducto->precio_formateado() ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php } ?>
        <?php }?>

    </div>
</div>
