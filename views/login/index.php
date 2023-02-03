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
        <title>Login</title>
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
        <main>
            
            <!-- FORM LOGIN -->
            <form onsubmit="return validLogin()" id="form" action="../../controller/LoginController.php" method="post" name="entrar">
                
                <section id="logo"></section>

                
                <label class="label">E-MAIL:</label>
                <input type="text" name="email" id="login" autocomplete="off" placeholder="Digite seu e-mail"  />

                <label class="label">SENHA:</label>
                <input type="password" name="senha" id="senha" autocomplete="off" placeholder="Digite sua senha"/>
                <h4 id="resetPassword"><a href="../recuperarSenha/">Esqueceu sua senha?</a></h4>
                <svg onclick="olho()" id="olho" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                </svg>

                <input type="text"  name="login" style="display: none;">
                <button onclick="" class="btn" id ="btnLogin">ENTRAR</button>

                <h4>Não tem uma conta? <a href="../cadastro/">Criar conta</a></h4>

            </form>

        </main>

        <!-- JS -->
        <script src="script.js"></script>
    </body>
</html>