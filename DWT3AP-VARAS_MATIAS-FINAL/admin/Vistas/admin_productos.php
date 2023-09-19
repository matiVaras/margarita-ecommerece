<?php
$prendas = (new Producto())->traer_catalogo_completo();
?>

<div class="container my-5">
    <h1 class="text-center mb-5 fw-bold">Administración de Inventario</h1>
    <div class="row">
        <div class="col">
            <div class="table-responsive"> <!-- Agregamos la clase "table-responsive" para que la tabla sea responsiva en dispositivos pequeños -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ID</th>
                            <th scope="col" width="15%">Portada</th>
                            <th scope="col">Título</th>
                            <th scope="col" width="10%">Descripción</th>
                            <th scope="col">Temporada</th>
                            <th scope="col">Talles</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prendas as $P) { ?>
                            <tr>
                                <td><?= $P->getId()?></td>
                                <td><img src="../IMG/<?= $P->getPortada() ?>" width="200" alt="Imágen Illustrativa de <?= $P->getTitulo() ?>" class="img-fluid rounded shadow-sm"></td>
                                <td><?= $P->getTitulo() ?></td>
                                <td><?= $P->getDescripcion()?></td>
                                <td><?= $P->getTemporada()?></td>
                                <td><?= $P->getTalle() ?></td>
                                <td>$ <?= $P->getPrecio() ?></td>
                                <td>
                                    <a href="index.php?sec=edit_producto&id=<?= $P->getId() ?>" role="button" class="btn text-secondary">
                                        <i data-fa-symbol="edit" class="fa-solid fa-pencil fa-2x"></i>
                                    </a>
                                    <a href="index.php?sec=delete_producto&id=<?= $P->getId() ?>" role="button" class="btn text-danger">
                                        <i data-fa-symbol="delete" class="fa-solid fa-trash fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center"> <!-- Centramos el botón horizontalmente -->
        <div class="col-6 text-center pt-3"> <!-- Utilizamos una columna de ancho 6 para centrar el botón -->
            <a href="index.php?sec=add_producto" class="text-center">
                <i class="fa-solid fa-circle-plus fa-5x"></i>
            </a>
        </div>
    </div>
</div>

