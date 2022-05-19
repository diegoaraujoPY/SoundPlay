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

	function converter_num($str){ 
		return preg_replace("/[^0-9]/", "", $str); 
	}
	
	$nome = $_POST['nome'];
	$artista = $_POST['artista'];
	$link = $_POST['link'];
	$data_lancamento = $_POST['data_lancamento'];
	$visualizacao = $_POST['visualizacao'];
	$link_convertido = substr($link, 32);
	
	$visualizacao_convertida = converter_num($visualizacao);
	
		
	$adicionar_musica = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO music_top_year (id, nome, artista, link_musica, visualizacao, data_lancamento) VALUES (NULL, '$nome', '$artista', '$link_convertido', '$visualizacao_convertida', '$data_lancamento')";
	mysqli_query($adicionar_musica,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_musica);
	
	
	header("Location: music_year.php");

	
	
?>