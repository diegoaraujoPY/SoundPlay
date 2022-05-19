<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['artista'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}
	
	include("../_conexao/conexao.php");
	
	$id_musica = $_SESSION['id_editar_musica'];
	$nome = $_POST['nome'];
	$artista = $_POST['artista'];
	$link = $_POST['link'];
	$link_convertido = substr($link, 32);
	
	$sql = "SELECT * FROM music_day WHERE id = '$id_musica'";
	$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
	
	$postagem = $sql_query->fetch_assoc();
	
	$editar_musica = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
		
	$sql = "UPDATE music_day SET nome = '$nome', artista = '$artista', link_youtube =  '$link_convertido' WHERE id='$id_musica'";
	mysqli_query($editar_musica,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($editar_musica);
		
	header("Location: music_day.php");
	
?>