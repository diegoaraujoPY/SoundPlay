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
							<h1 style="padding: 40px; color: rgba(7,69,6,1);">Forró: Os <?php $anoatual = date('Y'); $inicio_forro = 1940; $resultado = $anoatual - $inicio_forro; echo "$resultado";?> anos de história!</h1>
							
							<?php
							
								$sql = "SELECT * FROM classicas ORDER BY decada ASC";
								$sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL" . $msqli->error);
									
									while($classicas = mysqli_fetch_array($sql_query)){
										
										$id = $classicas['id'];
										$decada = $classicas['decada'];
										$texto = $classicas['texto'];
										
										echo "<a class='nav-link' href='classicas_edicao.php?id=$id'>";
										echo 	"<ul class='content justify-content-right postagens' style='background: url(../_interface/barra.jpg);'>";
										echo 	"<div class='row'>";
										echo 		"<div class='col'>";
										echo 		"<img class='card-img-top' src='../_logos/$decada.png' alt='Card image cap'>";
										echo 		"</div>";
										echo 	"</div>";
										echo 	"</ul>";
										echo "</a>";
									}
							
							$sql_ultima_decada = "SELECT * FROM classicas ORDER BY decada DESC";
							$sql_ultima_decada_query = $mysqli->query($sql_ultima_decada) or die("Falha na execução do código SQL" . $msqli->error);
							
							$ultima_decada = mysqli_fetch_assoc($sql_ultima_decada_query);
							
							$decada_atual = $ultima_decada['decada'];
							
							$anoatual = date('Y');
							$result = $anoatual - $decada_atual;
							
							if($result>10){
								echo "<a class='nav-link' href='new_decada.php'>";
								echo 	"<ul class='nav justify-content-left postagens'>";
								echo 		"<i class='fa fa-plus' aria-hidden='true'></i><span>Adicionar década</span>";
								echo 	"</ul>";
								echo "</a>";
							}
							
							?>
							
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>