<?php

$pesquisar = $_REQUEST['pesquisa'] ?? '';

$livros = $DB->query(
    query: "select * from livros where titulo like :filtro", 
    class: Livro::class, 
    params: ['filtro' => "%$pesquisar%"]
)->fetchAll();

view('index', compact('livros'));

?>