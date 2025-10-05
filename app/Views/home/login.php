<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MiApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="mb-1">Iniciar Sesión</h4>
                        <p class="text-muted mb-4">Acceso al sistema MiApp</p>

                        <?php if (session()->getFlashdata('exito_registro')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('exito_registro') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/login') ?>" method="post" autocomplete="off">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nomusuario" id="nomusuario" required>
                                <label for="nomusuario">Nombre de usuario</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="claveacceso" name="claveacceso"
                                    required>
                                <label for="claveacceso">Contraseña</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" role="switch" id="recordar"
                                    name="recordar">
                                <label for="recordar" class="form-check-label">Recordar contraseña</label>
                            </div>

                            <?php if (session()->getFlashdata('error_nomuser')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('error_nomuser') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error_password')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('error_password') ?>
                                </div>
                            <?php endif; ?>

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                                <a href="<?= base_url('/registro') ?>" class="btn btn-outline-secondary">Crear cuenta
                                    nueva</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>