<?php

session_start();

if(!isset($_SESSION['idfunc'])){
    header('Location: ../principalDeslogado/');
}

require_once('../../config/Conexao.php');
require_once('../../dao/FuncionarioDao.php');

$funcDao = new FuncionarioDao();
$pendente = $funcDao->countPendente($_SESSION['idfunc']);
$concluido = $funcDao->countConcluido($_SESSION['idfunc']);


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meus serviços</title>
        <link rel="stylesheet" href="styles.css">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
    </head>

    <body>

        <!-- HEADER -->
        <header>
            <a href="#" class="brand">
                <i class="fas fa-bolt"></i> EletroTech
            </a>
            <a href="../../controller/FuncionarioController.php?logout=true">
                <button class="btn">Sair</button>
            </a>
        </header>

        <!-- BANNER -->
        <main id="mainBanner">
            <h2 id="title">Meus serviços hoje</h2>
        </main>

        <!-- MAIN -->
        <main>

            <article id="artStatus">

                <section id="check"></section>

                <article class="art">
                    <section class="agendamento">
                        <h3 class="title">PENDENTES</h3>
                        <h3 class="subTitle"><?= $pendente ?></h3>
                    </section>
                </article>

                <article class="art">
                    <section class="agendamento">
                        <h3 class="title">CONCLUÍDOS</h3>
                        <h3 class="subTitle"><?= $concluido ?></h3>
                    </section>
                </article>

            </article>
 
            <main id="mainInfos">
                <?php 
                if(sizeof($funcDao->listarAgenda($_SESSION['idfunc'])) > 0){
                    
                    foreach($funcDao->listarAgenda($_SESSION['idfunc']) as $consulta){
                    
                        echo '<article class="artInfos" value="'. $consulta["status"] .'">

                            <section class="sections">
                                '. substr($consulta["nomec"], 0, strpos($consulta["nomec"], ' ')) .'
                            </section>

                            <section class="sections">
                                '. $consulta['hora'] .'
                            </section>

                            <section value="'. $consulta['status'] .'" class="sections">
                                '. $consulta['status'] .'
                            </section>

                            <section class="secUser"></section>

                            <form action="../ordemServico/" method="get" class="btnOrdem">
                                <input type="text" name="idagenda" value="'. $consulta['idagenda'] .'" hidden>
                                <button class="btnOrdem ajustBtnHidden"></button>
                            </form>

                        </article>';
                    }
                    
                    
                }else{
                    echo '<h1 id="msg">Você não possui agendamentos no dia de hoje</h1>';
                }
                ?>
            </main>        

        </main>   

        <script src="script.js"></script>
    </body>

</html>