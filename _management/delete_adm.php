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
	
	$id_adm = $_GET['id'];
		
	$apagar_adm = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "DELETE FROM administrador WHERE id_adm = '$id_adm'";
	mysqli_query($apagar_adm,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($apagar_adm);
		
	header("Location: configuracoes.php");
	
?>