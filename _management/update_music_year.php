<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}

	function converter_num($str){ 
		return preg_replace("/[^0-9]/", "", $str); 
	}
	
	$id = $_POST['id'];
	$visualizacao = $_POST['visualizacao'];
	
	$visualizacao_convertida = converter_num($visualizacao);
	
	
		
	$adicionar_musica = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "UPDATE music_top_year SET visualizacao = '$visualizacao_convertida' WHERE id = '$id'";
	mysqli_query($adicionar_musica,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_musica);
	
	
	header("Location: music_year.php");
	
	
?>