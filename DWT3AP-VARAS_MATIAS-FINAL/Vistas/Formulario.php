

<section class="row justify-content-center pb-5">
    <h1 class="text-center p-4">Formulario</h1>
            <div class="col-10 bg-light p-3">
                <form action="./Vistas/action.php" method="POST" target="_blank">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                                <label for="nombre" class="form-label">Nombre y Apellido:</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-md-4 col-lg ">
                            <div class="form-floating  mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required>
                                <label for="email" class="form-label">Email:</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea id="mensaje" class="form-control" name="mensaje" placeholder="Escribe tu mensaje" maxlength="300"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Enviar</button>
                </form>
            </div>
        </section>


