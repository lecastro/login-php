<?php

namespace Source\Controllers;

use Source\Models\User;
use Source\Models\Client;
use CoffeeCode\Router\Router;

class DashbordController extends Controller
{
    protected $user;

    /** @var Router */
    protected $router;

    /** @var User */
    protected $model;

    public function __construct(Router $router)
    {
        parent::__construct($router);

        if (empty($_SESSION['user']) || !$this->user = (new User())->findById((int) $_SESSION['user'])) {
            unset($_SESSION['user']);

            flash('error', 'Acesso negado. Favor logue-se');
            $this->router->redirect('web.login');
        }
    }

    public function home(): void
    {
        $head = $this->seo->optimize(
            "Bem vindo(a) {$this->user->first_name} | " . site('name'),
            site('desc'),
            $this->router->route('app.home'),
            routeImage('Login')
        )->render();

        echo $this->view->render('theme/dashboard', [
            'head' => $head,
            'user' => $this->user
            // 'data' => (new Client())->findClientsById((int) $this->user->id)
        ]);
    }

    public function logoff(): void
    {
        unset($_SESSION['user']);

        flash('info', "Você saiu com sucesso, volte logo {$this->user->first_name}");

        $this->router->redirect('web.login');
    }
}
