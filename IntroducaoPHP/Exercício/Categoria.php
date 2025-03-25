<?php

namespace CategoriaNamespace;

class Categoria{
    private $nome;

    public function __construct($tmpNome){
        $this->nome = $tmpNome;
    }

    public function getNome(){
        return $this->nome;
    }

}

?>