<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['link'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}

	$nome = $_POST['nome'];
	$artista = $_POST['artista'];
	$descricao = $_POST['descricao'];
	$link = $_POST['link'];
	$data_lancamento = $_POST['data_lancamento'];
	$link_convertido = substr($link, 32);
	
		
	$adicionar_musica = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO music_lance (id, nome, artista, descricao, link_musica, data_postagem) VALUES (NULL, '$nome', '$artista', '$descricao', '$link_convertido', '$data_lancamento')";
	mysqli_query($adicionar_musica,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_musica);
	
	
	header("Location: music_lance.php");

	
	
?>