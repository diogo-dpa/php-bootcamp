<?php

class DB {

    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:database.sqlite'); 
    }

    /**
     * Returns all books from database
     * @return array<Livro> of Livro objects
     */
    public function livros($pesquisa = null){

        $prepare = $this->db->prepare("select * from livros where usuario_id = 1 and titulo like :pesquisa");

        $prepare->bindValue('pesquisa', "%$pesquisa%");
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function livro($id){
        $prepare = $this->db->prepare("select * from livros where id = :id");

        $prepare->bindValue('id', $id);

        // Do the map according to the class. native way
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();

        return $prepare->fetch();
    
        // return array_map(fn($item) => Livro::make($item), $items)[0];
    }
}