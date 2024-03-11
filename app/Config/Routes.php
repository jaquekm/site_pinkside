<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::criarUsuario');
$routes->get('/usuario', 'Home::mostrarUsuario');
$routes->match(['get', 'post'], 'registrar','UserController::criarUsuario');
$routes->match(['get', 'post'],'/usuario/deletar/(:num)', 'UserController::deletarUsuario/$1');
$routes->get('/usuario_deletado', 'UserController::usuarioDeletado');



/* $routes->match(['get', 'post'], 'livros/adicionar', 'LivrosController::adicionar'); //controller dos livro que traz do public function
$routes->match(['get', 'post'], 'livros/editar/(:num)', 'LivrosController::editar/$1'); //controller->metodo
$routes->get('usuarios/deletar/(:num)', 'LivrosController::deletar/$1');
$routes->match(['get', 'post'],'livros/reservas/(:num)', 'ReservasController::index/$1'); */ 

/* $routes->match(['get', 'post'],'reservas/view/(:num)', 'ReservasController::check_disponibilidade/$1'); */ 
