<?php

session_start();

require_once('../config/Conexao.php');

require_once('../model/Cliente.php');
require_once('../dao/ClienteDao.php');


require_once('../model/Funcionario.php');
require_once('../dao/FuncionarioDao.php');


$cliente = new Cliente();
$clienteDao = new ClienteDao();

$func = new Funcionario();
$funcDao = new FuncionarioDao();


$dados = filter_input_array(INPUT_POST);


if(isset($dados['login'])){

    $cliente->setEmailc(strip_tags($dados['email']));
    $cliente->setSenhac(strip_tags($dados['senha']));

    $func->setEmailf(strip_tags($dados['email']));
    $func->setSenhaf(strip_tags($dados['senha']));

    if($clienteDao->login($cliente)){

        $clienteDao->login($cliente);
        header('Location: ../views/principalLogado/');

    }else if($funcDao->login($func)){
        
        $funcDao->login($func);

        header('Location: ../views/listAgenda/');
        
    }else{
        echo "
        <script> 
            alert('Senha ou e-mail incorretos! Tente novamente');
            location.href = '../views/login';
        </script>";
    }

} else {

    header("Location: ../");
}


?>