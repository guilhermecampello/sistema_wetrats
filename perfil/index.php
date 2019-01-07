<?php
    // Inicia a sessão caso nao esteja iniciada    
    if (!isset($_SESSION)) {
         session_start();
    }

    // Verifica se existe ID da sessão
    //if(!isset($_SESSION['ID'])){
        //Destrói a sessão por segurança
        //session_destroy();

        //Redireciona para o login
        //header("Location: ../index.php"); exit;

    //Inicia uma sessão
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
              
   

<div>
<?php
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
    if ($foto){
        echo '<img src=../common/uploads/fotosdeperfil/'.$foto.' width="240" height=300">';
    }
?>
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