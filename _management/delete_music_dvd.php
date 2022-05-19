<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_GET['id_music'])){
		echo "<script>";
		echo 	"window.location.replace('postagens.php');";
		echo "</script>";
	}
	
	include("../_conexao/conexao.php");
	
	$id_music = $_GET['id_music'];
	$id_dvd = $_GET['id'];
		
	$apagar_music_dvd = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "DELETE FROM dvds_music WHERE id_music = $id_music";
	mysqli_query($apagar_music_dvd,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($apagar_music_dvd);
		
	header("Location: musics_dvd.php?id=$id_dvd");
	
?>