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
	
	include("../_conexao/conexao.php");
	
	$id_postagem = $_SESSION['id_editar_postagem'];
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$atualizar_data = $_POST['atualizar'];
	
	$sql = "SELECT * FROM postagem WHERE id = '$id_postagem'";
	$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
	
	$postagem = $sql_query->fetch_assoc();
	
	$nome_imagem = $postagem['imagem'];
	
	if(isset($_FILES['imagem'])){
		$diretorio = "../_upload/";
		
		move_uploaded_file ($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem);
		
		
		$editar_postagem = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
		
		if($atualizar_data==true){
			$sql = "UPDATE postagem SET titulo = '$titulo', postagem = '$descricao', data_postagem = NOW() WHERE id='$id_postagem'";
		} else {
			$sql = "UPDATE postagem SET titulo = '$titulo', postagem = '$descricao' WHERE id='$id_postagem'";
		}
		
		
		mysqli_query($editar_postagem,$sql) or die ("Erro ao tentar cadastrar registro");
		mysqli_close($editar_postagem);
		
		header("Location: myposts.php");
		
	} else {
		$editar_postagem = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
		
		if($atualizar_data==true){
			$sql = "UPDATE postagem SET titulo = '$titulo', postagem = '$descricao', data_postagem = NOW() WHERE id='$id_postagem'";
		} else {
			$sql = "UPDATE postagem SET titulo = '$titulo', postagem = '$descricao' WHERE id='$id_postagem'";
		}
		
		
		mysqli_query($editar_postagem,$sql) or die ("Erro ao tentar cadastrar registro");
		mysqli_close($editar_postagem);
		
		header("Location: myposts.php");
	}
	
?>