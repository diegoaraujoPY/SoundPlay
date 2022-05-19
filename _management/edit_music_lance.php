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
	
	$id_musica = $_POST['id'];
	$nome = $_POST['nome'];
	$artista = $_POST['artista'];
	$descricao = $_POST['descricao'];
	$link = $_POST['link'];
	$link_convertido = substr($link, 32);
	
	$sql = "SELECT * FROM music_lance WHERE id = '$id_musica'";
	$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
	
	$postagem = $sql_query->fetch_assoc();
	
	$editar_musica = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
		
	$sql = "UPDATE music_lance SET nome = '$nome', artista = '$artista', descricao = '$descricao', link_musica = '$link_convertido' WHERE id = '$id_musica'";
	mysqli_query($editar_musica,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($editar_musica);
		
	header("Location: music_lance.php");
	
?>