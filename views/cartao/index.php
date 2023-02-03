<?php

session_start();

if(!isset($_SESSION['idcliente'])){
  header('Location: ../principalDeslogado/');
}

if($_GET['plano'] == 'MENSAL'){
  $plano = 'Bronze Mensal';
  $valor = 'R$ 49,99/mês';

}else if($_GET['plano'] == 'SEMESTRAL'){
  $plano = 'Silver Semestral';
  $valor = 'R$ 269,99/semestre';

}else if($_GET['plano'] == 'ANUAL'){
  $plano = 'Gold Anual';
  $valor = 'R$ 499,00/ano';
}

?>

<!DOCTYPE html>
<html lang="pt-br">


  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagamento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
    <!-- JQUERY TOAST-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- JS TOAST-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- CSS TOAST -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
    <link rel="stylesheet" href="stylesCartao1.css">
    <link rel="stylesheet" href="stylesCartao2.css">
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

    <section id="secInfos">
      <section id="imgIcon"></section>
      <h3><?= $plano?></h3>
      <h3><?= $valor?></h3>
    </section>

    <div id="app">

      <section>
        <img src="../../img/logo_login.png" alt="ícone" style="width: 40px;"/>
      </section>

      <!-- input -->
      <form action="../../controller/ClienteController.php" onsubmit="return testCartao()" method="post">

        <input type="text" name="plano" value="<?= $_GET['plano']?>" hidden>
        <div class="input-wrapper">
          <label for="card-number">Número do cartão</label>
          <input type="text" name="num_cartao" class="input" id="inputNumber" required/>
        </div>

        <div class="input-wrapper">
          <label for="card-holder">Nome do titular</label>
          <input id="inputNome" name="titular" class="input" maxlength="25" required/>
        </div>

        <div class="flex">
          <div class="input-wrapper">
            <label for="expiration-date">Expiração</label>
            <input id="inputData" name="validade" class="input" required/>
          </div>

          <div class="input-wrapper">
            <label for="security-code">CVV</label>
            <input id="inputCvv" class="input" required/>
          </div>
        </div>

        <button id="add-card" name="assinar">FINALIZAR COMPRA</button>
      </form>

      <!-- cartão -->
      <div id="card">
        <label id="number">0000 0000 0000 0000</label>

        <div>
          <label class="title">Nome do titular</label> <br>
          <label id="nome" class="subTitle">Seu nome completo</label>
        </div>

        <div id="divCvv">
          <div>
            <label class="title">Data validade</label> <br>
            <label class="subTitle" id="data">00/00</label>
          </div>
          <div style="margin-left: 70px;">
            <label class="title">CVV</label> <br>
            <label class="subTitle" id="cvv">123</label>
          </div>
          <div style="margin-left: 70px;">
            <section id="imgChip"></section>
          </div>
        </div>
      </div>
    </div>
    
    <!-- mask -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="script.js"></script>
    

  </body>
</html>