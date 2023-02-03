<?php

session_start();

require_once('config/Conexao.php');

require_once('dao/ClienteDao.php');
require_once('dao/FuncionarioDao.php');

$cliente = new ClienteDao();
$func = new FuncionarioDao();

if($cliente->checkLogin() || $func->checkLogin()){

    if($cliente->checkEmail($_SESSION['email'])){

        header('Location: views/principalLogado/');
        
    }else if($func->checkEmail($_SESSION['email'])){
        
        header('Location: views/listAgenda/');
    }

}else{
    header('Location: views/principalDeslogado/');
}


?>