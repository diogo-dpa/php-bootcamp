<?php


$db = new DB();
$db->livros();

view('index', compact('livros'));

?>