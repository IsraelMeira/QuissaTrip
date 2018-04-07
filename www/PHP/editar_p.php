<?php
  require("Config.php");
  $id = $_SESSION['usuarioPHP']['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $config = new Config();
  $conexao = $config->conectaBanco();

   
  if(checkValues($_POST['nome'], $_POST['email'], $_POST['senha'])){
   
    $queryInsercao = "UPDATE usuarios SET nome_completo = \"$nome\", email = \"$email\", senha = \"$senha\" WHERE id_usuario = \"$id\"";
   
    mysqli_query($conexao, $queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
    echo 'Registro inserido com sucesso!'; 
    header('Location: ../page/p2-user.php');
    if(mysql_affected_rows($conexao) > 0){
      echo "Dados alterados com sucesso!";
    }else{
      echo "Não foi possível alterar os dados na base de dados.";
    }
  } else {
    echo "<script>alert('Preencha os campos corretamente!'); document.location.href='../page/p2-user.php';</script>";
  }

  function checkValues($nome, $email, $senha) {
    if(isset($nome) && !empty($nome) && isset($email) && !empty($email) && isset($senha) && !empty($senha)){
      $ResultC = true;
    }
    else {
      $ResultC = false;
    }
    return $ResultC;
  }
  ?>