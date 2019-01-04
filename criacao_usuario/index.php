<head>
  <link rel="stylesheet" type="text/css" href="../common/stylesheets/styles.css">
</head>

<form method = "post" action="index.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Novo usuário</h1>
    <p>Preencha os campos abaixo para criar seu perfil.</p>
    <hr>

    <label for="nome"><b>Nome Completo</b></label>
    <input type="text" placeholder="Digite seu nome e sobrenome..." name="nome" required>

    <label>
      <input type="radio" name="sexo" value="M"> Masculino <br>
      <input type="radio" name="sexo" value="F"> Feminino <br>
    </label>

    
    <label for="Data de Nascimento"><b>Data de Nascimento</b></label>
    <input type="date" name="data_de_nascimento" min="1979-12-31" max=" 2004-12-31" required><br>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Digite seu Email..." name="email" required>

    <label for="senha"><b>Senha</b></label>
    <input type="password" placeholder="Digite sua senha..." name="senha" required>

    <label for="confirma_senha"><b>Confirmação de senha</b></label>
    <input type="password" placeholder="Digite novamente sua senha..." name="confirma_senha" required>

    <label for="celular"><b>Celular</b></label>
    <input type="text" placeholder="Digite seu número de celular..." name="celular" required>

    <label for="RG"><b>RG</b></label>
    <input type="text" placeholder="Digite seu RG..." name="RG" required>

    <label for="Número USP"><b>Número USP</b></label>
    <input type="text" placeholder="Digite seu Número USP..." name="NUSP" >

    <label for="Endereço"><b>Endereço</b></label>
    <input type="text" placeholder="Digite seu Endereço..." name="endereco" >

    <label>
      <input type="radio" name="nivel" value="1"> Atleta <br>
      <input type="radio" name="nivel" value="2"> Técnico <br>
      <input type="radio" name="nivel" value="3"> DM <br>
    </label>


    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancelar</button>
      <input type="submit" class="signupbtn">Criar</>
    </div>
  </div>
</form>

<?php

if ($_POST){
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $data_de_nascimento = $_POST['data_de_nascimento'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $celular = $_POST['celular'];
  $RG = $_POST['RG'];
  $NUSP = $_POST['NUSP'];
  $endereco = $_POST['endereco'];
  $nivel = $_POST['nivel'];
  $con = mysqli_connect('localhost', 'root', '', 'sistema_wetrats');
  $sql = "INSERT INTO usuarios (nome,sexo,data_de_nascimento,email,senha,celular,RG,NUSP,endereco,Nivel) VALUES ('".$nome."','".$sexo."','".$data_de_nascimento."','".$email."','".$senha."','".$celular."','".$RG."','".$NUSP."','".$endereco."','".$nivel."')";
  $query = mysqli_query($con,$sql);
  echo "$sql";
  }
?>