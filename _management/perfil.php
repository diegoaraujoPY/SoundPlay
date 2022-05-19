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
						<h1 style="padding: 4px; color: rgba(7,69,6,1);">Painel de Controle</h1>
						<div class="row perfil">
							<div class="col-2">
								<img class="img-fluid" src="_icones/user.png"/>
							</div>
							<div class="col">
							<?php
								
								$nome = $_SESSION['nome'];
								$sobrenome = $_SESSION['sobrenome'];
								$nivel = $_SESSION['nivel'];
								$usuario = $_SESSION['usuario'];
								
								echo "<hr><span>Usuário: $usuario</span>";
								echo "<hr><span>Nome Completo: $nome $sobrenome</span>";
								
								if($nivel==1){
									echo "<hr><span>Permissão: <b>Proprietário</b></span><hr>";
								} else if($nivel==2){
									echo "<hr><span>Permissão: <b>Normal</b></span><hr>";
								};
								
							?>
							</div>
						</div>
						<table class="table">
							<tbody class="menuselecao">
							<tr>
								<td>
									<figure class="figure">
										<a href="dashboard.php" target="painel">
											<i class="fa fa-pie-chart"></i>
											<figcaption class="cat figure-caption text-right">Estatísticas</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure">
										<a href="../index.php" target="painel">
											<i class="fa fa-play"></i>
											<figcaption class="cat figure-caption text-right">Visualizar Site</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure">
										<a href="postagens.php" target="painel">
											<i class="fa fa-folder-open"></i>
											<figcaption class="cat figure-caption text-right">Postagens</figcaption>
										</a>
									</figure>
								</td>
							</tr>
							<tr>
								<td>
									<figure class="figure">
										<a href="music_day.php" target="painel">
											<i class="fa fa-music"></i>
											<figcaption class="cat figure-caption text-right">Músicas para hoje</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure">
										<a href="lancamento.php" target="painel">
											<i class="fa fa-file-audio-o"></i>
											<figcaption class="cat figure-caption text-right">Lançamentos</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure">
										<a href="classicas.php" target="painel">
											<i class="fa fa-caret-square-o-right"></i>
											<figcaption class="cat figure-caption text-right">Clássicas</figcaption>
										</a>
									</figure>
								</td>
							</tr>
							<tr>
								<td>
									<figure class="figure">
										<a href="dvds.php" target="painel">
											<i class="fa fa-folder-open"></i>
											<figcaption class="cat figure-caption text-right">DVD'S</figcaption>
										</a>
									</figure>
								</td>
								<td>
									<figure class="figure">
										<a href="configuracoes.php" target="painel">
											<i class="fa fa-cog"></i>
											<figcaption class="cat figure-caption text-right">Configurações</figcaption>
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