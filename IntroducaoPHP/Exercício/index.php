<?php

require 'Produto.php';          //  Inclui o arquivo Produto.php
require_once 'Categoria.php';   // Inclui apenas se ainda não foi incluido
require_once 'Eletronico.php';

// USE é usado para importacao de namespaces
use ProdutoNamespace\Produto;
use CategoriaNamespace\Categoria;
use EletronicoNamespace\Eletronico;


function imprimir($objeto){
    echo 'Produto: ' . $objeto->getNome() . PHP_EOL;
    echo 'Preço: ' . Produto::MOEDA . $objeto->getPreco() . PHP_EOL;
    echo 'Categoria: ' . $objeto->getCategoria()->getNome() . PHP_EOL;

    if($objeto instanceof Eletronico){
        echo 'Garantia: ' . $objeto->getGarantia() . ' meses' . PHP_EOL;
    }
}



# CATEGORIAS

$categoria_eletronicos = new Categoria('Eletrônicos');
$categoria_livros = new Categoria('Livros');


# PRODUTOS

$produto1 = new Produto('Notebook Gamer', 4500, $categoria_eletronicos);
$produto2 = new Produto('Livro Infantil', 120, $categoria_livros);


#PRODUTOS ELETRONICOS

$eletronico1 = new Eletronico('Smartphone', 2500.25, $categoria_eletronicos, 12);

// var_dump($categoria_eletronicos);
// var_dump($categoria_livros);
// var_dump($produto1);
// var_dump($eletronico1);

imprimir($produto1);
imprimir($produto2);
imprimir($eletronico1)


?>