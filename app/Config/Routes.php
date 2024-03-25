<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::criarUsuario');
$routes->get('/usuarios', 'Home::mostrarUsuario');
$routes->match(['get', 'post'], 'login', 'UserController::login');
$routes->match(['get', 'post'], 'registrar', 'UserController::criarUsuario');
$routes->match(['get', 'post'], '/usuario/deletar/(:num)', 'UserController::deletarUsuario/$1');
$routes->get('/usuario_deletado', 'UserController::usuarioDeletado');
$routes->match(['get', 'post'], 'editar_usuario/(:num)', 'UserController::editarUsuario/$1');
