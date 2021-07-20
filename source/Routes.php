<?php

use CoffeeCode\Router\Router;

$router = new Router(site() . '/public');
$router->namespace("Source\Controllers");

// web
$router->group(null);
$router->get('/', 'WebController:login', 'web.login');
$router->get('/cadastrar', 'WebController:register', 'web.register');
$router->get('/recuperar', 'WebController:forget', 'web.forget');
$router->get('/senha/{email}/{forget}', 'WebController:reset', 'web.reset');

// auth
$router->group(null);
$router->post('/login', 'AuthController:login', 'auth.login');
$router->post('/register', 'AuthController:register', 'auth.register');
$router->post('/forget', 'AuthController:forget', 'auth.forget');
$router->post('/reset', 'AuthController:reset', 'auth.reset');

$router->group('client');
$router->get('/', 'ClientController:index', 'address.index');
$router->post('/cadastrar', 'ClientController:store', 'address.store');
$router->post('/atualizar', 'ClientController:update', 'address.update');
$router->post('/deletar', 'ClientController:delete', 'address.delete');

//profile
$router->group('me');
$router->get('/', 'DashbordController:home', 'app.home');
$router->get('/sair', 'DashbordController:logoff', 'app.logoff');

$router->group('client');
$router->get('/', 'ClientController:index', 'address.index');
$router->post('/cadastrar', 'ClientController:store', 'address.store');
$router->post('/atualizar', 'ClientController:update', 'address.update');
$router->post('/deletar', 'ClientController:delete', 'address.delete');

//errors
$router->group('ops');
$router->get('/{errcode}', 'Web:error', 'web.error');

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect('web.error', ['errcode' => $router->error()]);
}
