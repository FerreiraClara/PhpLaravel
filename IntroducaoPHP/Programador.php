<?php

class Programador extends Pessoa{

    public $linguagem;

    public function __construct($tmpNome, $tmpIdade, $tmpLinguagem){
        $this->nome = $tmpNome;
        $this->setIdade($tmpIdade);
        $this->linguagem = $tmpLinguagem;

        echo 'Objeto '.__CLASS__.' foi instanciado';
        echo "\n";
        echo __LINE__;
        echo "\n";
        echo __FILE__;
        echo "\n";
        echo __DIR__;
        echo "\n";
        echo __FUNCTION__;
        echo "\n";
        echo __METHOD__;
        echo "\n";
        echo __NAMESPACE__;
    }

}

?>