<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal - redirige al login
$routes->get('/', 'UsuarioController::mostrarLogin');

// Rutas de autenticación
$routes->get('/registro', 'UsuarioController::mostrarRegistro');
$routes->post('/registro', 'UsuarioController::registrar');

$routes->get('/login', 'UsuarioController::mostrarLogin');
$routes->post('/login', 'UsuarioController::login');

$routes->get('/logout', 'UsuarioController::logout');

// Rutas del dashboard (requieren autenticación)
$routes->get('/dashboard', 'DashboardController::index');

// Rutas de perfil de usuario
$routes->get('/perfil', 'UsuarioController::perfil');
$routes->post('/perfil/actualizar-avatar', 'UsuarioController::actualizarAvatar');