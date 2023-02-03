<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'../libraries/PHPMailer/src/Exception.php';
require'../libraries/PHPMailer/src/PHPMailer.php';
require'../libraries/PHPMailer/src/SMTP.php';

require_once('../config/Conexao.php');
require_once('../model/Cliente.php');
require_once('../dao/ClienteDao.php');
require_once('../dao/FuncionarioDao.php');

$cliente = new Cliente();
$clienteDao = new ClienteDao();
$funcDao = new FuncionarioDao();

$dados = filter_input_array(INPUT_POST);

if(isset($dados['cadastrar'])){

    $cliente->setNomec($dados['nome']);
    $cliente->setCpfc($dados['cpf']);
    $cliente->setEmailc($dados['email']);
    $cliente->setCelularc($dados['celular']);
    $cliente->setCep($dados['cep']);
    $cliente->setEndereco($dados['endereco']);
    $cliente->setNumero($dados['numero']);
    $cliente->setComplemento($dados['complemento']);
    $cliente->setBairro($dados['bairro']);
    $cliente->setMunicipio($dados['municipio']);
    $cliente->setEstado($dados['estado']);
    $cliente->setSenhac($dados['senha']);


    if($clienteDao->checkEmail($dados['email']) || $funcDao->checkEmail($dados['email'])){
        echo "<script> 
            alert('Este e-mail pertence à outra conta!');
            location.href = '../views/cadastro';
        </script>";
    }

    if($clienteDao->checkCPF($dados['cpf']) || $funcDao->checkCPF($dados['cpf'])){
        echo "<script> 
            alert('Este CPF pertence à outra conta!');
            location.href = '../views/cadastro';
        </script>";
    }

    if($clienteDao->checkCelular($dados['celular']) || $funcDao->checkCelular($dados['celular'])){
        echo "<script> 
            alert('Este celular pertence à outra conta!');
            location.href = '../views/cadastro';
        </script>";
    }

    if(!$clienteDao->checkEmail($dados['email']) && !$funcDao->checkEmail($dados['email']) && 
       !$clienteDao->checkCPF($dados['cpf']) && !$funcDao->checkCPF($dados['cpf']) &&
       !$clienteDao->checkCelular($dados['celular']) && !$funcDao->checkCelular($dados['celular'])){

        $clienteDao->cadastrar($cliente);

        if($clienteDao->login($cliente)){
    
            $clienteDao->login($cliente);
            header('Location: ../views/principalLogado/');
        }
    }


}else if(isset($dados['assinar'])){

    $cliente->setIdcliente($_SESSION['idcliente']);

    $cliente->setCartaoc($dados['num_cartao']);
    $cliente->setTitular($dados['titular']);
    $cliente->setValidade($dados['validade']);
    $cliente->setPlano($dados['plano']);


    $clienteDao->setPlano($cliente);

    header('Location: ../views/principalLogado/');
    
}else if(isset($dados['update-info'])){

    $cliente->setIdcliente($_SESSION['idcliente']);
    $cliente->setNomec($dados['nomec']);
    $cliente->setCelularc($dados['celularc']);

    $clienteDao->updateInfo($cliente);
    
    header('Location: ../views/meuPerfil/');


}else if(isset($dados['update-adress'])){

    $cliente->setIdcliente($_SESSION['idcliente']);

    $clienteDao->updateInfo($cliente);
    $cliente->setCep($dados['cep']);
    $cliente->setEndereco($dados['endereco']);
    $cliente->setNumero($dados['numero']);
    $cliente->setComplemento($dados['complemento']);
    $cliente->setBairro($dados['bairro']);
    $cliente->setMunicipio($dados['municipio']);
    $cliente->setEstado($dados['estado']);

    $clienteDao->updateAddress($cliente);

    header('Location: ../views/meuPerfil/');
    
}else if(isset($dados['update-password'])){
    
    $cliente->setEmailc($_SESSION['email']);
    $cliente->setSenhac($dados['senha-nova']);
    
    
    if($clienteDao->checkSenha($dados['senha-antiga'], $_SESSION['idcliente'])){
        
        $clienteDao->updatePassword($cliente);
        
        echo "<script>
        alert('Senha alterada com sucesso')
        location.href = '../views/principalLogado'
        </script>";
        
    }else{
        echo "<script>
        alert('Senha antiga incorreta')
        location.href = '../views/principalLogado'
        </script>";
    }
    
}else if(isset($dados['update-card'])){
    
    $cliente->setIdcliente($_SESSION['idcliente']);
    $cliente->setCartaoc($dados['num_cartao']);
    $cliente->setTitular($dados['titular']);
    $cliente->setValidade($dados['validade']);
    
    $clienteDao->updateCard($cliente);
    
    header('Location: ../views/meuPerfil/');
    
}else if(isset($dados['recuperar'])){

    if($clienteDao->checkEmail($dados['email'])){

        $senha = $clienteDao->newPassword();
        $nome = $clienteDao->getNomeEmail($dados['email']);
        $nome = substr($nome, 0, strpos($nome, ' '));

        $cliente->setEmailc($dados['email']);
        $cliente->setSenhac($senha);

        $clienteDao->updatePassword($cliente);

        $email = new PHPMailer(true);
    
        $email->isSMTP();
        $email->CharSet = 'UTF-8';
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->Username = 'solutionseletrotech@gmail.com';
        $email->Password = 'wbkouucxasscpnlo';
        $email->SMTPSecure = 'ssl';
        $email->Port = 465;
    
        $email->setFrom('solutionseletrotech@gmail.com');
    
        $email->addAddress($dados["email"]);
        $email->isHTML(true);
    
        $email->Subject = 'EletroTech | Recuperação de senha';

        $email->Body = '
        Olá, '. $nome .' <br><br> 
        Esta é sua nova senha de acesso ao nosso site: '. $senha .
        '<br>Caso queira alterá-la, basta ir em Meu Perfil > Alterar senha
        <br><br> Atenciosamente, <br> EletroTech Solutions';
    
        $email->send();

        echo "<script> 
            alert('A nova senha foi enviado para o e-mail');
            location.href = '../views/login/';
        </script>";

    }else{
        echo "<script> 
            alert('E-mail não cadastrado');
            location.href = '../views/login/';
        </script>";
    }   

}else if(isset($dados['cancelar'])){

    if($clienteDao->checkSenha($dados['senha'], $_SESSION['idcliente'])){

        $clienteDao->cancelarAssinatura($_SESSION['idcliente']);
        echo "
        <script> 
            alert('Assinatura cancelada');
            location.href = '../views/principalLogado/';
        </script>";
        
    }else{
        echo "
        <script> 
            alert('Senha incorreta');
            location.href = '../views/meuPerfil/';
        </script>";
    }


}else if(isset($_GET['logout'])){
    
    $clienteDao->logout();
    
    header('Location: ../views/principalDeslogado/');
    
} else {

    header("Location: ../");
}


?>