<?php

namespace EletronicoNamespace;

use ProdutoNamespace\Produto;
use CategoriaNamespace\Categoria;

class Eletronico extends Produto{
    private $garantiaMeses;

    public function __construct($tmpNome, $tmpPreco, Categoria $tmpCategoria, $tmpGarantia){
        $this->setNome($tmpNome);
        $this->setPreco($tmpPreco);
        $this->setCategoria($tmpCategoria);
        $this->garantiaMeses = $tmpGarantia;
    }

    public function getGarantia(){
        return $this->garantiaMeses;
    }

    public function getNome(){
        return $this->nome;
    }
}


?>