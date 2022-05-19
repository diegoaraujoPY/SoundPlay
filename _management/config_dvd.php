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
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	include("../_conexao/conexao.php");
	
	$id = $_GET['id'];
	
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
			
				<?php
			
					$sql = "SELECT * FROM dvds WHERE id = '$id'";
					$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar ao Banco de Dados" . $mysqli->error);
			
					$dvd = mysqli_fetch_assoc($sql_query);
					
					$artista = $dvd['artista'];
					$titulo = $dvd['titulo'];
					$ano_local = $dvd['ano_local'];
			
					echo "<div class='container justify-content-center'>";
					echo 	"<form method='POST' action='edit_dvd.php' class='formulario'>";
					echo 	"<div class='mb-3'>";
					echo 		"<label for='artista' class='form-label'>Artista/Banda</label>";
					echo 		"<input type='text' class='form-control' value='$artista' name='artista' id='artista'>";
					echo 		"<input type='hidden' class='form-control' name='id' value='$id'>";
					echo 	"</div>";
					echo 	"<div class='mb-3'>";
					echo 	"<label for='titulo' class='form-label'>Título</label>";
					echo 		"<input type='text' class='form-control' value='$titulo' name='titulo' id='titulo'>";
					echo 	"</div>";
					echo 	"<label for='ano_local' class='form-label'>Ano/Local</label>";
					echo 		"<input type='text' class='form-control' value='$ano_local' name='ano_local' id='ano_local'>";
					echo 	"</div>";
					echo 	"<div class='col' style='float: right;'>";
					echo 		"<button type='submit' class='btn btn-success' required>Salvar</button>";
					echo 	"</div>";
					echo 	"<div class='col' style='float: right; margin-right: 10px;'>";
					echo 		"<a class='btn btn-danger' href='delete_dvd.php?id=$id'><i class='fa fa-trash' aria-hidden='true'></i>Excluir DVD</a>";
					echo 	"</div>";
					echo 	"</form>";
					echo "</div>";
					
				?>
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>