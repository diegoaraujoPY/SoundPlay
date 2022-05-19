<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	if(isset($_SESSION['usuario'])){
		echo "<script>";
		echo 	"window.location.replace('gerenciamento.php');";
		echo "</script>";
	}
	
	include("../_conexao/conexao.php");
	
	if(isset($_POST['usuario']) || isset($_POST['senha'])){
		
		$usuario = $mysqli->real_escape_string($_POST['usuario']);
		$senha = $mysqli->real_escape_string($_POST['senha']);
		
		$sql_code = "SELECT * FROM administrador WHERE usuario = '$usuario' AND senha = '$senha'";
		$sql_query = $mysqli->query($sql_code) or die ("Falha na execução do código SQL" . $msqli->error);
		
		$quant = $sql_query->num_rows;
		
		if($quant==1){
			
			$usuario = $sql_query->fetch_assoc();
			
			if(!isset($_SESSION)){
				session_start();
			}
			
			$_SESSION['id_adm'] = $usuario['id_adm'];
			$_SESSION['nome'] = $usuario['nome'];
			$_SESSION['sobrenome'] = $usuario['sobrenome'];
			$_SESSION['usuario'] = $usuario['usuario'];
			$_SESSION['senha'] = $usuario['senha'];
			$_SESSION['nivel'] = $usuario['nivel'];
				
			header("Location: gerenciamento.php");
		} else {
			echo "<script> alert('Usuário ou senha inválidos!!'); </script>";
		}
		
	}


?>


<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Sound Play Nordeste </title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../_logos/ícone.png"/>
		<link rel="stylesheet" href="../_css/menu.css"/>
		<link rel="stylesheet" href="_css/login.css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="_javascrit/js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	
	<script language="javascript" src="../_javascript/funcoes.js"></script>
	
	<body>
		<header class="introducao">
			<div class="content">
			
				<img class="img-fluid" id="imagem" src="../_logos/soundplay.png"/>
				
				<div class="opcoes">
					<div class="row">
						<div class="col">
							<nav class="navbar navbar-expand-lg navbar-dark categoria">
								<button style="border: 1px double #fff; margin: 10px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
									<span style="font-size: 15px;" class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
									<ul class="nav navbar-nav mt-2 mt-lg-1" type="disc">
										<li class="nav-item" onmousemove="mudaLogo('../_logos/soundplay.png')" onmouseout="mudaLogo('../_logos/soundplay.png')">
											<a class="nav-link" href="../index.php">HOME</a>
										</li>
										<li class="nav-item" onmousemove="mudaLogo('../_logos/lançamentos.png')" onmouseout="mudaLogo('../_logos/soundplay.png')">
											<a class="nav-link" href="../_páginas/lancamentos.php">LANÇAMENTOS</a>
										</li>
										<li class="nav-item dropdown dmenu">
											<li class="nav-item">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">CLÁSSICAS</a>
												<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
													<?php
													
														$sql_classicas = "SELECT * FROM classicas";
														$sql_query_classicas = $mysqli->query($sql_classicas) or die ("Erro ao se conectar com o Banco de Dados" . $mysqli->error);
														
														while($classicas = mysqli_fetch_array($sql_query_classicas)){
															$id = $classicas['id'];
															$decada = $classicas['decada'];
															
															if($decada<1990){
																echo "<li><a class='dropdown-item' href='../_páginas/classicas.php?ano=$id'>Forró Pé de Serra</a></li>";
															} else {
																
																$anoatual = date('Y');
																$decada_atual = $anoatual - $decada;
																
																if($decada_atual<10){
																	echo "<li><a class='dropdown-item' href='../_páginas/classicas.php?ano=$id'>Atualmente</a></li>";
																} else {
																	echo "<li><a class='dropdown-item' href='../_páginas/classicas.php?ano=$id'>Década de $decada</a></li>";
																}
																
															}
															
														}
													
													?>
												</ul>
											</li>
										</li>
										<li class="nav-item" onmousemove="mudaLogo('../_logos/dvd.png')" onmouseout="mudaLogo('../_logos/soundplay.png')">
											<a class="nav-link" href="../_páginas/dvds.php"> DVD'S/ÁLBUNS</a>
										</li>
										<li class="nav-item" onmousemove="mudaLogo('../_logos/sobre.png')" onmouseout="mudaLogo('../_logos/soundplay.png')">
											<a class="link-menu nav-link" href="../_páginas/sobre.php">SOBRE</a>
										</li>
									</ul>
									<div class="col">
										<ul class='nav justify-content-end' id='nav'>
											<li style="margin-right: -20px;" class='nav-item'>
												<a class='nav-link' href='https://www.instagram.com/' target="_blank"><i style="margin-top: 4px; color: #fff; font-size: 22pt;" class="fa fa-instagram" aria-hidden="true"></i></a>
											</li>
											<li class='nav-item'>
												<a class='nav-link' href='https://www.youtube.com/' target="_blank"><i style="margin-top: 4px; color: #fff; font-size: 22pt;" class="fa fa-youtube" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<div class="content wrapper">
		
		  <div class="row justify-content-center fadeInDown">
		
			<div id="formContent">
				<div class="fadeIn first">
					<h1>Administrador</h1>
				</div>
				<form method="POST" action="">
					<input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuário" required>
					<input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha" required>
					<input type="submit" class="fadeIn fourth" value="Entrar">
				</form>
			</div>
			
			<footer class="footer navbar-fixed-bottom" id="creditos">
				<div class="col">
					<p>EXCLUSIVO PARA ADMINISTRADOR</p>
				</div>
			</footer>
		  </div>
			
		</div>
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>