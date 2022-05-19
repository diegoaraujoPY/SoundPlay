<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['texto'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}

	
	$id = $_POST['id'];
	$texto = $_POST['texto'];
		
	$editar_decada = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "UPDATE classicas SET texto = '$texto' WHERE id = '$id'";
	mysqli_query($editar_decada,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($editar_decada);
	
	header("Location: classicas_edicao.php?id=$id");

	
	
?>