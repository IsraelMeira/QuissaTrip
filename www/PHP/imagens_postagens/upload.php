<?php
  require("Config.php");
  $imagem = $_FILES['imagem']['tmp_name'];
  $tamanho = $_FILES['imagem']['size'];
  $tipo = $_FILES['imagem']['type'];
  $nome = $_FILES['imagem']['name'];
  $config = new Config();
  $conexao = $config->conectaBanco();
  $id = $_SESSION['usuarioPHP']['id'];

   
  if ( $imagem != "none" )
  {
    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);
    $queryInsercao = "INSERT INTO postagens (id_usuario_p, imagem_p) VALUES (\"$id\", \"$conteudo\")";
   
    mysqli_query($conexao, $queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
    echo 'Registro inserido com sucesso!'; 
    header('Location: index.php');
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