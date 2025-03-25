<?php

namespace ProdutoNamespace;

use CategoriaNamespace\Categoria;

class Produto{
    protected $nome;
    protected $preco;
    protected Categoria $categoria;

    const MOEDA = 'R$';

    public function __construct($tmpNome, $tmpPreco, Categoria $tmpCategoria){
        $this->nome = $tmpNome;
        $this->preco = $tmpPreco;
        $this->categoria = $tmpCategoria;
    }

    public function setNome($tmpNome){
        $this->nome = $tmpNome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setPreco($tmpPreco){
        $this->preco = $tmpPreco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setCategoria($tmpCategoria){
        $this->categoria = $tmpCategoria;
    }

    public function getCategoria(){
        return $this->categoria;
    }
}

?>