<?php

session_start();

if(!isset($_SESSION['idcliente'])){
    header('Location: ../principalDeslogado/');
}

require_once('../../config/Conexao.php');
require_once('../../dao/ClienteDao.php');

$clienteDao = new ClienteDao();
$pendente = $clienteDao->countPendente($_SESSION['idcliente']);
$concluido = $clienteDao->countConcluido($_SESSION['idcliente']);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meus agendamentos</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
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

        <!-- BANNER -->
        <main id="mainBanner">
            <h2 id="title">Meus agendamentos</h2>
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
                
                if(sizeof($clienteDao->listarAgenda($_SESSION['idcliente'])) > 0){
                    
                    foreach($clienteDao->listarAgenda($_SESSION['idcliente']) as $consulta){
                        echo '                
                        <article class="artInfos" value="'. $consulta["status"] .'">

                            <section class="sections">
                                <label>'. substr($consulta["nomef"], 0, strpos($consulta["nomef"], ' ')) .'</label>
                            </section>
                            
                            <section class="sections">
                                <label>'. date("d/m/Y", strtotime($consulta["dia"])) .'</label>
                            </section>
                            
                            <section class="sections">
                                <label>R$ '. $consulta["preco"] .'</label>
                            </section>
                            
                            <section class="secUser"></section>
                            
                            <form action="../ordemServicoCliente/" method="get" class="btnOrdem">
                                <input type="text" name="idagenda" value="'. $consulta['idagenda'] .'" hidden>
                                <button class="btnOrdem ajustBtnHidden"></button>
                            </form>
                            
                        </article>';
                    }
                    
                }else{
                    echo '<h1>Você ainda não possui agendamentos</h1>';
                }
                ?>
            <main>
 
        </main>       

        <script src="script.js"></script>
    </body>

</html>