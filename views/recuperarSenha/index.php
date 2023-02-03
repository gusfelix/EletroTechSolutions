<?php

session_start();

if(isset($_SESSION['idfunc'])){
    header('Location: ../listAgenda/');
    
}else if(isset($_SESSION['idcliente'])){
    header('Location: ../principalLogado/');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Recuperar senha</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <!-- JQUERY TOAST-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <!-- JS TOAST-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- CSS TOAST -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="styles.css">
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
    </head>

    <body>
        <main>
            
            <!-- FORM LOGIN -->
            <form action="../../controller/ClienteController.php" onsubmit="block()" id="form" method="post">
                
                <section id="logo"></section>

                
                <label class="label">INFORME SEU E-MAIL</label>
                <input type="text" name="email" id="login" autocomplete="off" placeholder="Digite seu e-mail"  />
                
                <input type="text" name="recuperar" style="display: none;">
                <button class="btn" id="btnFinalizar" type="submit" >REDEFINIR SENHA</button>

            </form>

        </main>

        <script src="script.js"></script>
    </body>
</html>