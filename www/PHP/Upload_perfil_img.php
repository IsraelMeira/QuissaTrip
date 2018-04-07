<?php
  header("Access-Control-Allow-Origin: *");
  require("Config.php");
  $id = $_SESSION['usuarioPHP']['id'];
  $imagem = $_FILES['imagem']['tmp_name'];
  $tamanho = $_FILES['imagem']['size'];
  $tipo = $_FILES['imagem']['type'];
  $nome = $_FILES['imagem']['name'];
  $config = new Config();
  $conexao = $config->conectaBanco();

   
  if ( $imagem != "none" )
  {
    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);
   
    $queryInsercao = "UPDATE usuarios SET imagem = \"$conteudo\" WHERE id_usuario = \"$id\"";
   
    mysqli_query($conexao, $queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
    echo 'Registro inserido com sucesso!'; 
    header('Location: ../page/p2-user.php');
    if(mysql_affected_rows($conexao) > 0){
      echo "A imagem foi salva na base de dados.";
    }else{
      echo "Não foi possível salvar a imagem na base de dados.";
    }
  }
  else{
      echo "Não foi possível carregar a imagem.";
  }
  ?>