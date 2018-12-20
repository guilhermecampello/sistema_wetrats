<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php
    // Inica a sessão, caso não exista
    if (!isset($_SESSION)) session_start();

    // Verifica se existe ID da sessão
    if(!isset($_SESSION['ID'])){
        //Destrói a sessão por segurança
        session_destroy();

        //Redireciona para o login
        header("Location: ../index.html"); exit;
    }

    echo "<h1>Área Restrita</h1>";
    $msg = "Olá ";
    if ($_SESSION['Nivel'] == 1){
       $msg .= "Atleta ".$_SESSION['Nome'];
    } elseif ($_SESSION['Nivel'] == 2) {
        $msg .= "Técnico ".$_SESSION['Nome'];
    } elseif ($_SESSION['Nivel'] == 3) {
        $msg .= "DM ".$_SESSION['Nome'];
    }

    echo "<p>".$msg."</p>";
?>
<a href='../index.html'>Logout</a>
</html>
