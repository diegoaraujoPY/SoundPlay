<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['ano_local'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}

	
	$id = $_POST['id'];
	$artista = $_POST['artista'];
	$titulo = $_POST['titulo'];
	$ano_local = $_POST['ano_local'];
		
	$editar_dvd = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "UPDATE dvds SET artista = '$artista', titulo = '$titulo', ano_local = '$ano_local' WHERE id = '$id'";
	mysqli_query($editar_dvd,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($editar_dvd);
	
	header("Location: editar_dvd.php?id=$id");

	
	
?>