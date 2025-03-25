<?php

class Pessoa{
    /*
    public => acesso público
    private => acesso privado, somente internamente na class
    protected => acesso protegido, somente internamente ou por classes que a herdam
    */

    public $nome;
    protected $idade;
    public $sexo;
    const ESPECIE = "Humana";

    public function __construct($tmpNome){
        $this->nome = $tmpNome;
    }

    public function falarNome(){
        echo $this->nome;
    }

    public function setIdade($novoIdade){
        $this->idade = $novoIdade;
    }

    public function getIdade(){
        return $this->idade;
    }

}

?>

