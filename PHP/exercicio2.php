<?php

$nomes = ['Francisco Souza', 'Guilherme Rosa', 'Arthur Golveia'];

$cliente1 = new stdClass();
$cliente1->nome = $nomes[0];

$cliente2 = new stdClass();
$cliente2->nome = $nomes[1];

$cliente3 = new stdClass();
$cliente3->nome = $nomes[2];

$arrayDeClientes = [$cliente1, $cliente2, $cliente3];

$arrayDeNascimento = [
    'Francisco Souza' => '10-12-1996',
    'Arthur Golveia' => '14-01-2000',
    'Guilherme Rosa' => '26-05-1985',
    'Marcelo Planalto' => '26-05-1985'
    ];    

// INÍCIO DO EXERCÍCIO

//verificando se há algum nome no array '$nomes' que não existe no array '$arrayDeNascimento'.
foreach($nomes as $chave => $nome){
    if(!array_key_exists($nome, $arrayDeNascimento)){
        $arrayDeNascimento[$nome] = '00-00-0000';
    }
}

//verificando se há algum nome no array '$nomes' que não existe no array de objetos '$arrayDeClientes'.
$nomesClientes = [];
foreach($arrayDeClientes as $cliente){
    $nomesClientes[] = $cliente->nome;
}
foreach($nomes as $nome){
    if(!in_array($nome, $nomesClientes)){
        $novoCliente = new stdClass();
        $novoCliente->nome = $nome;
        array_push($arrayDeClientes, $novoCliente);
    }
}

//verificando se há algum nome em '$arrayDeNascimentos' que não existe no array '$nomes'.
foreach($arrayDeNascimento as $nome => $dataNasc){
    if(!in_array($nome, $nomes)){
        $novoCliente = new stdClass();
        $novoCliente->nome = $nome;
        array_push($arrayDeClientes, $novoCliente);
    }
}

//adição da data de nascimento referente a cada um dos clientes correspondentes.
foreach($arrayDeClientes as $cliente){
    $cliente->dataNascimento = $arrayDeNascimento[$cliente->nome];
}

//apresentação dos clientes e suas datas de nascimento correspondentes (sem ordenação específica)
foreach($arrayDeClientes as $cliente){
    echo $cliente->nome, ' - ', $cliente->dataNascimento, '<br/>';
}

?>