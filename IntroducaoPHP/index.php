

<?php

// include 'Pessoa.php';
// @require 'Pessoa.php';
require 'Pessoa.php';
require 'Programador.php';




//-------------------------- OBJETO PESSOA

$pessoa1 = new Pessoa('Diego');
$pessoa1->sexo = 'Masculino';
$pessoa1->setIdade(20);

var_dump($pessoa1);
/* imprime: 
      tipo do obejto == Pessoa
      nome do campo == nome
      valor do campo == string(5) 'Diego'*/


$pessoa1->falarNome();
echo "\n";
echo $pessoa1->getIdade();
echo "\n";




//-------------------------- OBJETO PROGRAMADOR

$programador1 = new Programador('Felipe', 22, 'PHP');

echo "\n";
echo $programador1->nome;
echo "\n";
echo $programador1->getIdade();
echo "\n";
echo $programador1->linguagem;
echo "\n";
echo $programador1::ESPECIE


?>
