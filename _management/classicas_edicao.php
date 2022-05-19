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
		echo 	"window.location.replace('classicas.php');";
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
		<link rel="stylesheet" href="_css/login.css"/>
		<link rel="stylesheet" href="_css/gerenciamento.css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="_javascrit/js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	
	
	<script language="javascript" src="../_javascript/funcoes.js"></script>
	
	<body style="background: #fff;">
			
					<div class="content justify-content-center">
					
						<?php
					
							$sql = "SELECT * FROM classicas WHERE id = '$id'";
							$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar ao Bando de Dados!" . $mysqli->error);
					
							$decada_selecionada = mysqli_fetch_assoc($sql_query);
							
							$decada = $decada_selecionada['decada'];
							if($decada<1990){
								echo "<h1 style='padding: 40px; color: rgba(7,69,6,1);'>Edição: O Surgimento do Forró</h1>";
							} else {
								echo "<h1 style='padding: 40px; color: rgba(7,69,6,1);'>Edição da Década $decada</h1>";
							}
							
							
							echo "<a class='nav-link' href='new_playlist.php?id=$id'>";
							echo 	"<ul class='nav justify-content-left postagens'>";
							echo 		"<i class='fa fa-youtube-play' aria-hidden='true'></i><span>Adicionar Playlist's</span>";
							echo 	"</ul>";
							echo "</a>";
							echo "<a class='nav-link' href='myplaylists_classicas.php?id=$id''>";
							echo 	"<ul class='nav justify-content-left postagens'>";
							echo 		"<i class='fa fa-youtube-square' aria-hidden='true'></i><span>Playlists Adicionadas</span>";
							echo 	"</ul>";
							echo "</a>";
							echo "<a class='nav-link' href='config_decada.php?id=$id'>";
							echo 	"<ul class='nav justify-content-left postagens'>";
							echo 		"<i class='fa fa-cog' aria-hidden='true'></i><span>Configurações</span>";
							echo 	"</ul>";
							echo "</a>";
							
						?>
						
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>