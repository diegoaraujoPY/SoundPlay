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
					
						<?php
							
							$id_adm = $_SESSION['id_adm'];
							
							$sql = "SELECT * FROM administrador WHERE id_adm = '$id_adm'";
							$sql_query = $mysqli->query($sql) or die ("Erro ao se conectar ao Bando de Dados!" . $mysqli->error);
					
							$administrador = mysqli_fetch_assoc($sql_query);
							
							$nome = $administrador['nome'];
							$sobrenome = $administrador['sobrenome'];
							$usuario = $administrador['usuario'];
							$nivel = $administrador['nivel'];
							
							echo "<h1 style='padding: 40px; color: rgba(7,69,6,1);'>Dados Pessoais</h1>";
							
							echo "<form method='POST' action='edit_user.php'>";
							
							echo "<div class='mb-3'>";
							echo 	"<label for='usuario' class='form-label'>Usuário</label>";
							echo 		"<input type='text' class='form-control' value='$usuario' id='usuario' disabled required>";
							echo "</div>";
							
							echo "<div class='row'>";
							echo 	"<div class='col'>";
							echo 	"<label for='nome' class='form-label'>Nome</label>";
							echo 		"<input type='text' class='form-control' value='$nome' name='nome' id='nome' required>";
							echo 	"</div>";
							echo 	"<div class='col'>";
							echo 	"<label for='sobrenome' class='form-label'>Sobrenome</label>";
							echo 		"<input type='text' class='form-control' value='$sobrenome' name='sobrenome' id='sobrenome' required>";
							echo 	"</div>";
							echo "</div><br>";
							
							echo "<div class='mb-3'>";
							echo 	"<label for='nivel' class='form-label'>Permissão</label>";
							
							if($nivel==1){
								$permissao = "Proprietário";
							} else if($nivel==2){
								$permissao = "Normal";
							}
							
							echo 		"<select type='text' class='form-control' id='nivel' required>";
							echo 		"<option>$permissao</option>";
							echo 		"</select>";
							
							
							echo "</div>";
							
							
							echo "<div class='col' style='float: right;'>";
							echo 		"<button type='submit' class='btn btn-success' required><i class='fa fa-floppy-o' aria-hidden='true'></i>Salvar</button>";
							echo "</div>";
							
							echo 	"<div class='col' style='float: right; margin-right: 10px;'>";
							echo 		"<a class='btn btn-primary' href='configuracoes.php'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i>Voltar</a>";
							echo 	"</div>";
							
						?>
						
					</div>
		
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>