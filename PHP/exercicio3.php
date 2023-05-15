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

foreach($nomes as $chave => $nome){
    if(!array_key_exists($nome, $arrayDeNascimento)){
        $arrayDeNascimento[$nome] = '00-00-0000';
    }
}

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

foreach($arrayDeNascimento as $nome => $dataNasc){
    if(!in_array($nome, $nomes)){
        $novoCliente = new stdClass();
        $novoCliente->nome = $nome;
        array_push($arrayDeClientes, $novoCliente);
    }
}

foreach($arrayDeClientes as $cliente){
    $cliente->dataNascimento = $arrayDeNascimento[$cliente->nome];
}

//INÍCIO DO EXERCÍCIO

//armazenamento dos dados dos clientes em um array exclusivo
$dadosCliente = [];
foreach($arrayDeClientes as $cliente){
    $dadosCliente[$cliente->nome] = $cliente->dataNascimento;
}

//ordenação das datas em ordem crescente e apresentação dos dados ordenados
echo 'DADOS ORDENADOS EM ORDEM CRESCENTE: <br/>';
uasort($dadosCliente, function($primeiraData, $segundaData){
    return strtotime($primeiraData) - strtotime($segundaData);
});
foreach($dadosCliente as $cliente => $data){
    echo $cliente,' nascido em ',$data,'<br/>';
}
echo '<br/>';

//ordenação das datas em ordem decrescente e apresentação dos dados ordenados
echo 'DADOS ORDENADOS EM ORDEM DECRESCENTE: <br/>';
uasort($dadosCliente, function($primeiraData, $segundaData){
    return strtotime($segundaData) - strtotime($primeiraData);
});
foreach($dadosCliente as $cliente => $data){
    echo $cliente,' nascido em ',$data,'<br/>';
}
echo '<br/>';


?>