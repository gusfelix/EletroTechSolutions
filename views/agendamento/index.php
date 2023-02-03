<?php

session_start();

if(!isset($_SESSION['idcliente'])){
    header('Location: ../principalDeslogado/');
}

require_once('../../dao/AgendamentoDao.php');
require_once('../../config/Conexao.php');
require_once('../../dao/ClienteDao.php');

$agenda = new AgendamentoDao();
$cliente = new ClienteDao();

if($cliente->checkAssinatura($_SESSION['idcliente'])){
    $cliente->cancelarPlano($_SESSION['idcliente']);
}

$horas = $agenda->getTimes($_GET["data"]);
$plano = $cliente->getInfo($_SESSION['idcliente'])['plano'];

if($plano == 'MENSAL'){
    $valor = 87.99;
  
}else if($plano == 'SEMESTRAL'){
    $valor = 71.99;
  
}else if($plano == 'ANUAL'){
    $valor = 54.99;

}else{
    $valor = 109.99;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agendamento</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/6ad8afcd8c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <!-- JQUERY TOAST-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <!-- JS TOAST-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- CSS TOAST -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- ICON PAGE -->
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
        <!-- CSS -->
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <!-- HEADER -->
        <header>
            <a href="../principalLogado/" class="brand">
                <i class="fas fa-bolt"></i> EletroTech
            </a>
            <a href="../principalLogado/">
                <button class="btn">Voltar</button>
            </a>
        </header>

        <main id="mainBanner">
            <h2 id="title">Agendamento visita técnica</h2>
        </main>

        

        <main id="main">

            <form action="../../controller/AgendamentoController.php" onsubmit=" block(); toast()" method="post">

                <!-- data -->
                <section id="secCalendar">
                    <section id="secImgCalendar"></section>

                    <p id="titleData">Selecione uma data</p>

                    <input type="date" id="calendar" name="dia" onchange="setDia()" required>
                </section>
                
                <!-- hora -->
                <section id="secHora">
                    <section id="secImgHorario" onclick="chamaSelect()"></section>

                    <p id="titleHorario">Selecione um horário</p>

                    <select name="hora" id="select" required>
                        
                        <?php
                            if(sizeof($horas) > 0){
                                foreach($horas as $hora){
                                    echo '<option value="'. $hora .'">'. $hora .'</option>';
                                }
                                
                            }else{
                                echo '<option disabled style="color: #000">Não há horários para o dia selecionado</option>';
                            }
                        
                        ?>
                    </select>

                    <section id="iconArrow">
                        <i class="fa-solid fa-sort-down"></i>
                    </section>
                </section>
                
                <!-- serviço -->
                <article id="artOpcoes">

                    <section id="secImgServico"></section>

                    <p id="titleHorario">Selecione um serviço</p>

                    <article class="artSeparar">
                        <section class="secRadio">
                            <label for="opt1">
                                <input type="radio" id="opt1" name="descricao" value="Disjuntor" required>
                                Disjuntor
                            </label>
                        </section>

                        <section class="secRadio">
                            <label for="opt2">
                                    <input type="radio" id="opt2" name="descricao" value="Falta de energia">
                                    Falta de energia
                            </label>
                        </section>

                        <section class="secRadio">
                            <label for="opt3">
                                <input type="radio" id="opt3" name="descricao" value="Aterramento">
                                Aterramento
                            </label>
                        </section>

                        <section class="secRadio">             
                            <label for="opt4">
                                <input type="radio" id="opt4" name="descricao" value="Padrão de energia">
                                Padrão de energia
                            </label>
                        </section>

                        <section class="secRadio">
                            <label for="opt5">
                                <input type="radio" id="opt5" name="descricao" value="Instalação">
                                Instalação
                            </label>
                        </section>
                    </article>

                    <article class="artSeparar">
                        <section class="secRadio">                                   
                            <label for="opt6">
                                <input type="radio" id="opt6" name="descricao" value="Curto circuito">
                                Curto circuito
                            </label>
                        </section>

                        <section class="secRadio">
                            <label for="opt7">
                                <input type="radio" id="opt7" name="descricao" value="Tomadas">
                                Tomadas
                            </label>
                        </section>

                        <section class="secRadio">
                            <label for="opt8">
                                <input type="radio" id="opt8" name="descricao" value="Manutenção">
                                Manutenção
                            </label>
                        </section>

                        <section class="secRadio">
                            <label for="opt9">
                                <input type="radio" id="opt9" name="descricao" value="Outros">
                                Outros
                            </label>
                        </section>
                        
                        <input type="text" name="preco" value="<?= $valor?>" readonly hidden />
                    </article>    
                    
                </article>
                <label id="labelValor">R$ <?= $valor?></label>
                <input type="text" name="agendar" style="display: none;">
                <p style="width: 100%; text-align: center; margin-top: 15px">*Obs: Valor fixo apenas para visita</p>
                <button id="btnFinalizar" type="submit">Finalizar agendamento</button>

            </form>

                    
        </main>
        <script src="script.js"></script>

    </body>
</html>