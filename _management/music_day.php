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
							<h1 style="padding: 40px; color: rgba(7,69,6,1);">Músicas para Hoje</h1>
							
							<a class='nav-link' href='new_music_hoje.php'>
								<ul class="nav justify-content-left postagens">
									<i class="fa fa-plus" aria-hidden="true"></i><span>Adicionar nova música</span>
								</ul>
							</a>
							
							<?php
							
								$sql = "SELECT * FROM music_day ORDER BY data_musica DESC";
								$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
								
								$quant = $sql_query->num_rows;
								
								if($quant==0){
									echo "NENHUMA MÚSICA ADICIONADA PARA HOJE POR ENQUANTO!!";
								} else {
									
									while($music_day = mysqli_fetch_array($sql_query)){
										
										$nome = $music_day['nome'];
										$artista = $music_day['artista'];
										$id_musica = $music_day['id'];
										$link_musica = $music_day['link_youtube'];
										$data_musica = $music_day['data_musica'];
										$data_music = substr("$data_musica", 8, -9) . "-" . substr("$data_musica", 5, -12) . "-" . substr("$data_musica", 0, -15);
										
										echo "<a class='nav-link' href='editar_music_day.php?id=$id_musica'>";
										echo 	"<ul class='content justify-content-right postagens'>";
										echo 	"<div class='row'>";
										echo 		"<div class='col-3'>";
										echo 			"<iframe id='frame-spec' width='200' height='140' class='embed-responsive-item' src='https://www.youtube.com/embed/$link_musica'></iframe>";
										echo 		"</div>";
										echo 		"<div class='col'>";
										echo 			"<span>$nome - $artista</span>";
										echo 		"</div>";
										echo 	"</div>";
										echo 	"<div class='row'>";
										echo 		"<div class='col'>";
										echo 			"<span style='float: right;'>$data_music</span>";
										echo 		"</div>";
										echo 	"</div>";
										echo 	"</ul>";
										echo "</a>";
									}
									
								}
							
							?>
							
							
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>