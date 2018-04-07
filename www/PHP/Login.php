<?php
  require_once("Config.php");
  session_start();
  $config = new Config();
  $conexao = $config->conectaBanco();
  if(isset($_SESSION['usuarioPHP'])){
    header("location: ../page/p2-user.html");
  } else {
    if(checkValues($_POST['login'], $_POST['senha'])){
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conexao,$_POST['login']);
        $senha = mysqli_real_escape_string($conexao,$_POST['senha']);
        $sql = "SELECT * FROM usuarios WHERE email = \"$email\" and senha = \"$senha\"";
        $result = mysqli_query($conexao,$sql);
        if(mysqli_num_rows($result) == 1){
  			     $usuarioBD = $result->fetch_array(MYSQLI_ASSOC);
  			     session_start();
  			     $_SESSION['usuarioPHP']['nome'] = $usuarioBD['nome_completo'];
  			     $_SESSION['usuarioPHP']['email'] = $usuarioBD['email'];
             $_SESSION['usuarioPHP']['id'] = $usuarioBD['id_usuario'];
  			     header("Location: ../page/p2-user.php");
  		  } else {
          echo "<script>alert('Email ou Senha Incorretos!'); document.location.href='../index.html';</script>";
  		  }
      }
    } else {
      echo "<script>alert('Preencha os campos corretamente!'); document.location.href='../index.html';</script>";
    }
  }
  function checkValues($email, $senha) {
    if(isset($email) && !empty($email) && isset($senha) && !empty($senha)){
      $ResultC = true; 
    }
    else {
      $ResultC = false;
    }
    return $ResultC;
  }
?>