<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil - MiApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url('/dashboard') ?>">MiApp</a>

      <div class="d-flex align-items-center">
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
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-person-badge"></i> Mi Perfil</h4>
          </div>
          <div class="card-body">

            <!-- Avatar actual -->
            <div class="text-center mb-4">
              <?php if ($usuario['img_avatar']): ?>
                <img src="<?= base_url($usuario['img_avatar']) ?>" alt="Avatar"
                  class="rounded-circle border border-3 border-primary" width="150" height="150">
              <?php else: ?>
                <i class="bi bi-person-circle text-secondary" style="font-size: 150px;"></i>
                <p class="text-muted mt-2">Sin avatar configurado</p>
              <?php endif; ?>
            </div>

            <!-- Información del usuario -->
            <div class="mb-4">
              <h5>Información</h5>
              <table class="table">
                <tr>
                  <th width="40%">Nombre completo:</th>
                  <td><?= $usuario['nombres'] ?></td>
                </tr>
                <tr>
                  <th>Nombre de usuario:</th>
                  <td><?= $usuario['nomusuario'] ?></td>
                </tr>
                <tr>
                  <th>Fecha de registro:</th>
                  <td><?= date('d/m/Y H:i', strtotime($usuario['create_at'])) ?></td>
                </tr>
              </table>
            </div>

            <!-- Formulario para actualizar avatar -->
            <div class="border-top pt-4">
              <h5 class="mb-3">
                <?= $usuario['img_avatar'] ? 'Cambiar Avatar' : 'Agregar Avatar' ?>
              </h5>

              <?php if (session()->getFlashdata('exito_avatar')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('exito_avatar') ?>
                </div>
              <?php endif; ?>

              <?php if (session()->getFlashdata('error_avatar')): ?>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('error_avatar') ?>
                </div>
              <?php endif; ?>

              <form action="<?= base_url('/perfil/actualizar-avatar') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="img_avatar" class="form-label">Seleccionar imagen</label>
                  <input type="file" class="form-control" id="img_avatar" name="img_avatar" accept="image/*" required>
                  <small class="text-muted">Formatos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-upload"></i> Subir Avatar
                  </button>
                  <a href="<?= base_url('/dashboard') ?>" class="btn btn-outline-secondary">
                    Volver al Dashboard
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>