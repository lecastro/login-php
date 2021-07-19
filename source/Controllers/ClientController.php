<?php

namespace Source\Controllers;

class ClientController extends Controller
{
    /** @var Router */
    protected $router;

    public function __construct(Router $router)
    {
        parent::__construct($router);
        $this->model = new User();
    }

    public function index(array $data): void
    {
        // code...
    }

    public function store(array $data): void
    {
        // code...
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
