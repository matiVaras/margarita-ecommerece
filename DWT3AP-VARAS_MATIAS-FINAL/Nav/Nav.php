

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?sec=Inicio">
                <img src="./img/logo-blanco.png" alt="logo MM" width='70'>Margarita Margarol
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fs-5" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=Inicio">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="dropdown-item" href="index.php?sec=TodosLosProductos">Todos</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="index.php?sec=Productos&numeroId=3">Abrigos</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="index.php?sec=Productos&numeroId=1">Remeras</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="index.php?sec=Productos&numeroId=2">Medias</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=Formulario">Contacto</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=Alumno">
                            Yo
                            <!-- <i class="fa-solid fa-ellipsis-vertical fa-beat fa-xl"></i> -->
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link btn" href="index.php?sec=carrito">
                            <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        </a>
                    </li>
                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link btn" href="index.php?sec=login">
                            <i class="fa-solid fa-user fa-xl"></i>
                        </a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link btn" href="admin/actions/auth_logout.php" role="button">
                            <i class="fa-solid fa-right-from-bracket fa-xl"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
