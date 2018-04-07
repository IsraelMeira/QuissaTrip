<?php
  	require("Config.php");
	$config = new Config();
	$conexao = $config->conectaBanco();
  	$id = $_SESSION['usuarioPHP']['id'];
  	$querySelecionaPorCodigo = "SELECT imagem FROM usuários WHERE id_usuario = $id";
  	$resultado = mysqli_query($conexao, $querySelecionaPorCodigo);
  	$imagem = mysqli_fetch_object($resultado);
  	Header( "Content-type: image/jpg");
  	echo $imagem->imagem;
?>