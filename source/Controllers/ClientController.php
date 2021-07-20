<?php

namespace Source\Controllers;

use Source\Models\User;
use Source\Models\Client;
use Source\Models\Address;
use CoffeeCode\Router\Router;

class ClientController extends Controller
{
    /** @var Router */
    protected $router;

    /** @var Client */
    protected $client;

    /** @var Address */
    protected $address;

    public function __construct(Router $router)
    {
        parent::__construct($router);
        if (empty($_SESSION['user']) || !$this->user = (new User())->findById((int) $_SESSION['user'])) {
            unset($_SESSION['user']);

            flash('error', 'Acesso negado. Favor logue-se');
            $this->router->redirect('web.login');
        }
        $this->client   = new Client();
        $this->address  = new Address();
    }

    public function index(array $data): void
    {
        // code...
    }

    public function create(): void
    {
        $head = $this->seo->optimize(
            'Cadastrar Novo cliente | ' . site('name'),
            site('desc'),
            $this->router->route('client.create'),
            routeImage('cadastrar')
        )->render();

        echo $this->view->render('client/create', [
            'head' => $head
        ]);
    }

    public function store(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array('', $data)) {
            echo $this->ajaxResponse('message', [
                'type'    => 'error',
                'message' => 'Todos campos precisam ser preenchidos.'
            ]);

            return;
        }

        $data['user_id'] = $this->user->id;
        $client          = $this->client->new($data);

        if (!$client) {
            echo $this->ajaxResponse('message', [
                'type' => 'error',
            ]);

            return;
        }

        $data['client_id'] = $client->id;
        $address           = $this->address->new($data);

        if (!$address) {
            echo $this->ajaxResponse('message', [
                'type' => 'error',
            ]);

            return;
        }

        flash('succss', 'Cliente Cadastrado com sucesso');

        echo $this->ajaxResponse('redirect', [
            'url' => $this->router->route('client.create')
        ]);
    }

    public function update(array $data): void
    {
        // code...
    }

    public function delete(array $data): void
    {
        // code...
    }
}
