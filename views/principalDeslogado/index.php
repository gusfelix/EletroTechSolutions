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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EletroTech</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- CSS do projeto -->
  <link rel="stylesheet" href="styles.css">
  <link rel="shortcut icon" href="../../img/logo_login.png" type="image/x-icon">
</head>
<body>

  <!-- MENU LATERAL-->
  <main id="mainMenu" onclick="barraLateral()" >
    <section id="secMenu">
      <a href="../login/"><h4>Realizar login</h4></a>
      <a href="../cadastro/"><h4>Cadastrar-se</h4></a>
    </section>
    <p id="email">solutionseletrotech@gmail.com</p>
  </main>

  <!-- --------- -->
  <!-- Cabeçalho -->
  <!-- --------- -->
  <header id="main-banner">
    <div class="nav-container">
      <a href="#" class="brand">
        <i class="fas fa-bolt"></i> EletroTech
      </a>
      <nav>
        <ul class="nav-container-navbar">
          <li>
            <a href="#main-banner">Home</a>
          </li>
          <li>
            <a href="#servicos">Serviços</a>
          </li>
          <li>
            <a href="#planos">Planos</a>
          </li>
          <li>
            <a href="../login/" class="btn btn-primary">Entrar</a>
          </li>
          <li>
            <a href="../cadastro/" class="btn">Registrar</a>
          </li>
        </ul>
      </nav>
      <i class="fas fa-bars" id="sanduiche" onclick="barraLateral()"></i>
    </div>
    <div class="title-container">
      <h2>EletroTech Solutions</h2>
      <h1>Experiência no Mercado</h1>
      <a href="../login/" class="btn btn-primary btn-rounded">Realizar Agendamento</a>
    </div>
  </header>


  <!-- -------- -->
  <!-- Serviços -->
  <!-- -------- -->
  <i id="servicos"></i>
  <main class="services-container">
    <h2>Nossos serviços</h2>
    <div class="services-card-container">
      <div class="services-card">
        <i class="fab fa-buffer"></i>
        <h3>Quadros e painéis</h3>
        <p>Possuímos profissionais com alto conhecimento técnico para a instalação ou manutenção de painéis/caixas de distribuições residenciais e empresariais.</p>
      </div>
      <div class="services-card">
        <i class="fas fa-bolt"></i>
        <h3>Alta tensão</h3>
        <p>Nossos empregados são altamente treinados, e seguem à risca nossas políticas de segurança. Afim de garantir a sua segurança, e a nossa.</p>
      </div>
      <div class="services-card">
        <i class="fas fa-cart-plus"></i>
        <h3>Vendas</h3>
        <p>Caso esteja precisando de algum dispositivo elétrico, basta ligar ou entrar em contato pelo nosso e-mail, que logo mandaremos um orçamento inicial dos produtos.</p>
      </div>
      <div class="services-card">
        <i class="fas fa-chart-line"></i>
        <h3>Manutenção</h3>
        <p>Como de praxe, é fundamental que qualquer rede elétrica passe por reavaliações periódicas, para que, o problema não seja maior no futuro. Nós trabalhamos com manutenções pontuais, preventivas e preditiva.</p>
      </div>
      <div class="services-card">
        <i class="fas fa-chess-pawn"></i>
        <h3>Estratégias elétricas</h3>
        <p>Com nossos engenheiros, somos capazes de determinar ou realizar o cabeamento mais adequado possível ao se planejar uma casa. Entre em contato para mais informações.</p>
      </div>
      <div class="services-card">
        <i class="fas fa-cloud"></i>
        <h3>Aterramento</h3>
        <p>O Aterramento é fundamental para qualquer residência, principalmente para locais que possuem um grande risco de tempestade, ou que passem por constantes inconsistências elétricas.</p>
      </div>
    </div>
    <a href="#" class="btn btn-primary btn-rounded">Consultar agora</a>
  </main>

  <!-- ---- -->
  <!-- Jobs -->
  <!-- ---- -->
  <div class="jobs-container">
    <h2>Alguns de nossos trabalhos</h2>
    <div class="jobs-list">
      <div class="first-job" id="job1">
        <div class="job-card-cover">
          <p class="job-card-title">Disjuntores</p>
          <p class="job-card-description">Trabalhamos com a instalação e manutenção de Disjuntores, que são uma parte essencial para qualquer rede elétrica doméstica e empresarial. Com a importante missão de desligar a energia automaticamente caso ocorra um curto-circuito ou sobrecarga.</p>
        </div>
      </div>
      <div class="other-jobs-container">
        <div class="job-card" id="job2">
          <div class="job-card-cover">
            <p class="job-card-title">Instalação</p>
            <p class="job-card-description">Caso você esteja planejando realizar uma mudança, ou construir a tão amada casa dos sonhos, sempre busque os melhores profissionais para acompanhar o processo, e para isso, nós possuímos nossos profissionais capacitados para realizar a instalação de qualquer dispositivo elétrico.</p>
          </div>
        </div>
        <div class="job-card" id="job3">
          <div class="job-card-cover">
            <p class="job-card-title">Painéis</p>
            <p class="job-card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque amet maxime nostrum quaerat. Nihil officia similique excepturi voluptas perspiciatis, odit veritatis cum, dolores adipisci deserunt deleniti nemo repellendus optio eius.</p>
          </div>
        </div>
        <div class="job-card" id="job4">
          <div class="job-card-cover">
            <p class="job-card-title">Vendas</p>
            <p class="job-card-description">Trabalhamos com as vendas de diversos produtos com certificado de qualidade e aprovação da clientela por todo o Brasil. Filtros de linha, Fontes, Ar-condicionado, dentre outros. Caso tenha se interessado, entre em contato.</p>
          </div>
        </div>
        <div class="job-card" id="job5">
          <div class="job-card-cover">
            <p class="job-card-title">Rede elétrica</p>
            <p class="job-card-description">Também fornecemos serviços para terceiros e operadoras de Internet. E caso seja necessário, nossos operadores são capacitados para realizar manutenção ou instalações em residências por meio dos postes de eletricidade, seguindo todas as normas de segurança que estabelecemos.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- -------- -->
  <!-- Planos -->
  <!-- -------- -->
  <i id="planos"></i>
  <main class="services-container">
    <h2>Nossos planos</h2>
    <div class="services-card-container">
      <div class="services-card radius">
        <section class="iconCusto2"></section>
        <h3>Bronze Mensal</h3>
        <h3>R$ 49,99</h3>
        <p class="justify">
            Plano mensal para empresas que estão conhecendo nossos serviços, pague R$49,99 por mês
            para ter nossos serviços pelo preço integral de consulta presencial dos funcionários de 
            R$ 87,99. Cancelamento a qualquer momento, contanto com profissionais experientes e podendo 
            fazer o upgrade gratuito a qualquer momento!
        </p>
        <br><br>
        <a href="../login/" class="btn btn-primary marginTop">CONTRATAR</a>
      </div>
      <div class="services-card radius shadow">
        <section class="iconCusto"></section>
        <h3>Gold Anual</h3>
        <h3>R$ 569,99</h3>
        <p class="justify">
          Plano para empresas seguras, que possuem uma estrutura de qualidade e que contam com os serviços
          da EletroTech. O valor anual é de R$ 569,99 havendo um desconto de 50% em visitas técnicas realizadas
          por especialistas, saindo a R$54,99! Segurança e qualidade, é na EletroTech.
        </p>
        <br><br>
        <a href="../login/" class="btn btn-primary marginTop">CONTRATAR</a>
      </div>
      <div class="services-card radius">
        <section class="iconCusto2"></section>
        <h3>Silver Semestral</h3>
        <h3>R$ 279,99</h3>
        <p class="justify">
          Plano perfeito para as empresas que estão confiando seus recursos a nossos profissionais, e 
          garantindo cada vez mais segurança! Plano em que custará R$71,99 ao semestre, tendo desconto de 35% no 
          preço integral para visitas técnicas presenciais de funcionários.
        </p>
        <br><br>
        <a href="../login/" class="btn btn-primary marginTop">CONTRATAR</a>
      </div>
    </div>
  </main>

  <!-- ------ -->
  <!-- Footer -->
  <!-- ------ -->
  <footer>
    <div class="footer-container">
      <div class="footer-desc-container">
        <h3 class="footer-title">eTech</h3>
        <p>
          Tel.: (31) 98833-1211 / (31) 3435-0099 <br> Email: solutionseletrotech@gmail.com <br> Endereço: Av. Afonso Pena, 1500 - BH/MG
        </p>

        </div>
      <div class="footer-links-container">
        <div class="footer-links-container-list">
          <p class="footer-title">Links</p>
          <ul>
            <li>
              <a href="#">Base de conhecimentos</a>
            </li>
            <li>
              <a href="#">Trabalhe Conosco</a>
            </li>
            <li>
              <a href="#">Últimos Projetos</a>
            </li>
            <li>
              <a href="#">Política de Privacidade</a>
            </li>
            <li>
              <a href="#">Contato</a>
            </li>
          </ul>
        </div>
        <div class="footer-links-container-list">
          <p class="footer-title">Links</p>
          <ul>
            <li>
              <a href="#">Base de conhecimentos</a>
            </li>
            <li>
              <a href="#">Trabalhe Conosco</a>
            </li>
            <li>
              <a href="#">Últimos Projetos</a>
            </li>
            <li>
              <a href="#">Política de Privacidade</a>
            </li>
            <li>
              <a href="#">Contato</a>
            </li>
          </ul>
        </div>
        <div class="footer-links-container-list">
          <p class="footer-title">Links</p>
          <ul>
            <li>
              <a href="#">Base de conhecimentos</a>
            </li>
            <li>
              <a href="#">Trabalhe Conosco</a>
            </li>
            <li>
              <a href="#">Últimos Projetos</a>
            </li>
            <li>
              <a href="#">Política de Privacidade</a>
            </li>
            <li>
              <a href="#">Contato</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-copy-right-container">
        <p>&copy; 2021 eTech</p>
        <p>Os melhores eletricistas para os seus projetos</p>
      </div>
    </div>
  </footer>

  <script src="index.js"></script>

</body>
</html>