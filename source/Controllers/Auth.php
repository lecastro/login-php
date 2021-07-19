<?php

namespace Source\Controllers;

use Source\Models\User;
use Source\Support\Email;

/**
 *
 */
class Auth extends Controller
{
    /** @var User */
    protected $model;

    public function __construct($router)
    {
        parent::__construct($router);
        $this->model = new User();
    }

    public function login(array $data): void
    {
        $email  = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $passwd = filter_var($data['passwd'], FILTER_DEFAULT);

        if (!$email || !$passwd) {
            echo $this->ajaxResponse('message', [
                'type'    => 'alert',
                'message' => 'Informe seu e-email e senha para logar.'
            ]);

            return;
        }

        $user = (new User())->find('email = :e', "e={$email}")->fetch();

        if (!$user || !password_verify($passwd, $user->passwd)) {
            echo $this->ajaxResponse('message', [
                'type'    => 'alert',
                'message' => 'E-email ou senha não conferem.'
            ]);

            return;
        }

        $_SESSION['user'] = $user->id;

        echo $this->ajaxResponse('redirect', [
            'url' => $this->router->route('app.home')
        ]);
    }

    public function register(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array('', $data)) {
            echo $this->ajaxResponse('message', [
                'type'    => 'error',
                'message' => 'Preencha todos os campos para cadastrar-se.'
            ]);

            return;
        }

        $this->model->first_name = $data['first_name'];
        $this->model->last_name  = $data['last_name'];
        $this->model->email      = $data['email'];
        $this->model->passwd     = password_hash($data['passwd'], PASSWORD_DEFAULT);

        if (!$this->model->save()) {
            echo $this->ajaxResponse('message', [
                'type'    => 'error',
                'message' => $this->model->fail()->getMessage()
            ]);

            return;
        }

        $_SESSION['user'] = $this->model->id;

        echo $this->ajaxResponse('redirect', [
            'url' => $this->router->route('app.home')
        ]);
    }

    /** @param string[] $data */
    public function forget(array $data): void
    {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if (!$email) {
            echo $this->ajaxResponse('message', [
                'type'    => 'alert',
                'message' => 'Informe Um e-email Válido .'
            ]);

            return;
        }

        $user = (new User())->find('email = :e', "e={$email}")->fetch();

        if (!$user) {
            echo $this->ajaxResponse('message', [
                'type'    => 'alert',
                'message' => 'E-MAIL informa não é cadastrado.'
            ]);

            return;
        }

        $user->forget = (md5(uniqid(rand(), true)));
        $user->save();

        $_SESSION['forget'] = $user->id;

        $email = new Email();

        $email->add(
            'Recupere sua senha | ' . site('name'),
            $this->view->render('emails/recover', [
                'user' => $user,
                'link' => $this->router->route('web.reset', [
                    'email'  => $user->email,
                    'forget' => $user->forget
                ])
            ]),
            "{$user->first_name} {$user->last_name}",
            $user->email
        )->send();

        flash('success', 'Enviamos um link de recuperação para seu e-mail.');

        echo $this->ajaxResponse('redirect', [
            'url' => $this->router->route('web.forget')
        ]);
    }

    /** @param string[] $data */
    public function reset(array $data): void
    {
        if (empty($_SESSION['forget']) || !$user = (new User())->findById($_SESSION['forget'])) {
            flash('error', 'não foi possivel recuperar tente novamente');
            echo $this->ajaxResponse('redirect', [
                'url' => $this->router->route('web.forget'),
            ]);

            return;
        }

        if (empty($data['password']) || empty($data['password_re'])) {
            echo $this->ajaxResponse('message', [
                'type'    => 'alert',
                'message' => 'Informe e repita sua nova senha'
            ]);

            return;
        }

        if ($data['password'] != $data['password_re']) {
            echo $this->ajaxResponse('message', [
                'type'    => 'alert',
                'message' => 'você informou senha diferentes'
            ]);

            return;
        }

        $user->passwd = $data['password'];
        $user->forget = null;

        if (!$user->save()) {
            echo $this->ajaxResponse('message', [
                'type'    => 'error',
                'message' => $user->fail()->getMessage()
            ]);
        }

        unset($_SESSION['forget']);

        flash('succss', 'sua senha foi atualizado com sucesso');

        echo $this->ajaxResponse('redirect', [
            'url' => $this->router->route('web.login')
        ]);

        return;
    }
}
