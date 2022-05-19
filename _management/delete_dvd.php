<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_GET['id'])){
		echo "<script>";
		echo 	"window.location.replace('postagens.php');";
		echo "</script>";
	}
	
	include("../_conexao/conexao.php");
	
	$id_dvd = $_GET['id'];
		
	$apagar_musics = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "DELETE FROM dvds_music WHERE cod_dvd = $id_dvd";
	mysqli_query($apagar_musics,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($apagar_musics);
	
	$apagar_dvd = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "DELETE FROM dvds WHERE id = $id_dvd";
	mysqli_query($apagar_dvd,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($apagar_dvd);
		
	header("Location: dvds.php");
	
?>