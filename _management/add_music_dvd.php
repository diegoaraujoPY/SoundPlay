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
	$link = $_POST['link'];
	$link_convertido = substr($link, 32);
	$id_dvd = $_POST['id'];
		
	$adicionar_decada = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO dvds_music (id_music, nome, link_music, cod_dvd) VALUES (NULL, '$nome', '$link_convertido', '$id_dvd')";
	mysqli_query($adicionar_decada,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_decada);
	
	header("Location: musics_dvd.php?id=$id_dvd");

	
	
?>