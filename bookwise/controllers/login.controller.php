<?php

$mensagem = $_REQUEST['mensagem'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], $_POST);

    if ($validacao->naoPassou()) {
        $_SESSION['mensagem'] = 'Erro ao fazer login';
        header('location: /login');
        exit();
    }

    $usuario = $database->query(
        query: "
        select *
        from usuarios
        where email = :email
        and password = :password
    ",
        class: Usuario::class,
        params: [
            compact('email', 'password'),
        ]
    )->fetch();

    if ($usuario) {
        $_SESSION['auth'] = $usuario;
        $_SESSION['mensagem'] = 'Seja bem-vindo de volta ' . $usuario->nome;
        header('location: /');
        exit();
    }
}

view('login', compact('mensagem'));
