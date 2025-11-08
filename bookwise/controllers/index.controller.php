<?php

$pesquisar = $_REQUEST['pesquisa'] ?? '';

$db = new DB();
$livros = $db->livros($pesquisar);

view('index', compact('livros'));

?>