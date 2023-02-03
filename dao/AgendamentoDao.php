<?php

class AgendamentoDao{

    public function agendar(Agendamento $agenda){
        
        try {
            
            $sql = "INSERT INTO agenda (idfun, idcliente, dia, hora, preco, descricao, status) VALUES
            (:idfun, :idcliente, :dia, :hora, :preco, :descricao, 'PENDENTE')";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(":idfun", $agenda->getIdfunc(), PDO::PARAM_STR);
            $stmt->bindValue(":idcliente", $agenda->getIdcliente(), PDO::PARAM_STR);
            $stmt->bindValue(":dia", $agenda->getDia(), PDO::PARAM_STR);
            $stmt->bindValue(":hora", $agenda->getHora(), PDO::PARAM_STR);
            $stmt->bindValue(":preco", $agenda->getPreco(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $agenda->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();


        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getTimes($data){
        try {
            date_default_timezone_set('america/sao_paulo');
            $dataAtual = date('Y-m-d');
            $horaAtual = date('H:i');

            $sql = "SELECT COUNT(hora), hora FROM agenda WHERE dia = '$data' GROUP BY(hora) ORDER BY hora ASC";
            $stmt = Conexao::getConexao()->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $sql = "SELECT COUNT(idfun) FROM funcionario WHERE ativo = 1";
            $stmt = Conexao::getConexao()->query($sql);
            $numFunc = $stmt->fetch(PDO::FETCH_COLUMN);
    
            $horarios = ['07:00', '10:00', '13:00', '16:00'];
    
            foreach($result as $hora){
                
                if($hora['COUNT(hora)'] >= $numFunc){

                    unset($horarios[array_search($hora['hora'], $horarios)]);
                }
            }

            if($data == $dataAtual){

                foreach($horarios as $hora){
                    
                    if($hora < $horaAtual){
    
                        unset($horarios[array_search($hora, $horarios)]);
                    }
                }
            }
    
            return $horarios; 

        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getIdFunc($dia, $hora){
        try {

            $sql = "SELECT func.idfun FROM 
            agenda AS ag INNER JOIN 
            funcionario AS func ON ag.idfun = func.idfun
            WHERE ag.dia = '$dia' AND ag.hora = '$hora'";

            $stmt = Conexao::getConexao()->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $sql = "SELECT idfun FROM funcionario WHERE ativo = 1";

            $stmt = Conexao::getConexao()->query($sql);
            $funcionarios = $stmt->fetchAll(PDO::FETCH_COLUMN);

            
            foreach($result as $func){
                if(in_array($func['idfun'], $funcionarios)){
                    unset($funcionarios[array_search($func['idfun'], $funcionarios)]);
                }
            }
            
            return $funcionarios;
            
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getOrdemServico($idagenda){

        try {

            $sql = "SELECT c.nomec, c.celularc, c.cpfc, c.endereco, c.bairro, c.municipio, ag.hora, ag.dia, ag.descricao, ag.formf, func.nomef, func.celularf FROM 
            cliente AS c INNER JOIN 
            agenda AS ag ON c.idcliente = ag.idcliente INNER JOIN 
            funcionario AS func ON ag.idfun = func.idfun WHERE ag.idagenda = :idagenda";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":idagenda", $idagenda, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            $error->getMessage();
        }

    }

    public function setOrdemServico(Agendamento $agenda){
        try {
            $sql = "UPDATE agenda SET formf = :formf, status = 'CONCLUIDO' WHERE idagenda = :idagenda";
            
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":idagenda", $agenda->getIdagenda(), PDO::PARAM_INT);
            $stmt->bindValue(":formf", $agenda->getForm(), PDO::PARAM_STR);

            $stmt->execute();

        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

}
