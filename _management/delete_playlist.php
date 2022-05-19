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
	
	$id_playlist = $_GET['id'];
	$id_decada = $_GET['id_decada'];
		
	$apagar_postagem = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "DELETE FROM playlist_classicas WHERE id = $id_playlist";
	mysqli_query($apagar_postagem,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($apagar_postagem);
		
	header("Location: myplaylists_classicas.php?id=$id_decada");
	
?>