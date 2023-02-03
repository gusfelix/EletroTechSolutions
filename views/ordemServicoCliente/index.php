<?php

session_start();

if(!isset($_SESSION['idcliente'])){
    header('Location: ../principalDeslogado/');
}

require_once('../../config/Conexao.php');
require_once('../../dao/AgendamentoDao.php');

$agendaDao = new AgendamentoDao();
$result = $agendaDao->getOrdemServico($_GET['idagenda']);

?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Ordem de serviço</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="styles.css">
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
    </head>

    <body>

        <!-- HEADER -->
        <header>
            <a href="../principalLogado" class="brand">
                <i class="fas fa-bolt"></i> EletroTech
            </a>
            <a href="../meusAgendamentos/">
                <button class="btn">Voltar</button>
            </a>
        </header>

        <!-- BANNER -->
        <main id="mainBanner">
            <h2 id="title">Ordem de serviço</h2>
        </main>

        <main>  
            <!-- FORM LOGIN -->
            <article id="form">
                
                <section id="logo"></section>

                <!-- ------------------- -->
                <!-- INFORMAÇÕES CLIENTE -->
                <h2 class="titleInfo">Informações do cliente</h2>
                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">NOME COMPLETO:</label>
                        <input type="text" value="<?= $result['nomec'] ?>" autocomplete="off" placeholder="Digite seu nome" disabled />
                    </section>

                    <section class="secInput">
                        <label class="label">CPF:</label>
                        <input type="text" value="<?= $result['cpfc'] ?>" autocomplete="off" placeholder="Digite seu CPF" disabled/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">TELEFONE:</label>
                        <input type="text" value="<?= $result['celularc'] ?>" autocomplete="off" placeholder="Digite seu telefone" disabled/>
                    </section>

                    <section class="secInput">
                        <label class="label">ENDEREÇO:</label>
                        <input type="text" value="<?= $result['endereco'] ?>" disabled/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">BAIRRO:</label>
                        <input type="text" value="<?= $result['bairro'] ?>" disabled/>
                    </section>

                    <section class="secInput">
                        <label class="label">MUNICÍPIO:</label>
                        <input type="text" value="<?= $result['municipio'] ?>" disabled/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">HORA VISITA:</label>
                        <input type="text" value="<?= $result['hora'] ?>" disabled/>
                    </section>

                    <section class="secInput">
                        <label class="label">DATA VISITA:</label>
                        <input type="text" value="<?= date("d/m/Y", strtotime($result['dia'])) ?>" disabled/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">PROBLEMA:</label>
                        <input type="text" value="<?= $result['descricao'] ?>" disabled/>
                    </section>
                </article>
                
                <!-- ----------------------- -->
                <!-- INFORMAÇÕES FUNCIONÁRIO -->
      
                    <h2 class="titleInfo">Informações do funcionário</h2>
                    <article class="artContainer">
                        <section class="secInput">
                            <label class="label">NOME COMPLETO:</label>
                            <input type="text" value="<?= $result['nomef'] ?>" disabled />
                        </section>

                        <section class="secInput">
                            <label class="label">TELEFONE:</label>
                            <input type="text" value="<?= $result['celularf'] ?>" disabled/>
                        </section>
                    </article>

                    <article class="artContainer">
                        <section class="secInput">
                            <label class="label">DESCRIÇÃO DA SOLUÇÃO:</label>
                            <textarea id="textArea" name="formf" placeholder="Descreva qual foi a solução" disabled><?= $result['formf'] ?></textarea>
                        </section>

                    </article>  
                    <input class="input_hidden" type="text" name="idagenda" value="<?= $_GET['idagenda']?>" hidden>

            </article>

        </main>
    
    </body>
</html>