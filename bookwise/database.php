<?php

class DB {

    /**
     * Returns all books from database
     * @return array<Livro> of Livro objects
     */
    public function livros(){
        $db = new PDO('sqlite:database.sqlite');
        $query = $db->query("select * from livros");


        $items = $query->fetchAll();
    
        $retorno = [];

        foreach($items as $item){
            $livro = new Livro;
            $livro->id = $item['id'];
            $livro->titulo = $item['titulo'];
            $livro->autor = $item['autor'];
            $livro->descricao = $item['descricao'];

            $retorno[] = $livro; // Add livro to array
        }

        return $retorno;
    }
}