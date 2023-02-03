<?php

class FuncionarioDao{

    public function listarAgenda($idfunc){

        try {
            date_default_timezone_set('america/sao_paulo');
            $data = date('Y-m-d');

            $sql = "SELECT c.nomec, ag.hora, ag.dia, ag.status, ag.idagenda FROM 
            cliente AS c INNER JOIN 
            agenda AS ag ON c.idcliente = ag.idcliente INNER JOIN 
            funcionario AS func ON ag.idfun = func.idfun WHERE ag.idfun = :idfunc AND ag.dia = '$data' ORDER BY ag.hora" ;

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":idfunc", $idfunc, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function login(Funcionario $func){
        try{
            $sql = "SELECT * FROM funcionario WHERE emailf = :email";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":email", $func->getEmailf(), PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1){

                if(md5($func->getSenhaf()) == $result['senhaf'] && $result['ativo']){
    
                    session_start();
    
                    $_SESSION['idfunc'] = $result['idfun'];
                    $_SESSION['email'] = $result['emailf'];
    
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

		unset($_SESSION['idfunc']);

		return true;
    }

    public function checkLogin(){

        return isset($_SESSION['idfunc']);
    }

    public function checkEmail($email){

        $sql = "SELECT emailf FROM funcionario";

        $stmt = Conexao::getConexao()->query($sql);
        $array_emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return in_array($email, $array_emails);
    }

    public function checkCPF($cpf){

        $sql = "SELECT cpff FROM funcionario";

        $stmt = Conexao::getConexao()->query($sql);
        $array_cpf = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return in_array($cpf, $array_cpf);
    }

    public function checkCelular($celular){

        $sql = "SELECT celularf FROM funcionario";

        $stmt = Conexao::getConexao()->query($sql);
        $array_celular = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return in_array($celular, $array_celular);
    }

    public function countPendente($idfunc){
        try {
            date_default_timezone_set('america/sao_paulo');
            $data = date('Y-m-d');
            
            $sql = "SELECT COUNT(idfun) FROM agenda WHERE status = 'PENDENTE' AND idfun = $idfunc AND dia = '$data'";
    
            $stmt = Conexao::getConexao()->query($sql);
    
            return $stmt->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException $error) {
            $error->getMessage();
        }

    }

    public function countConcluido($idfunc){ 
        
        try {
            date_default_timezone_set('america/sao_paulo');
            $data = date('Y-m-d');
    
            $sql = "SELECT COUNT(idfun) FROM agenda WHERE status = 'CONCLUIDO' AND idfun = $idfunc AND dia = '$data'";
    
            $stmt = Conexao::getConexao()->query($sql);
    
            return $stmt->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException $error) {
            $error->getMessage();
        }          
    }
}

?>