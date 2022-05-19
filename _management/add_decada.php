<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['decada'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}

	
	$decada = $_POST['decada'];
	$texto = $_POST['texto'];
		
	$adicionar_decada = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO classicas (id, decada, texto) VALUES (NULL, '$decada', '$texto')";
	mysqli_query($adicionar_decada,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_decada);
	
	header("Location: classicas.php");

	
	
?>