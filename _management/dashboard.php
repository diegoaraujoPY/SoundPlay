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
			
				<div class="row">
					<div class="container justify-content-center">
						<h1 style="padding: 20px; color: rgba(7,69,6,1);">Estatísticas do Site</h1>
						
						<table class="table">
							<tbody class="menuselecao">
							<tr>
								<td>
									<figure class="figure dash">
										<a class="dashboard" style="text-decoration: none;">
											<i class="fa fa-bar-chart"></i><span><?php $sql = "SELECT * FROM visualizacoes";	$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar com o Bando de Dados" . $mysqli->error); $resultado = 0; while($visualizacao = mysqli_fetch_array($sql_query)){ $num = $visualizacao['num']; $resultado = $resultado + $num; } echo number_format($resultado);?> </span>
											<figcaption class="cat figure-caption text-right" style="font-size: 20pt; text-decoration: none;">N° de Visualizações</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure dash">
										<a href="myposts.php" class="dashboard" style="text-decoration: none;">
											<i class="fa fa-file-o"></i><span><?php $sql = "SELECT * FROM postagem";	$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar com o Bando de Dados" . $mysqli->error); $quant = $sql_query->num_rows; echo $quant;?></span>
											<figcaption class="cat figure-caption text-right" style="font-size: 20pt; text-decoration: none;">Número de Postagens</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure dash">
										<a href="dvds.php" class="dashboard" style="text-decoration: none;">
											<i class="fa fa-youtube-square"></i><span><?php $sql = "SELECT * FROM dvds";	$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar com o Bando de Dados" . $mysqli->error); $quant = $sql_query->num_rows; echo $quant;?></span>
											<figcaption class="cat figure-caption text-right" style="font-size: 20pt; text-decoration: none;">Álbuns adicionados</figcaption>
										</a>
									</figure>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>