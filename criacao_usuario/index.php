<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <link rel="stylesheet" href="/common/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="/common/stylesheets/bootstrap4.css">
    <link rel="stylesheet" href="/common/stylesheets/animate.css">
    <link rel="stylesheet" href="/common/stylesheets/style.css">
    <link rel="stylesheet" href="/common/stylesheets/style1.css">
</head>

<body>
<div id="page">
  <nav class="fh5co-nav" id="menu-list" role="navigation">
      <div id="menu"></div>
  </nav>
  <div class="container-fluid" style="padding-top:60px;">
    <div class="row">
      <form method="post" action="index.php" class="col-md-12">
      
        <h1>Novo usuário</h1>
        <p>Preencha os campos abaixo para criar um novo usuário.</p>
        
        <div class="row form-group">
          <div class="col-md-6">
            <label for="Nome"><b>Nome Completo</b></label>
            <input class="form-control" type="text" placeholder="Digite o nome e sobrenome..." name="Nome" required>
          </div>
          
          <div class="col-md-3">
            <label><b>Sexo:</b></label><br>
            <div class="custom-control custom-radio custom-control-inline">
              <input class="custom-control-input" type="radio" name="sexo" id="s1" value="M"> 
              <label for="s1" class="custom-control-label" style="padding-left:10px;">Masculino</label> 
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input class="custom-control-input" type="radio" name="sexo" id="s2" value="F"> 
              <label for="s2" class="custom-control-label" style="padding-left:10px;">Feminino</label> 
            </div>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label for="email"><b>Email</b></label>
            <input class="form-control" type="text" placeholder="Digite seu Email..." name="email" required>
          </div>
          <div class="col-md-6">
            <label for="senha"><b>Senha</b></label>
            <input class="form-control" type="password" placeholder="Digite sua senha..." name="senha" required>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label for="confirma_senha"><b>Confirmação de senha</b></label>
            <input class="form-control" type="password" placeholder="Digite novamente sua senha..." name="confirma_senha" required>
          </div>
          
          <div  class="col-md-6" style="margin-top:4em;">
            <div class="col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input class="custom-control-input" type="radio" name="nivel" id="n1" value="1"> 
                <label for="n1" class="custom-control-label" style="padding-left:10px;">Atleta</label> 
              </div>
            </div>
            <div class="col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input class="custom-control-input" type="radio" name="nivel" id="n2" value="2"> 
                <label for="n2" class="custom-control-label" style="padding-left:10px;">Técnico</label> 
              </div>
            </div>
            <div class="col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input class="custom-control-input" type="radio" name="nivel" id="n3" value="3"> 
                <label for="n3" class="custom-control-label" style="padding-left:10px;">DM</label> 
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-2 col-md-push-10">
            <button type="button" class="btn btn-primary">Cancelar</button>
          </div>
          <div class="form-group col-md-2 col-md-push-9">
            <button type="button" class="btn btn-primary">Criar</button>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>

<!-- jQuery -->
<script src="/common/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/common/js/bootstrap.min.js"></script>
<!-- Placeholder -->
<script src="/common/js/jquery.placeholder.min.js"></script>
<!-- Waypoints -->
<script src="/common/js/jquery.waypoints.min.js"></script>
<!-- Main JS -->
<script src="/common/js/main.js"></script>
<script>
    $("#menu").load("../common/menu/menu.html #menu_");
</script>
</body>
</html>

<?php

if ($_POST){
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];
  $con = mysqli_connect('localhost', 'root', '', 'sistema_wetrats');
  $sql = "INSERT INTO usuarios (nome,sexo,email,senha,Nivel) VALUES ('".$nome."','".$sexo."','".$email."','".$senha."','".$nivel."')";
  $query = mysqli_query($con,$sql);
  echo "$sql";
  }
?>