<?php

namespace Source\Controllers;
use Source\Models\User;
/**
 *
 */
class Web extends Controller
{
  function __construct($router)
  {
    parent::__construct($router);

    if (!empty($_SESSION['user'])) {
      $this->router->redirect("app.home");
    }
  }

  public function login(): void
  {
      $head = $this->seo->optimize(
          'Conheça Nosso site' . site('name'),
          site('desc'),
          $this->router->route('web.login'),
          routeImage("Login")
      )->render();

      echo $this->view->render("theme/login", [
        "head" => $head
      ]);
  }

  public function register(): void
  {
    $head = $this->seo->optimize(
        'Crie sua conta no |' . site('name'),
        site('desc'),
        $this->router->route('web.register'),
        routeImage("register")
    )->render();

    $form_user = new \stdClass();
    $form_user->first_name = null;
    $form_user->last_name = null;
    $form_user->email = null;

    echo $this->view->render("theme/register", [
      "head"  => $head,
      "user" => $form_user
    ]);
  }

  public function forget(): void
  {
    $head = $this->seo->optimize(
        'Recupere Sua Senha |' . site('name'),
        site('desc'),
        $this->router->route('web.register'),
        routeImage("cadastrar")
    )->render();

    echo $this->view->render("theme/forget", [
      "head" => $head
    ]);
  }


  public function reset(array $data): void
  {
    if (empty($_SESSION['forget'])) {
      flash('info', "Informe seu email para recupar sua senha.");
      $this->router->redirect('web.forget');
    }

    $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    $forget = filter_var($data['forget'], FILTER_DEFAULT);
    $errforget = "não foi possivel recuperar tente novamente";

    if (!$email || !$forget) {
        flash('error', $errforget);
        $this->router->redirect('web.forget');
    }

    $user = (new User())->find("email = :e AND forget= :f", "e={$email}&f={$forget}")->fetch();

    if (!$user) {
      flash('error', $errforget);
      $this->router->redirect('web.forget');
    }

    $head = $this->seo->optimize(
        'crie sua nova senha |' . site('name'),
        site('desc'),
        $this->router->route('web.reset'),
        routeImage("reset")
    )->render();

    echo $this->view->render("theme/reset", [
      "head" => $head
    ]);
  }


  public function error($data): void
  {
    $error = filter_var($data['errcode'], FILTER_VALIDATE_INT);

    $head = $this->seo->optimize(
        "Ooopss {$error} |" . site('name'),
        site('desc'),
        $this->router->route('web.error', ['errcode' => $error]),
        routeImage($error)
    )->render();

    echo $this->view->render("theme/error", [
      "head" => $head,
      "error" => $error
    ]);
  }
}
