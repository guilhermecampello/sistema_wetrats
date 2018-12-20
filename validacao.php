<?php
    
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
      header("Location: index.html"); exit;
  }

  // Conexão com o servidor MySQL
  mysql_connect('mysql.ecoswim.com.br', 'ecoswim05', 'wetrats05');
  mysql_select_db('ecoswim05');

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Validação do usuário
  $sql = "SELECT `id`,`nome`, `nivel` FROM `usuarios` WHERE (`email` = '". $email ."' ) AND (`senha` = '". $senha."') AND (`ativo` = 1) LIMIT 1";
  $query = mysql_query($sql);
  if (mysql_num_rows($query) != 1){
      //Usuário não encontrado
      echo $email;
      echo $senha;
      echo "Login Inválido!";// header("Location: ../sistema_wetrats/index.html"); exit;
  } else{
      //Salva os dados na variávle $resulado
      $resulado = mysql_fetch_assoc($query);

      //Inicia uma sessão, caso não exista
      if (!isset($_SESSION)) session_start();

      //Salva os dados na sessão
      $_SESSION['ID'] = $resulado['id'];
      $_SESSION['Nome'] = $resulado['nome'];
      $_SESSION['Nivel'] = $resulado['nivel'];

      //Redireciona o usuário
      header("Location: ../sistema_wetrats/perfil/index.php"); exit;

  }

    
?>