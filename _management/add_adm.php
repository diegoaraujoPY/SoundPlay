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

	
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$nivel = $_POST['nivel'];
		
	$adicionar_adm = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "INSERT INTO administrador (id_adm, nome, sobrenome, usuario, senha, nivel) VALUES (NULL, '$nome', '$sobrenome', '$usuario', '$senha', '$nivel')";
	mysqli_query($adicionar_adm,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($adicionar_adm);
	
	header("Location: administradores.php");

	
	
?>