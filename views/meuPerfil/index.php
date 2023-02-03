<?php 

session_start();

if(!isset($_SESSION['idcliente'])){
    header('Location: ../principalDeslogado/');
}

require_once('../../config/Conexao.php');
require_once('../../dao/ClienteDao.php');

$cliente = new ClienteDao();

if($cliente->checkAssinatura($_SESSION['idcliente'])){
    $cliente->cancelarPlano($_SESSION['idcliente']);
}

$dados = $cliente->getInfo($_SESSION['idcliente']);

$nome = $dados['nomec'];
$plano = $dados['plano'];

if($dados['dataAssinatura'] != NULL){

    date_default_timezone_set('america/sao_paulo');
    $vencimento = new DateTime($dados['dataAssinatura']);

    if($plano == 'MENSAL'){
      $planoStr = 'Bronze Mensal';
      $valor = 'R$ 49,99/mês';
      $vencimento = $vencimento->modify('+1 month');
      
    }else if($plano == 'SEMESTRAL'){
        $planoStr = 'Silver Semestral';
        $valor = 'R$ 269,99/semestre';
        $vencimento = $vencimento->modify('+6 month');
        
    }else if($plano == 'ANUAL'){
        $planoStr = 'Gold Anual';
        $valor = 'R$ 499,00/ano';
        $vencimento = $vencimento->modify('+12 month');
        
    }

    $vencimento = $vencimento->format('Y-m-d');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
        <title>Meu perfil</title>
        <!-- CSS -->
        <link rel="stylesheet" href="styles.css">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <!-- JQUERY TOAST-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <!-- JS TOAST-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- CSS TOAST -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        
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
            <h2 id="title">Meu perfil</h2>
        </main>

        <!-- CARD INFOS -->
        <main id="mainLinks">

            <article id="artLinks">
                <section id="secLetrasPerfil">
                    <h4><?= strtoupper(mb_substr($nome, 0, 1))?></h4>
                </section>
                <h3><?= $nome ?></h3>

                <section id="secLinksPerfil">
                    <a onclick="chamaPerfil()"><i class="fa-solid fa-id-card-clip"></i><p>Alterar perfil</p></a>
                    <a onclick="chamaEndereco()"><i class="fa-solid fa-location-dot"></i><p>Alterar endereço</p></a>
                    <a onclick="chamaSenha()"><i class="fa-solid fa-key"></i><p>Alterar senha</p></a>
                    <a onclick="chamaCartao()"><i class="fa-sharp fa-solid fa-credit-card"></i><p>Alterar cartão</p></a>
                    <a onclick="chamaPlano()"><i class="fa-solid fa-hand-holding-dollar"></i><p>Detalhes do plano</p></a>
                </section>
            </article>

            <!-- Perfil -->
            <form action="../../controller/ClienteController.php" onsubmit="return testPerfil()" method="post" id="artPerfilInput">
                <h2>Alterar meus dados</h2>
                <section class="secInput">
                    <label for="">Nome:</label>
                    <input type="text" name="nomec" id="inputNome" placeholder="Digite seu nome" value="<?= $dados['nomec'] ?>" maxlength="50" required>
                </section>

                <section class="secInput">
                    <label for="">Celular: </label>
                    <input type="text" id="inputTel" placeholder="Digite seu celular" name="celularc" value ="<?= $dados['celularc'] ?>"  required>
                </section>

                <section class="secInput">
                    <label for="">Email: </label>
                    <input type="text" name="emailc" value ="<?= $dados['emailc'] ?>" disabled>
                </section>

                <section class="secInput">
                    <label for="">CPF: </label>
                    <input type="text" name="cpfc" value ="<?= $dados['cpfc'] ?>" disabled>
                </section>

                <input type="text"  name="update-info" style="display: none;">
                <button class="btnSalvar">Salvar</button>

            </form>

            <!-- Endereço -->
            <form action="../../controller/ClienteController.php" onsubmit="return testEndereco()" method="post" id="artEnderecoInput">
                <h2>Alterar endereço</h2>
                <section class="secInput">
                    <label for="">CEP:</label>
                    <input type="text" id="inputCep" placeholder="Digite seu CEP" name="cep" value="<?= $dados['cep'] ?>" required>
                </section>

                <section class="secInput">
                    <label for="">Endereço: </label>
                    <input type="text" id="inputEndereco" placeholder="Digite seu endereço" name="endereco" value="<?= $dados['endereco'] ?>" maxlength="70" required>
                </section>

                <section class="secInput">
                    <label for="">Número: </label>
                    <input type="text" id="inputN°" placeholder="Digite o número" name="numero" value="<?= $dados['numero'] ?>" required>
                </section>

                <section class="secInput">
                    <label for="">Complemento: </label>
                    <input type="text" name="complemento" value="<?= $dados['complemento'] ?>" maxlength="15">
                </section>

                <section class="secInput">
                    <label for="">Bairro: </label>
                    <input type="text" name="bairro" value="<?= $dados['bairro'] ?>" required>
                </section>

                <section class="secInput">
                    <label for="">Município: </label>
                    <input type="text" name="municipio" value="<?= $dados['municipio'] ?>" readonly>
                </section>

                <section class="secInput">
                    <label for="">Estado: </label>
                    <input type="text" name="estado" value="<?= $dados['estado'] ?>" readonly>
                </section>

                <input type="text" name="update-adress" style="display: none;">
                <button class="btnSalvar">Salvar</button>

            </form>

            <!-- Senha -->
            <form action="../../controller/ClienteController.php" onsubmit="return testSenha(); block()" method="post" id="artSenhaInput">
                <h2>Alterar senha</h2>
                <section class="secInput">
                    <label for="">Senha antiga:</label>
                    <input type="password" placeholder="Digite sua senha antiga" id="inputSenhaAntiga" name="senha-antiga">
                </section>

                <section class="secInput">
                    <label for="">Nova senha: </label>
                    <input type="password" placeholder="Digite sua nova senha" id="inputSenha" name="senha-nova">
                </section>

                <section class="secInput">
                    <label for="">Confirme nova senha: </label>
                    <input type="password" placeholder="Confirme sua nova senha" id="inputConfSenha">
                </section>

                <input type="text"  name="update-password" style="display: none;">
                <button class="btnSalvar">Salvar</button>

            </form>


            <!-- Cartão -->
            <form action="../../controller/ClienteController.php" onsubmit="return testCartao(); block()" method="post" id="artCartaoInput">
                <h2>Alterar cartão</h2>
                <section class="secInput">
                    <label for="">Número do cartão:</label>
                    <input type="text" placeholder="Digite o número" id="inputNumberCartao" name="num_cartao">
                </section>

                <section class="secInput">
                    <label for="">Nome do titular: </label>
                    <input type="text" placeholder="Digite o nome do titular" id="inputNomeCartao" name="titular" maxlength="50">
                </section>

                <section class="secInput">
                    <label for="">Data validade: </label>
                    <input type="text" placeholder="Digite a validade" id="inputDataCartao" id="inputData" name="validade">
                </section>

                <section class="secInput">
                    <label for="">CVV: </label>
                    <input type="text" placeholder="Digite o CVV" id="inputCvv">
                </section>

                <input type="text"  name="update-card" style="display: none;">

                <a>
                    <button class="btnSalvar">Salvar</button>
                </a>
            </form>

            <!-- Plano -->
            <article id="artPlanoInput">
                <?php
                    if($dados['plano'] == NULL){

                        echo '<h2 style="text-align: center">Você ainda não possui um assinatura ativa</h2>';

                    }else{
                        echo '
                        <h1>'. $planoStr .'</h1>
                        <h3 style="text-align: center">Sua assinatura vai até '. date("d/m/Y", strtotime($vencimento)) .'</h3>';

                        if($dados['cartaoc'] != NULL){
                            echo '
                                <form onsubmit="return testPlano(); block()" style="display: flex; flex-direction: column; align-items: center; gap: 30px" action="../../controller/ClienteController.php" method="post">

                                    <section class="secInput">
                                        <label for="">Senha:</label>
                                        <input type="password" placeholder="Digite sua senha" id="inputPlano" name="senha" required>
                                    </section>
                                    <input type="text"  name="cancelar" style="display: none;">
                                    <a>
                                        <button class="btnSalvar" style="font-size: 11pt !important; background-color: red">Cancelar assinatura</button>
                                    </a>
                
                                </form>
                            ';
                        }
                    }
                
                ?>
                
            </article>

        </main>


        <!-- mask -->
        <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

        <script src="api.js"></script>
        <script src="index.js"></script>

        <!-- FONTAWESOME -->
        <script src="https://kit.fontawesome.com/6ad8afcd8c.js" crossorigin="anonymous"></script>
    </body>
</html>