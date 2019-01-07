<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <link rel="stylesheet" href="/common/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="/common/stylesheets/bootstrap4.css">
    <link rel="stylesheet" href="/common/stylesheets/animate.css">
    <link rel="stylesheet" href="/common/stylesheets/style.css">
    <link rel="stylesheet" href="/common/stylesheets/style1.css">
</head>
<?php
 //Inicia uma sessão
  session_start();
  $id_usuario = $_SESSION['ID'];
  $nivel_usuario = $_SESSION['Nivel'];
  // Conexão com o servidor MySQL
  $con = mysqli_connect('localhost', 'root', '', 'sistema_wetrats');

  // Busca das informações referentes ao usuário que será editado
  $sql =  "SELECT id, nome, sexo, data_de_nascimento, email, senha, celular, RG, NUSP, endereco, foto, Nivel FROM usuarios WHERE id = $id_usuario ";
  $perfil = mysqli_query($con, $sql);
  
  while ($p = mysqli_fetch_array($perfil)){
     $nome = $p['nome'];
     $sexo = $p['sexo'];
     $data_de_nascimento= $p['data_de_nascimento'];
     $email = $p['email'];
     $senha = $p['senha'];
     $celular = $p['celular'];
     $RG= $p['RG'];
     $NUSP = $p['NUSP'];
     $endereco = $p['endereco'];
     $Nivel = $p['Nivel'];
     $id = $p['id'];
     $foto = $p['foto'];
    

  }

?>  


<body>
<div id="page">
  <nav class="fh5co-nav" id="menu-list" role="navigation">
      <div id="menu"></div>
  </nav>
  <div class="container-fluid" style="padding-top:60px;">
    <div class="row">
      <form method="post" action="index.php" enctype="multipart/form-data" class="col-md-12">
      
        <h1>Edição de usuário</h1>
        <p>Altere os campos abaixo que desejar para editar seu perfil.</p>
        
         <div class="row form-group">
          <div class="col-md-6">
            <label for="foto"><b>Foto de perfil:</b></label>
            <input class="form-control" type="file" placeholder="Selecione uma foto" name="foto"  accept="image/*" >
          </div> 

        <div class="row form-group">
          <div class="col-md-6">
            <label for="Nome"><b>Nome Completo</b></label>
            <input class="form-control" type="text" placeholder="Digite seu nome e sobrenome..." name="nome" value = "<?php echo $nome ?>" ; required>
          </div>
          
          <div class="col-md-3">
            <label for="Data de Nascimento"><b>Data de Nascimento</b></label>
            <input class="form-control" type="date" name="data de nascimento" placeholder="DD/MM/AAAA" value = "<?php echo $data_de_nascimento ?>" required>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label for="email"><b>Email</b></label>
            <input class="form-control" type="text" placeholder="Digite seu Email..." name="email" value = "<?php echo $email ?>" required>
          </div>
          <div class="col-md-6">
            <label for="senha"><b>Senha</b></label>
            <input class="form-control" type="password" placeholder="Digite sua senha..." name="senha" value = "<?php echo $senha ?>" required>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label for="confirma_senha"><b>Confirmação de senha</b></label>
            <input class="form-control" type="password" placeholder="Digite novamente sua senha..." name="confirma_senha" required>
          </div>
          <div class="col-md-6">
            <label for="celular"><b>Celular</b></label>
            <input class="form-control" type="text" placeholder="Digite seu número de celular..." name="celular" value = "<?php echo $celular ?>" required>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label for="RG"><b>RG</b></label>
            <input class="form-control" type="text" placeholder="Digite seu RG..." name="RG" value = "<?php echo $RG ?>" required>
          </div>
          <div class="col-md-6">
            <label for="Número USP"><b>Número USP</b></label>
            <input class="form-control" type="text" placeholder="Digite seu Número USP..." name="NUSP" value = "<?php echo $NUSP ?>" >
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label for="Endereço"><b>Endereço</b></label>
            <input class="form-control" type="text" placeholder="Digite seu endereço..." name="endereco" value = "<?php echo $endereco ?>" >
          </div>
          
        <?php 
        if ($nivel_usuario == 3) {
          echo '<div  class="col-md-6" style="margin-top:4em;">
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
          </div>' ;
        }
        ?>
        </div>

        <div class="row">
          <div class="form-group col-md-2 col-md-push-10">
            <button type="button" class="btn btn-primary">Cancelar</button>
          </div>
          <div class="form-group col-md-2 col-md-push-9">
            <button type="submit" class="btn btn-primary">Editar</button>
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

// Extrai as informações preenchidas no formulário
if ($_POST){
  $con = mysqli_connect('localhost', 'root', '', 'sistema_wetrats');
  
  $nome = $_POST['nome'];
  $data_de_nascimento = $_POST['data_de_nascimento'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confirma_senha = $_POST['confirma_senha'];
  $celular = $_POST['celular'];
  $RG = $_POST['RG'];
  $NUSP = $_POST['NUSP'];
  $endereco = $_POST['endereco'];
  if ($nivel_usuario == 3) {
    $nivel = $_POST['nivel'];
  }
  else {
    $nivel = $nivel_usuario ;
  }
  
  $erro = False;
  
  if ($confirma_senha != $senha) {
    echo "Senha e confirmação de senha diferentes!!!" ;
    $erro = True;
  }

  if (!isset($nivel) ){
    echo "Sem nível selecionado!" ;
    $erro = True;
  }
  
  if($erro != True){
  
    // upload da foto de perfil
    if (isset ($_FILES['foto'])){
      $file = $_FILES['foto']['name'];
      $ext = explode(".", $file);
      $extensao = end($ext);
      if (strlen($extensao) > 0) { //verifica se não esta gravando um arquivo vazio 
        $novo_nome = "perfil"."$id_usuario".".".$extensao;
        $diretorio = "../common/uploads/fotosdeperfil/";
        move_uploaded_file ($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
        // Grava no banco de dados
        $sql = "UPDATE usuarios SET nome = '$nome' , data_de_nascimento = '$data_de_nascimento' , email = '$email' , senha = '$senha' , celular = '$celular', RG = '$RG', NUSP = '$NUSP', endereco = '$endereco', foto = '$novo_nome', Nivel= '$nivel' WHERE id = $id_usuario ";
        $atualizar_perfil = mysqli_query($con,$sql);
        if ($atualizar_perfil >= '1'){
          echo "Seu perfil e foto foram atualizados com sucesso";
        }
        else 
          echo "Falha ao atualizar a foto do perfil";
      }     
      
      else{
        // Grava no banco de dados sem a foto
        $sql = "UPDATE usuarios SET nome = '$nome' , data_de_nascimento = '$data_de_nascimento' , email = '$email' , senha = '$senha' , celular = '$celular', RG = '$RG', NUSP = '$NUSP', endereco = '$endereco', Nivel= '$nivel' WHERE id = $id_usuario ";
        $atualizar_perfil = mysqli_query($con,$sql);
        if ($atualizar_perfil >= '1'){
          echo "Seu perfil foi atualizado com sucesso";
        }
        else 
          echo "Falha ao atualizar o perfil";
        
        }
      }
    else { //caso nao haja alteracao na foto
    // Grava no banco de dados
    $sql = "UPDATE usuarios SET nome = '$nome', data_de_nascimento = '$data_de_nascimento' , email = '$email' , senha = '$senha' , celular = '$celular', RG = '$RG', NUSP = '$NUSP', endereco = '$endereco', Nivel= '$nivel' WHERE id = $id_usuario ";
    $atualizar_perfil = mysqli_query($con,$sql);
    if ($atualizar_perfil >= '1'){
      echo "Seu perfil foi atualizado com sucesso";
    }
    else {
      echo "Falha ao atualizar perfil";
    }}


}
}
?>