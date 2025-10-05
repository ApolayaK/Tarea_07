<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - MiApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .registro-card {
      animation: slideIn 0.5s ease-out;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .alert {
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(-10px);
      }

      75% {
        transform: translateX(10px);
      }
    }

    .btn-primary {
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-outline-secondary {
      transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
      transform: translateY(-2px);
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
    }

    .input-group-text {
      transition: all 0.3s ease;
    }

    .input-group-text:hover {
      color: #667eea;
    }

    .logo-container {
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .logo-icon {
      font-size: 4rem;
      color: #667eea;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.1);
      }
    }

    .avatar-preview {
      display: none;
      text-align: center;
      margin-top: 10px;
    }

    .avatar-preview img {
      border-radius: 50%;
      border: 3px solid #667eea;
      animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>
</head>

<body>

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card registro-card">
          <div class="card-body p-4">

            <!-- Logo -->
            <div class="logo-container">
              <i class="bi bi-person-plus-fill logo-icon"></i>
              <h4 class="mb-1 mt-2">Crear Cuenta Nueva</h4>
              <p class="text-muted">Únete a MiApp hoy</p>
            </div>

            <!-- Mensaje de error -->
            <?php if (session()->getFlashdata('error_registro')): ?>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const errorMsg = '<?= session()->getFlashdata('error_registro') ?>';
                  let icon = 'warning';
                  let title = 'Error al Registrar';

                  if (errorMsg.includes('ya existe')) {
                    icon = 'warning';
                    title = 'Usuario ya existe';
                  } else if (errorMsg.includes('contraseña')) {
                    icon = 'error';
                    title = 'Contraseña muy corta';
                  } else if (errorMsg.includes('usuario')) {
                    icon = 'error';
                    title = 'Usuario muy corto';
                  } else if (errorMsg.includes('nombre completo')) {
                    icon = 'error';
                    title = 'Nombre muy corto';
                  }

                  Swal.fire({
                    icon: icon,
                    title: title,
                    text: errorMsg,
                    confirmButtonColor: '#667eea',
                    confirmButtonText: 'Entendido'
                  });
                });
              </script>
            <?php endif; ?>

            <form action="<?= base_url('/registro') ?>" method="post" enctype="multipart/form-data" autocomplete="off"
              id="registroForm">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombres" id="nombres" minlength="3" required>
                <label for="nombres">
                  <i class="bi bi-person-badge me-1"></i> Nombre completo
                </label>
                <div class="form-text">Mínimo 3 caracteres</div>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nomusuario" id="nomusuario" minlength="4"
                  pattern="[a-zA-Z0-9]+" required>
                <label for="nomusuario">
                  <i class="bi bi-at me-1"></i> Nombre de usuario
                </label>
                <div class="form-text">Mínimo 4 caracteres, sin espacios</div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <div class="form-floating flex-grow-1">
                    <input type="password" class="form-control border-end-0" id="claveacceso" name="claveacceso"
                      minlength="6" required>
                    <label for="claveacceso">
                      <i class="bi bi-lock-fill me-1"></i> Contraseña
                    </label>
                  </div>
                  <span class="input-group-text bg-white border-start-0" style="cursor: pointer;"
                    onclick="togglePassword()">
                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                  </span>
                </div>
                <div class="form-text">Mínimo 6 caracteres</div>
              </div>

              <div class="mb-3">
                <label for="img_avatar" class="form-label">
                  <i class="bi bi-image me-1"></i> Avatar (opcional)
                </label>
                <input type="file" class="form-control" id="img_avatar" name="img_avatar" accept="image/*"
                  onchange="previewAvatar(event)">
                <small class="text-muted">JPG, PNG o GIF. Máx 2MB</small>

                <!-- Avatar -->
                <div class="avatar-preview" id="avatarPreview">
                  <img id="previewImg" width="100" height="100" alt="Preview">
                  <p class="text-muted mt-2"><small>Vista previa</small></p>
                </div>
              </div>

              <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="submit">
                  <i class="bi bi-check-circle me-2"></i> Registrarme
                </button>
                <a href="<?= base_url('/login') ?>" class="btn btn-outline-secondary">
                  <i class="bi bi-arrow-left me-2"></i> Ya tengo cuenta
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Ver/ocultar 
    function togglePassword() {
      const passwordInput = document.getElementById('claveacceso');
      const toggleIcon = document.getElementById('toggleIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
      }
    }

    // Avatar
    function previewAvatar(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById('previewImg').src = e.target.result;
          document.getElementById('avatarPreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    }
  </script>
</body>

</html>