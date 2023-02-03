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
        <title>Cadastro</title>
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
        <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <main>
            
            <!-- FORM CADASTRO -->
            <form id="form" onsubmit="return testCampos()" action="../../controller/ClienteController.php" method="post">
                
                <section id="secCabecalho">
                    <a href="../login/"><section id="iconBack"></section></a>
                    <section id="logo"><h2>CADASTRO ELETROTECH</h2></section>
                </section>
                <!-- PESSOAL -->
                <h2 class="titleInfo">Informações pessoais</h2>
                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">NOME COMPLETO:*</label>
                        <input type="text" name="nome" autocomplete="off" placeholder="Digite seu nome" maxlength="50" required />
                    </section>

                    <section class="secInput">
                        <label class="label">CPF:*</label>
                        <input type="text" id="inputCpf" name="cpf" autocomplete="off" placeholder="Digite seu CPF" required/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">E-MAIL:*</label>
                        <input type="text" id="inputEmail" name="email" autocomplete="off" placeholder="Digite seu e-mail" required />
                    </section>

                    <section class="secInput">
                        <label class="label">TELEFONE:*</label>
                        <input type="text" id="inputTel" name="celular" autocomplete="off" placeholder="Digite seu telefone" required/>
                    </section>
                </article>

                <!-- ENDEREÇO -->
                <h2 class="titleInfo">Endereço</h2>
                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">CEP:*</label>
                        <input id="inputCep" type="text"    name="cep" id="login" autocomplete="off" placeholder="Digite seu CEP" required />
                    </section>

                    <section class="secInput">
                        <label class="label">ENDEREÇO:*</label>
                        <input type="text" name="endereco" autocomplete="off" placeholder="Digite seu endereço" required/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">N°:*</label>
                        <input id="inputN°" type="text" name="numero" autocomplete="off" placeholder="Digite o número" required/>
                    </section>

                    <section class="secInput">
                        <label class="label">COMPLEMENTO:</label>
                        <input id="inputComplemento" type="text" name="complemento" autocomplete="off" placeholder="Digite o complemento"/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">BAIRRO:*</label>
                        <input type="text" name="bairro" autocomplete="off" placeholder="Digite o bairro" required/>
                    </section>

                    <section class="secInput">
                        <label class="label">MUNICÍPIO:*</label>
                        <input id="inputMunicipio" name="municipio" type="text" autocomplete="off" readonly/>
                    </section>
                </article>

                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">ESTADO:*</label>
                        <input type="text" name="estado" autocomplete="off" readonly/>
                    </section>
                </article>

                <!-- SENHA -->
                <h2 class="titleInfo">Criar senha</h2>
                <article class="artContainer">
                    <section class="secInput">
                        <label class="label">SENHA:*</label>
                        <input type="password" id="inputSenha" name="senha" autocomplete="off" placeholder="Crie uma senha" required/>
                    </section>

                    <section class="secInput">
                        <label class="label">CONFIRMAR SENHA:*</label>
                        <input type="password" id="inputConfSenha" autocomplete="off" placeholder="Confirme a senha" required/>
                    </section>
                </article>

                <input type="text"  name="cadastrar" style="display: none;">
                <button id="btn" class="btn">CADASTRAR</button>
            </form>
            
        </main>

        <!-- mask -->
        <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
        <!--  -->
        <script src="index.js"></script>
        <script src="api.js"></script>
    </body>
</html>