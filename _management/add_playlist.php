<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['id_classicas'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}

	
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$id_classicas = $_POST['id_classicas'];
	$link_playlist = $_POST['playlist'];
	$link_convertido = substr($link_playlist, 38);
		
	$adicionar_playlist = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO playlist_classicas (id, titulo, descricao, link_playlist, id_decada) VALUES (NULL, '$titulo', '$descricao', '$link_convertido', '$id_classicas')";
	mysqli_query($adicionar_playlist,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_playlist);
	
	header("Location: classicas_edicao.php");

	
	
?>