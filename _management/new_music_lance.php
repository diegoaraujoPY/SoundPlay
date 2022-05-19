<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	include("../_conexao/conexao.php");

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
						<form method="POST" action="add_music_lance.php" class="formulario">
							<div class="mb-3">
							  <label for="nome" class="form-label">Nome da música</label>
							  <input type="text" class="form-control" name="nome" id="nome" required>
							</div>
							<div class="mb-3">
							  <label for="artista" class="form-label">Artista's/Banda</label>
							  <input type="text" class="form-control" name="artista" id="artista" required>
							</div>
							<div class="mb-3">
							  <label for="descricao" class="form-label">Descricao</label>
							  <textarea type="text" class="form-control" name="descricao" id="descricao" required></textarea>
							</div>
							<div class="mb-3">
							  <label for="link" class="form-label">Link do video no Youtube</label>
							  <input type="text" class="form-control" name="link" id="link" required>
							</div>
							<div class="mb-3">
							  <label for="data" class="form-label">Data de postagem do video</label>
							  <input type="date" class="form-control" name="data_lancamento" id="data" required>
							</div>
							<div class="col" style="float: right;">
								<button type="submit" class="btn btn-success" required><i class="fa fa-floppy-o" aria-hidden="true"></i>Salvar</button>
							</div>
						</form>
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	
	</body>
</html>