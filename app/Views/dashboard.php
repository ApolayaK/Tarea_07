<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MiApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/dashboard') ?>">MiApp</a>

            <div class="d-flex align-items-center">
                <!-- Avatar y nombre del usuario -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">

                        <?php if (session()->get('usuario_avatar')): ?>
                            <img src="<?= base_url(session()->get('usuario_avatar')) ?>" alt="Avatar" width="40" height="40"
                                class="rounded-circle me-2">
                        <?php else: ?>
                            <i class="bi bi-person-circle fs-2 me-2"></i>
                        <?php endif; ?>

                        <span><?= session()->get('usuario_nombre') ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="<?= base_url('/perfil') ?>">
                                <i class="bi bi-person"></i> Mi Perfil
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4">¡Bienvenido!</h1>
                        <p class="lead">Has iniciado sesión exitosamente</p>
                        <hr class="my-4">
                        <p>Usuario: <strong><?= session()->get('usuario_nomusuario') ?></strong></p>
                        <p>Nombre: <strong><?= session()->get('usuario_nombre') ?></strong></p>

                        <?php if (!session()->get('usuario_avatar')): ?>
                            <div class="alert alert-info mt-4" role="alert">
                                <i class="bi bi-info-circle"></i>
                                No tienes un avatar configurado.
                                <a href="<?= base_url('/perfil') ?>" class="alert-link">Agregar avatar</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>