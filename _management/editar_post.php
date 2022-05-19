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
	
	$id_postagem  = $_GET['id'];
	
	$_SESSION['id_editar_postagem'] = $id_postagem;

?>


<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../_logos/ícone.png"/>
		<link rel="stylesheet" href="../_css/menu.css"/>
		<link rel="stylesheet" href="_css/gerenciamento.css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="_javascrit/js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	
	
	<script language="javascript" src="../_javascript/funcoes.js"></script>
	
	<body style="background: #fff;">
			
					<div class="container justify-content-center">
						<form method="POST" action="edit_post.php" class="formulario" enctype="multipart/form-data">
						
							<?php
						
							$sql = "SELECT * FROM postagem WHERE id = '$id_postagem'";
							$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
							
							while($postagem = mysqli_fetch_array($sql_query)){
								$titulo = $postagem['titulo'];
								$descricao = $postagem['postagem'];
								$imagem = $postagem['imagem'];
								$id_postagem = $postagem['id'];
							
						
								echo "<div class='mb-3'>";
								echo 	"<label for='titulo' class='form-label'>Título da postagem</label>";
								echo 	"<input type='text' class='form-control' name='titulo' value='$titulo' id='titulo' required>";
								echo "</div>";
								
								echo "<div class='mb-3'>";
								echo 	"<label for='descricao' class='form-label'>Descrição</label>";
								echo 	"<textarea class='form-control' name='descricao' id='descricao' rows='14' required>$descricao</textarea>";
								echo "</div>";
								
								echo "<div class='mb-3'>";
								echo 	"<label for='imagem' class='form-label'>Adicionar Imagem</label>";
								echo 	"<input type='file' class='form-control' value='$imagem' name='imagem' id='imagem'>";
								echo "</div>";
								
								echo "<div class='form-check form-switch'>";
								echo 	"<input class='form-check-input' type='checkbox' id='atualizarhora' name='atualizar' checked>";
								echo 	"<label class='form-check-label' for='atualizarhora'>Atualizar data da postagem</label>";
								echo "</div>";
								
								echo "<div class='col' style='float: right; padding: 10px;'>";
								echo 	"<button type='submit' class='btn btn-success' required><i class='fa fa-floppy-o' aria-hidden='true'></i>Salvar</button>";
								echo "</div>";
								echo "<div class='col' style='float: right; padding: 10px;'>";
								echo 	"<a class='btn btn-danger' href='delete_post.php?id=$id_postagem'><i class='fa fa-trash' aria-hidden='true'></i>Excluir Post</a>";
								echo "</div>";
							}
							
							?>
							
						</form>
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>