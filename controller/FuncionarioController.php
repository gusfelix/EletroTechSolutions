<?php

require_once('../model/Funcionario.php');
require_once('../dao/FuncionarioDao.php');
require_once('../config/Conexao.php');

$func = new Funcionario();
$funcDao = new FuncionarioDao();

$dados = filter_input_array(INPUT_POST);

if(isset($_GET['logout'])){

    $funcDao->logout();

    header('Location: ../views/principalDeslogado/');

} else {
    header("Location: ../");
}

?>