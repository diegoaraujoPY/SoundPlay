<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	$id_adm = $_SESSION['id_adm'];

	
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
		
	$_SESSION['nome'] = $nome;
	$_SESSION['sobrenome'] = $sobrenome;
	
	$editar_user = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "UPDATE administrador SET nome = '$nome', sobrenome = '$sobrenome' WHERE id_adm = '$id_adm'";
	mysqli_query($editar_user,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($editar_user);
	
	header("Location: configuracoes.php");

	
	
?>