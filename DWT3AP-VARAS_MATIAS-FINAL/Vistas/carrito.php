<?php

$items = (new Carrito())->get_carrito();

?>

<h1 class="text-center fs-2 my-5">Carrito de Compras</h1>

<div class="container my-4">
    <?php if (count($items)) { ?>
        <form action="admin/actions/update_items_acc.php" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="15%">Portada</th>
                            <th scope="col">Datos del producto</th>
                            <th scope="col" width="15%">Cantidad</th>
                            <th class="text-end" scope="col" width="15%">Precio Unitario</th>
                            <th class="text-end" scope="col" width="15%">Subtotal</th>
                            <th class="text-end" scope="col" width="10%">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $key => $item) { ?>
                            <tr>
                                <td><img src="IMG/<?= $item['portada'] ?>" alt="Imágen Illustrativa de <?= $item['titulo'] ?>" class="img-fluid rounded shadow-sm"></td>

                                <td class="align-middle">
                                    <h2 class="h5"><?= $item['titulo'] ?></h2>
                                    <p><?= $item['descripcion'] ?></p>
                                </td>
                                <td class="align-middle">
                                    <label for="q_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" class="form-control" value="<?= $item['cantidad'] ?>" id="cantidad_<?= $key ?>" name="cantidad[<?= $key ?>]">
                                </td>
                                <td class="text-end align-middle">
                                    <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                                </td>
                                <td class="text-end align-middle">
                                    <p class="h5 py-3">$<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                                </td>
                                <td class="text-end align-middle">
                                    <a href="admin/actions/remove_item_acc.php?id=<?= $key ?>" role="button" class="btn text-danger">
                                        <i data-fa-symbol="delete" class="fa-solid fa-trash fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" class="text-end">
                                <h2 class="h5 py-3">Total:</h2>
                            </td>
                            <td class="text-end">
                                <p class="h5 py-3">$<?= number_format((new Carrito())->get_total(), 2, ",", ".") ?></p>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="index.php?sec=TodosLosProductos" role="button" class="btn btn-outline-dark">Seguir comprando</a>
                <a href="admin/actions/borrar_carrito_acc.php" role="button" class="btn btn-outline-dark">Vaciar Carrito</a>
                <a href="index.php?sec=Formulario" role="button" class="btn btn-success">Finalizar Compra</a>
            </div>
        </form>
    <?php } else { ?>
        <h2 class="text-center mb-5 text-danger p-3">
            <img src="./IMG/carritovacio.png" width="300" alt="">Vacío
        </h2>
    <?php } ?>
<!-- <a href="admin/actions/borrar_carrito_acc.php" role="button" class="btn btn-danger">Vaciar Carrito</a> -->
</div>
