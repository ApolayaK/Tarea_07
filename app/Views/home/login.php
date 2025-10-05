<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MiApp</title>
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

        .login-card {
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
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card login-card">
                    <div class="card-body p-4">

                        <!-- Logo -->
                        <div class="logo-container">
                            <i class="bi bi-shield-lock logo-icon"></i>
                            <h4 class="mb-1 mt-2">¡Bienvenido de Nuevo!</h4>
                            <p class="text-muted">Inicia sesión en MiApp</p>
                        </div>

                        <!-- Mensaje de éxito (registro) -->
                        <?php if (session()->getFlashdata('exito_registro')): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    Swal.fire({
                                        icon: 'success',
                                        title: '¡Bienvenido!',
                                        text: 'Tu cuenta ha sido creada exitosamente. Ahora puedes iniciar sesión.',
                                        confirmButtonColor: '#667eea',
                                        confirmButtonText: 'Entendido',
                                        timer: 4000,
                                        timerProgressBar: true
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <!-- Mensajes de error -->
                        <?php if (session()->getFlashdata('error_nomuser')): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    Swal.fire({
                                        icon: 'error',
                                        title: '¡Oops!',
                                        text: 'El usuario ingresado no existe. Verifica que esté escrito correctamente.',
                                        confirmButtonColor: '#667eea',
                                        confirmButtonText: 'Intentar de nuevo'
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error_password')): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Contraseña Incorrecta',
                                        text: 'La contraseña que ingresaste no es correcta. Por favor, inténtalo de nuevo.',
                                        confirmButtonColor: '#667eea',
                                        confirmButtonText: 'Reintentar'
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <!-- Formulario -->
                        <form action="<?= base_url('/login') ?>" method="post" autocomplete="on" id="loginForm">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nomusuario" id="nomusuario"
                                    autocomplete="username" required>
                                <label for="nomusuario">
                                    <i class="bi bi-person-fill me-1"></i> Nombre de usuario
                                </label>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control border-end-0" id="claveacceso"
                                            name="claveacceso" autocomplete="current-password" required>
                                        <label for="claveacceso">
                                            <i class="bi bi-lock-fill me-1"></i> Contraseña
                                        </label>
                                    </div>
                                    <span class="input-group-text bg-white border-start-0" style="cursor: pointer;"
                                        onclick="togglePassword()">
                                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-muted">¿No tienes cuenta?</span>
                                <a href="<?= base_url('/registro') ?>" class="text-decoration-none fw-bold">
                                    Regístrate aquí
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
    </script>
</body>

</html>