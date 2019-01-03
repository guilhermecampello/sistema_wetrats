<?php
 //Inicia uma sessão
  session_start();
    
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
      header("Location: index.html"); exit;
  }

  // Conexão com o servidor MySQL
  $con = mysqli_connect('localhost', 'root', '', 'sistema_wetrats');

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Validação do usuário
  $sql =  "SELECT * FROM `usuarios` ";
  $res = mysqli_query($con, $sql);
  $achou = False ;
  while ($f = mysqli_fetch_array($res))
    {
        if ($email ==  $f['email']) {
            if ($senha ==  $f['senha']) {
                //Salva os dados na sessão

                $_SESSION['ID'] = $f['id'];
                $_SESSION['Nome'] = $f['nome'];
                $_SESSION['Nivel'] = $f['Nivel'];
                $achou = True;
                echo $_SESSION['ID'];
                echo $_SESSION['Nome'];
                echo $_SESSION['Nivel']; 
                session_write_close();
                //Redireciona o usuário

                header("Location: ../sistema_wetrats/perfil/index.php"); exit;
                $achou = True;
            }
        }
    }
    
    if (!$achou) {
    //Usuário não encontrado
    echo "email digitado : ".$email."<br>";
    echo "senha digitada : ".$senha."<br>";
    echo "Login Inválido!";// header("Location: ../sistema_wetrats/index.html"); exit;
    }
?>