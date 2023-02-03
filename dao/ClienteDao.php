<?php

use PSpell\Config;

class ClienteDao{

    public function cadastrar(Cliente $cliente) {
        try {

            $sql = "INSERT INTO cliente 
            (nomec, cpfc, emailc, celularc, cep, endereco, numero, complemento, bairro, municipio, estado, senhac, ativo) 
            VALUES
            (:nomec, :cpfc, :emailc, :celularc, :cep, :endereco, :numero, :complemento, :bairro, :municipio, :estado, :senhac, 1)";

            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(":nomec", $cliente->getNomec(), PDO::PARAM_STR);
            $stmt->bindValue(":cpfc", $cliente->getCpfc(), PDO::PARAM_STR);
            $stmt->bindValue(":emailc", $cliente->getEmailc(), PDO::PARAM_STR);
            $stmt->bindValue(":celularc", $cliente->getCelularc(), PDO::PARAM_STR);

            $stmt->bindValue(":cep", $cliente->getCep(), PDO::PARAM_STR);
            $stmt->bindValue(":endereco", $cliente->getEndereco(), PDO::PARAM_STR);
            $stmt->bindValue(":numero", $cliente->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(":complemento", $cliente->getComplemento(), PDO::PARAM_STR);
            $stmt->bindValue(":estado", $cliente->getEstado(), PDO::PARAM_STR);
            $stmt->bindValue(":municipio", $cliente->getMunicipio(), PDO::PARAM_STR);
            $stmt->bindValue(":bairro", $cliente->getBairro(), PDO::PARAM_STR);

            $stmt->bindValue(":senhac", md5($cliente->getSenhac()), PDO::PARAM_STR);
            
            return $stmt->execute();
            
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }
    

    public function setPlano(Cliente $cliente){
        try {
            date_default_timezone_set('america/sao_paulo');
            $data = date('Y-m-d');

            $sql = "UPDATE cliente SET plano = :plano, cartaoc = :cartaoc, validade = :validade, titular = :titular, dataAssinatura = '$data' WHERE idcliente = :idcliente";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindParam(":plano", $cliente->getPlano(), PDO::PARAM_STR);
            $stmt->bindParam(":cartaoc", $cliente->getCartaoc(), PDO::PARAM_STR);
            $stmt->bindParam(":validade", $cliente->getValidade(), PDO::PARAM_STR);
            $stmt->bindParam(":titular", $cliente->getTitular(), PDO::PARAM_STR);
            $stmt->bindParam(":idcliente", $cliente->getIdcliente(), PDO::PARAM_STR);

            $stmt->execute();
    
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }


    public function listarAgenda($idcliente){

        try {
    
            $sql = "SELECT func.nomef, ag.hora, ag.dia, ag.preco, ag.idagenda, ag.status FROM 
            cliente AS c INNER JOIN 
            agenda AS ag ON c.idcliente = ag.idcliente INNER JOIN 
            funcionario AS func ON ag.idfun = func.idfun WHERE ag.idcliente = :idcliente";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":idcliente", $idcliente, PDO::PARAM_INT);
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function login(Cliente $cliente){
        try{
            $sql = "SELECT * FROM cliente WHERE emailc = :email";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":email", $cliente->getEmailc(), PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1) {
                
                if(md5($cliente->getSenhac()) == $result['senhac'] && $result['ativo']){
    
                    session_start();
    
                    $_SESSION['idcliente'] = $result['idcliente'];
                    $_SESSION['email'] = $result['emailc'];
                    $_SESSION['nome'] = $result['nomec'];
    
                    return true;
    
                }else{
                    return false;
                }
                
            }else{
                return false;
            }


        }catch(PDOException $error){
            $error->getMessage();
        }
    }

    public function logout(){
        session_start();
		session_destroy();

		unset($_SESSION['idcliente']);

		return true;
    }

    //checar dados
    function checkLogin(){
        return isset($_SESSION['idcliente']);
    }


    function checkEmail($email){

        $sql = "SELECT emailc FROM cliente";

        $stmt = Conexao::getConexao()->query($sql);
        $array_emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return in_array($email, $array_emails);
    }


    function checkCPF($cpf){

        $sql = "SELECT cpfc FROM cliente";

        $stmt = Conexao::getConexao()->query($sql);
        $array_cpf = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return in_array($cpf, $array_cpf);
    }


    function checkCelular($celular){

        $sql = "SELECT celularc FROM cliente";

        $stmt = Conexao::getConexao()->query($sql);
        $array_celular = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return in_array($celular, $array_celular);
    }


    function checkSenha($senha, $idcliente){

        $sql = "SELECT senhac FROM cliente WHERE idcliente = $idcliente";

        $stmt = Conexao::getConexao()->query($sql);
        $senhasql = $stmt->fetch(PDO::FETCH_COLUMN);

        if(md5($senha) == $senhasql){
            return true;
            
        }else{
            return false;
        }
    }

    public function checkAssinatura($idcliente){
        try {
            $sql = "SELECT plano, cartaoc, dataAssinatura FROM cliente WHERE idcliente = $idcliente";

            $stmt = Conexao::getConexao()->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);


            date_default_timezone_set('america/sao_paulo');
            $dataAtual = new DateTime('now');
            
            if($result['dataAssinatura'] != NULL){
                
                $vencimento = new DateTime($result['dataAssinatura']);
                
                if($result['plano'] == 'MENSAL'){

                    $vencimento = $vencimento->modify('+1 month');

                }else if($result['plano'] == 'SEMESTRAL'){

                    $vencimento = $vencimento->modify('+6 month');

                }else if($result['plano'] == 'ANUAL'){

                    $vencimento = $vencimento->modify('+12 month');
                }
    
    
                if($result['cartaoc'] == NULL){
                    if($dataAtual->format('Y-m-d') > $vencimento->format('Y-m-d')){
    
                        return true;
    
                    }else{
                        return false;
                    }
    
                }else{
                    return false;
                }
            }

        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    //obter informações
    public function getInfo($idcliente){
        try {
            $sql = "SELECT * FROM cliente WHERE idcliente = $idcliente";

            $stmt = Conexao::getConexao()->query($sql);

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getNomeEmail($email){
        try {
            $sql = "SELECT nomec FROM cliente WHERE emailc = '$email'";

            $stmt = Conexao::getConexao()->query($sql);

            return $stmt->fetch(PDO::FETCH_COLUMN);
            
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function countPendente($idcliente){

        $sql = "SELECT COUNT(idcliente) FROM agenda WHERE status = 'PENDENTE' AND idcliente = $idcliente";

        $stmt = Conexao::getConexao()->query($sql);

        return $stmt->fetch(PDO::FETCH_COLUMN);
    }


    public function countConcluido($idcliente){

        $sql = "SELECT COUNT(idcliente) FROM agenda WHERE status = 'CONCLUIDO' AND idcliente = $idcliente";

        $stmt = Conexao::getConexao()->query($sql);

        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    //atualizar informações
    function updateInfo(Cliente $cliente){

        try {
            $sql = "UPDATE cliente SET nomec = :nome, celularc = :celular 
            WHERE idcliente = :idcliente";
    
            $stmt = Conexao::getConexao()->prepare($sql);
    
            $stmt->bindValue(":nome", $cliente->getNomec(), PDO::PARAM_STR);
            $stmt->bindValue(":celular", $cliente->getCelularc(), PDO::PARAM_STR);
            $stmt->bindValue(":idcliente", $cliente->getIdcliente(), PDO::PARAM_STR);
    
            $stmt->execute();
            
        }catch(PDOException $error){
            $error->getMessage();
        }
    }


    function updateAddress(Cliente $cliente){
        try {
            $sql = "UPDATE cliente SET cep = :cep, endereco = :endereco, numero = :numero, 
            complemento = :complemento, bairro = :bairro, municipio = :municipio, estado = :estado 
            WHERE idcliente = :idcliente";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(":cep", $cliente->getCep(), PDO::PARAM_STR);
            $stmt->bindValue(":endereco", $cliente->getEndereco(), PDO::PARAM_STR);
            $stmt->bindValue(":numero", $cliente->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(":complemento", $cliente->getComplemento(), PDO::PARAM_STR);
            $stmt->bindValue(":bairro", $cliente->getBairro(), PDO::PARAM_STR);
            $stmt->bindValue(":estado", $cliente->getEstado(), PDO::PARAM_STR);
            $stmt->bindValue(":municipio", $cliente->getMunicipio(), PDO::PARAM_STR);
            $stmt->bindValue(":idcliente", $cliente->getIdcliente(), PDO::PARAM_STR);
            
            $stmt->execute();
            
        }catch(PDOException $error){
            $error->getMessage();
        }
    }

    
    function updatePassword(Cliente $cliente){

        try {
            $sql = "UPDATE cliente SET senhac = :senha WHERE emailc = :emailc";
            
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(":senha", md5($cliente->getSenhac()), PDO::PARAM_STR);
            $stmt->bindValue(":emailc", $cliente->getEmailc(), PDO::PARAM_STR);
            
            $stmt->execute();
            
        } catch (PDOException $error){
            $error->getMessage();
        }
    }


    function updateCard(Cliente $cliente){

        try {
            $sql = "UPDATE cliente SET cartaoc = :cartaoc, titular = :titular, validade = :validade WHERE idcliente = :idcliente";
            
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindParam(":cartaoc", $cliente->getCartaoc(), PDO::PARAM_STR);
            $stmt->bindParam(":validade", $cliente->getValidade(), PDO::PARAM_STR);
            $stmt->bindParam(":titular", $cliente->getTitular(), PDO::PARAM_STR);
            $stmt->bindParam(":idcliente", $cliente->getIdcliente(), PDO::PARAM_STR);
            
            $stmt->execute();
            
        } catch (PDOException $error){
            $error->getMessage();
        }
    }

    //excluir plano e assinatura
    public function cancelarAssinatura($idcliente){
        try {
            $sql = "UPDATE cliente SET cartaoc = NULL, validade = NULL, titular = NULL WHERE idcliente = $idcliente";

            Conexao::getConexao()->query($sql);

        } catch(PDOException $error) {
            $error->getMessage();
        }
    }

    public function cancelarPlano($idcliente){
        try {
            $sql = "UPDATE cliente SET plano = NULL WHERE idcliente = $idcliente";

            Conexao::getConexao()->query($sql);

        } catch(PDOException $error) {
            $error->getMessage();
        }
    }

    //gerar uma nova senha
    public function newPassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $senha = '';
     
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $senha .= $characters[$index];
        }
     
        return $senha;
    }

}

?>