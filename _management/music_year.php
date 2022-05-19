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
			
					<div class="content justify-content-center">
							<h1 style="padding: 40px; color: rgba(7,69,6,1);">As melhores do Ano</h1>
							<a class='nav-link' href='new_music_year.php'>
								<ul class="nav justify-content-left postagens">
									<i class="fa fa-plus" aria-hidden="true"></i><span>Nova música</span>
								</ul>
							</a>
							
							<?php
							
								$sql = "SELECT * FROM music_top_year ORDER BY visualizacao DESC LIMIT 10";
								$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
								
								$quant = $sql_query->num_rows;
								
								if($quant>0){
									
									while($music_top = mysqli_fetch_array($sql_query)){
									
										$id = $music_top['id'];
										$nome = $music_top['nome'];
										$artista = $music_top['artista'];
										$link_music = $music_top['link_musica'];
										$visualizacao = $music_top['visualizacao'];
										$data_lancamento = $music_top['data_lancamento'];
										$visu = number_format($visualizacao,0,',','.');
										
										
										echo "<ul class='content justify-content-right postagens'>";
										echo "<form method='POST' action='update_music_year.php'>";
										echo 	"<div class='row'>";
										echo 	"<div class='col-3'>";
										echo 	"<img style='box-shadow: 0px 0px 4px black;' class='card-img-top' src='https://img.youtube.com/vi/$link_music/maxresdefault.jpg' alt='Card image cap'>";
										echo 	"</div>";
										echo 		"<div class='col'>";
										echo 			"<span>$nome - $artista</span>";
										echo 		"</div>";
										echo 		"<div class='col-10'>";
										
											include_once("../_funcoes/tempo.php");
										
										echo 			"<span style='font-size: 10pt;'>" . tempo($data_lancamento) . "</span>";
										echo 		"</div>";
										echo 	"</div>";
										echo 	"<div class='row'>";
										echo 		"<div class='col-7' style='text-align: right;'>";
										echo 			"<input type='text' id='visualizacao$id' style='font-size: 20pt;' size='10' name='visualizacao' value='$visu'>";
										echo 		"</div>";
										echo 		"<div class='col-3'>";
										echo 			"<label for='visualizacao$id' style='text-align: left; font-size: 20pt; color: black;'> Visualizações</label>";
										echo 		"</div>";
										echo 		"<div class='col'>";
										echo 			"<input type='hidden' value='$id' name='id'/>";
										echo 			"<button type='submit' class='btn btn-primary' required><i style='font-size: 10pt;' class='fa fa-refresh' aria-hidden='true'></i>Atualizar</button>";
										echo 		"</div>";
										echo 	"</div>";
										echo 	"</form>";
										echo 	"</ul>";
									
									}
									
								}
							
							?>
							
							
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>