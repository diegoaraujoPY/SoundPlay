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
	$artista = $_POST['artista'];
	$link = $_POST['link'];
	$link_convertido = substr($link, 32);
	
		
	$adicionar_musica = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO music_day (id, nome, artista, data_musica, link_youtube) VALUES (NULL, '$nome', '$artista', NOW(), '$link_convertido')";
	mysqli_query($adicionar_musica,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_musica);
	
	
	include("../_conexao/conexao.php");
	
	$sql_num = "SELECT * FROM music_day";
	$sql_query = $mysqli->query($sql_num) or die("Falha na execução do código SQL" . $msqli->error);
	
	$quant = $sql_query->num_rows;
	
	if($quant>8){
		
		$sql_deletar = "SELECT * FROM music_day ORDER BY data_musica DESC LIMIT 8, 10";
		$sql_deletar_query = $mysqli->query($sql_deletar) or die("Falha na execução do código SQL" . $msqli->error);
		
		while($musica_day = mysqli_fetch_array($sql_deletar_query)){
			$id_musica = $musica_day['id'];
			
			$deletar_musica = mysqli_connect("localhost","root","","soundplay") or die ("Erro ao se conectar ao Banco de Dados");
			$sql_deletar = "DELETE FROM music_day WHERE id = '$id_musica'";
			mysqli_query($deletar_musica, $sql_deletar) or die ("Erro ao tentar cadastrar registro");
			mysqli_close($deletar_musica);
			
		}
		
	}
	
	header("Location: music_day.php");

	
	
?>