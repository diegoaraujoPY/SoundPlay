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
		<title>Gerenciamento - SoundPlay </title>
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
	
	<body>
		<div id="viewport">

			<div id="sidebar">
			
				<header>
				  <a>Painel de Controle</a>
				</header>
				
				<ul class="nav">
				  <li>
					<a href="dashboard.php" target="painel"><i class="fa fa-pie-chart"></i> Dashboard </a>
				  </li>
				  <li>
					<a href="../index.php" target="painel"><i class="fa fa-play"></i> Visualizar Site </a>
				  </li>
				  <li>
					<a href="postagens.php" target="painel"><i class="fa fa-folder-o"></i> Postagens</a>
				  </li>
				  <li>
					<a href="music_day.php" target="painel"><i class="fa fa-music"></i> Músicas para hoje </a>
				  </li>
				  <li>
					<a href="lancamento.php" target="painel"><i class="fa fa-file-audio-o"></i> Lançamentos </a>
				  </li>
				  <li>
					<a href="classicas.php" target="painel"><i class="fa fa-caret-square-o-right"></i> Clássicas </a>
				  </li>
				  <li>
					<a href="dvds.php" target="painel"><i class="fa fa-folder-open"></i> DVD's </a>
				  </li>
				  <li>
					<a href="configuracoes.php" target="painel"><i class="fa fa-cog"></i> Configurações </a>
				  </li>
				  <li>
					<a href="logout.php"><i class="fa fa-sign-out"></i> Sair </a>
				  </li>
				</ul>
				
				<div class="fim">
				
					<a href="perfil.php" id="notificationLink" target="painel"><i class="fa fa-user-circle-o"></i><?php $nome = $_SESSION['nome']; echo "<span style='padding: 10px; font-size: 15pt;'>$nome</span>";?></a>
					
				</div>
				
			</div>
			
				<div id="content">
					<div style="margin: 10px;" class="row embed-responsive embed-responsive-16by9 paineldecontrole">
						<iframe id="frame-spec" width="100" height="800" class="embed-responsive-item" name="painel" src="perfil.php"></iframe>
					</div>
				</div>
			
		  </div>
			
		</div>
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>