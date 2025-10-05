<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Usuario;

class UsuarioController extends BaseController
{
    /**
     * Mostrar formulario de registro
     */
    public function mostrarRegistro()
    {
        return view('home/registro');
    }

    /**
     * Procesar registro de nuevo usuario
     */
    public function registrar()
    {
        $session = session();
        $usuario = new Usuario();

        // Recuperar datos del formulario
        $nombres = $this->request->getPost('nombres');
        $nomusuario = $this->request->getPost('nomusuario');
        $claveacceso = $this->request->getPost('claveacceso');

        // Validar que el usuario no exista
        if ($usuario->existeUsuario($nomusuario)) {
            $session->setFlashdata('error_registro', 'El nombre de usuario ya existe');
            return redirect()->to(base_url('/registro'));
        }

        // Procesar imagen avatar (opcional)
        $img_avatar = null;
        $file = $this->request->getFile('img_avatar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'images/users', $newName);
            $img_avatar = 'images/users/' . $newName;
        }

        // Preparar datos
        $data = [
            'nombres' => $nombres,
            'nomusuario' => $nomusuario,
            'claveacceso' => password_hash($claveacceso, PASSWORD_DEFAULT),
            'img_avatar' => $img_avatar
        ];

        // Insertar usuario
        if ($usuario->registrarUsuario($data)) {
            $session->setFlashdata('exito_registro', 'Usuario registrado exitosamente');
            return redirect()->to(base_url('/login'));
        } else {
            $session->setFlashdata('error_registro', 'Error al registrar usuario');
            return redirect()->to(base_url('/registro'));
        }
    }

    /**
     * Mostrar formulario de login
     */
    public function mostrarLogin()
    {
        return view('home/login');
    }

    /**
     * Procesar login
     */
    public function login()
    {
        $session = session();

        // Recuperar credenciales
        $nomusuario = $this->request->getPost('nomusuario');
        $claveacceso = $this->request->getPost('claveacceso');

        $usuario = new Usuario();
        $data = $usuario->getUser($nomusuario);

        // Validar si existe el usuario
        if (!$data) {
            $session->setFlashdata('error_nomuser', 'No existe el usuario ' . $nomusuario);
            return redirect()->to(base_url('/login'));
        }

        // Verificar contraseña
        $claveEncriptada = $data['claveacceso'];

        if (!password_verify($claveacceso, $claveEncriptada)) {
            $session->setFlashdata('error_password', 'Clave incorrecta');
            return redirect()->to(base_url('/login'));
        }

        // Login exitoso - guardar datos en sesión
        $session->set([
            'usuario_id' => $data['id'],
            'usuario_nombre' => $data['nombres'],
            'usuario_nomusuario' => $data['nomusuario'],
            'usuario_avatar' => $data['img_avatar'],
            'isLoggedIn' => true
        ]);

        return redirect()->to(base_url('/dashboard'));
    }

    /**
     * Mostrar perfil del usuario
     */
    public function perfil()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $usuario = new Usuario();
        $data['usuario'] = $usuario->find($session->get('usuario_id'));

        return view('usuario/perfil', $data);
    }

    /**
     * Actualizar avatar del usuario
     */
    public function actualizarAvatar()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        $file = $this->request->getFile('img_avatar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'images/users', $newName);
            $rutaAvatar = 'images/users/' . $newName;

            $usuario = new Usuario();
            $usuario->actualizarAvatar($session->get('usuario_id'), $rutaAvatar);

            // Actualizar sesión
            $session->set('usuario_avatar', $rutaAvatar);

            $session->setFlashdata('exito_avatar', 'Avatar actualizado exitosamente');
        } else {
            $session->setFlashdata('error_avatar', 'Error al subir la imagen');
        }

        return redirect()->to(base_url('/perfil'));
    }

    /**
     * Cerrar sesión
     */
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}