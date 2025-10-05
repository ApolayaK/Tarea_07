<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - MiApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="mb-1">Registro de Usuario</h4>
            <p class="text-muted mb-4">Crea tu cuenta en MiApp</p>

            <form action="<?= base_url('/registro') ?>" method="post" enctype="multipart/form-data" autocomplete="off">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombres" id="nombres" required>
                <label for="nombres">Nombre completo</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nomusuario" id="nomusuario" required>
                <label for="nomusuario">Nombre de usuario</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="claveacceso" name="claveacceso" required>
                <label for="claveacceso">Contraseña</label>
              </div>

              <div class="mb-3">
                <label for="img_avatar" class="form-label">Avatar (opcional)</label>
                <input type="file" class="form-control" id="img_avatar" name="img_avatar" accept="image/*">
                <small class="text-muted">Formatos: JPG, PNG, GIF</small>
              </div>

              <?php if (session()->getFlashdata('error_registro')): ?>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('error_registro') ?>
                </div>
              <?php endif; ?>

              <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Registrarse</button>
                <a href="<?= base_url('/login') ?>" class="btn btn-outline-secondary">Ya tengo cuenta</a>
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