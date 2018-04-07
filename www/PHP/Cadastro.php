<?php
header("Access-Control-Allow-Origin: *");
require_once("Config.php");
$nome_completo = $_POST['nome_completo'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$config = new Config();
$conexao = $config->conectaBanco();
  if (!$conexao){
      die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysqli_connect_error());
  }
  if(checkValues($_POST['nome_completo'], $_POST['email'], $_POST['senha'])){
    $query = "SELECT email from usuarios where email=\"$email\"";
    if ($result = mysqli_query($conexao,$query)) {
      $row = $result->fetch_row();
      if ($row[0] == null || $row[0] == "") {
        $query = "INSERT INTO usuarios (nome_completo, email, senha, id_usuario) VALUES (\"$nome_completo\", \"$email\", \"$senha\", NULL)";
        if($result = mysqli_query($conexao,$query)) {
          echo "Seu cadastro foi realizado com sucesso!";
          header("location: ../page/p2-user.php");
        } else {
          echo "Error!";
        }
      } else {
        echo "<script>alert('Email ja Cadastrado!'); document.location.href='../index.html';</script>";
      }
    } else {
      echo "Erro ao consultar o Banco de Dados!";
    }
    $result->close();
    mysqli_close($conexao);
  } else {
    echo "<script>alert('Preencha os campos corretamente!'); document.location.href='../index.html';</script>";
  }
  function checkValues($nome_completo, $email, $senha) {
    if(isset($nome_completo) && !empty($nome_completo) && isset($email) && !empty($email) && isset($senha) && !empty($senha)){
      $ResultC = true; 
    }
    else {
      $ResultC = false;
    }
    return $ResultC;
  }
?>