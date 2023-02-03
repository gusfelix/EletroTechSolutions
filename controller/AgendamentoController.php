<?php

session_start();

require_once('../config/Conexao.php');
require_once('../dao/AgendamentoDao.php');
require_once('../model/Agendamento.php');

$agenda = new Agendamento();
$agendaDao = new AgendamentoDao();

$dados = filter_input_array(INPUT_POST);


if(isset($dados['agendar'])){

    $agenda->setIdfunc(current($agendaDao->getIdFunc($dados['dia'], $dados['hora'])));
    $agenda->setIdcliente($_SESSION['idcliente']);
    $agenda->setDia($dados['dia']);
    $agenda->setHora($dados['hora']);
    $agenda->setPreco($dados['preco']);
    $agenda->setDescricao($dados['descricao']);

    $agendaDao->agendar($agenda);

    header('Location: ../views/principalLogado/');
    
    
}else if(isset($dados['concluir'])){
    
    $agenda->setIdagenda($dados['idagenda']);
    $agenda->setForm($dados['formf']);
    
    $agendaDao->setOrdemServico($agenda);

    header('Location: ../views/listAgenda/');

} else {

    header("Location: ../");
}



?>