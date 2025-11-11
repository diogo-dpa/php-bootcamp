<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validacoes = []
;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $email_confirmation = $_POST['email-confirmation'];
    $senha = $_POST['senha'];

    if (strlen($nome) === 0){
        $validacoes[] = 'O nome é obrigatório';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validacoes[] = 'O email é inválido';
    }

    if (strlen($email_confirmation) === 0){
        $validacoes[] = 'O email de confirmação é obrigatório';
    }

    if ($email != $email_confirmation){
        $validacoes[] = 'Os emails não conferem';
    }

    if (strlen($senha) < 8 || strlen($senha) > 20){
        $validacoes[] = 'A senha deve ter entre 8 e 20 caracteres';
    }

    if (!str_contains($senha, '*')){
        $validacoes[] = 'A senha deve conter pelo menos um caractere especial';
    }

    if (sizeof($validacoes) > 0){
        $_SESSION['validacoes'] = $validacoes;
        header('location: /login');
        exit();
    }

   $resultado = $DB->query(
        query: 'insert into usuarios (nome, email, senha) values (:nome, :email, :senha)',
        params: [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ] 
    );

    header(('location: /login?mensagem=Registrado com sucesso'));
    exit();

}

view('login');