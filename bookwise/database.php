<?php

class Database {

    private $db;

    public function __construct($config)
    {
        $dsn = $this->getDSN($config);

        $this->db = new PDO($dsn); 
    }

    private function getDSN($config){
        $driver = $config['driver'];
        unset($config['driver']);

        $config = [
            'driver' => 'sqlite',
            'host' => '127.0.0.1', 
            'user' => 'root',
            'dbname' => 'bookwise',
            'port' => 3306,
            'charset' => 'utf8mb4',
            'database' => 'database.sqlite'
        ];

        $dsn = $driver . ':' . http_build_query($config, '', ';');
        
        if ($driver == 'sqlite') {
            $dsn = $driver . ':' . $config['database'];
        }

        return $dsn;
    }

    public function query($query, $class = null, $params = []){
        $prepare = $this->db->prepare($query);
        if ($class){
            $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        }

        $prepare->execute($params);

        return $prepare;
    }
}

$DB = new Database($config['database']);