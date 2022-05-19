<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(!isset($_POST['titulo'])){
		echo "<script>";
		echo 	"alert('ERRO!!');";
		echo 	"window.location.replace('../index.php');";
		echo "</script>";
	}
	
	if(isset($_FILES['imagem'])){
		$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
		$nome_imagem = md5(time()) . $extensao;
		$diretorio = "../_upload/";
		
		move_uploaded_file ($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem);
		
	
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		
		$adicionar_postagem = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
		$sql = "INSERT INTO postagem (titulo, postagem, data_postagem, imagem, id) VALUES ('$titulo', '$descricao', NOW(), '$nome_imagem', NULL)";
		mysqli_query($adicionar_postagem,$sql) or die ("Erro ao tentar cadastrar registro");
		mysqli_close($adicionar_postagem);
		
		header("Location: postagens.php");
		
	}
	
	
?>