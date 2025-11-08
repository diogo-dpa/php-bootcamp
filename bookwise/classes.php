<?php

class Celular {
    public $tamanho;

    public function ligar(){
        echo 'estou ligando...';
    }
}

$celular = new Celular();
$celular->tamanho = '10cm';
$celular->ligar();

echo $celular->tamanho;