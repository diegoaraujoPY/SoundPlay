<?php

	include("../_conexao/conexao.php");

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('login.php');";
		echo "</script>";
	}
	
	if(isset($_POST['local'])){
		$titulo = $_POST['titulo'];
		$artista = $_POST['artista'];
		$local = $_POST['local'];
	
		$adicionar_dvd = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar com o Banco de Dados");
		$adicionar_dvd_query = "INSERT INTO dvds (id, artista, titulo, ano_local) VALUES (NULL, '$artista','$titulo','$local')";
		mysqli_query($adicionar_dvd, $adicionar_dvd_query);
		mysqli_close($adicionar_dvd);
		
		$sql = "SELECT MAX(id) AS id FROM dvds";
		$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar com o Bando de Dados". $mysqli->error);
		
		$id_atual = mysqli_fetch_assoc($sql_query);
		$id = $id_atual['id'];
	} else {
		$id = $_GET['id'];
	} 
	
		
		

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
						
						<h2>Músicas do DVD</h2>
						
						<?php
						
							$sql_music_dvd = "SELECT * FROM dvds_music WHERE cod_dvd = '$id'";
							$sql_music_dvd_query = $mysqli->query($sql_music_dvd) or die ("Erro ao se conectar com o Bando de Dados" . $mysqli->error);
						
							$quant = $sql_music_dvd_query->num_rows;
							
							if($quant==0){
								
								echo "<span style='color: red; font-size: 14pt;'><b>Nenhuma música adicionada!</b></span>";
								
								echo "<a class='nav-link' href='new_music_dvd.php?id=$id'>";
								echo 	"<ul class='nav justify-content-left postagens'>";
								echo 		"<i class='fa fa-youtube-play' aria-hidden='true'></i><span>Adicionar Primeira Música</span>";
								echo 	"</ul>";
								echo "</a>";
								
							} else {
								
								$sequencia = 0;
								
								while($music_dvd = mysqli_fetch_array($sql_music_dvd_query)){
									$id_music = $music_dvd['id_music'];
									$nome = $music_dvd['nome'];
									$sequencia++;
									
									echo 	"<div class='mb-3'>";
									echo 		"<span class='form-label musicas'>$sequencia. $nome</span>";
									echo 		"<a class='btn btn-link' href='delete_music_dvd.php?id=$id&id_music=$id_music' style='color: red;'><i class='fa fa-trash' aria-hidden='true'></i></a>";
									echo 	"</div><br>";
									
								}
								
								echo 	"<div class='col' style='float: right;'>";
								echo 		"<a class='btn btn-primary' href='new_music_dvd.php?id=$id'><i class='fa fa-plus' aria-hidden='true'></i>Adicionar Nova Música</a>";
								echo 	"</div>";
								echo 	"<div class='col' style='float: right; margin-right: 10px;'>";
								echo 		"<a class='btn btn-success' href='dvds.php'><i class='fa fa-floppy-o' aria-hidden='true'></i>Concluir</a>";
								echo 	"</div>";
								
							}
		
							
						?>
							
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>