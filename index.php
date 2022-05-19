<?php

	if(!isset($_SESSION)){
		session_start();
	}
	
	include('_conexao/conexao.php');
	
	$sql_postagem = "SELECT * FROM postagem ORDER BY data_postagem desc LIMIT 1";
	$sql_query_postagem = $mysqli->query($sql_postagem) or die("Falha na execução do código SQL" . $msqli->error);
	
	while($postagem = mysqli_fetch_array($sql_query_postagem)){
		$titulo_destaque = $postagem['titulo'];
		$desc_destaque = $postagem['postagem'];
		$id_destaque = $postagem['id'];
		$data_destaque = $postagem['data_postagem'];
		$data_destaque_convertida = substr("$data_destaque", 8, -9) . "-" . substr("$data_destaque", 5, -12) . "-" . substr("$data_destaque", 0, -15);
		$imagem_destaque = $postagem['imagem'];
	}
	
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Sound Play Nordeste </title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="_logos/ícone.png"/>
		<link rel="stylesheet" href="_css/menu.css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="_javascrit/js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	
	<script language="javascript" src="_javascript/funcoes.js"></script>
	
	<body>
		<header class="introducao">
			<div class="content">
			
				<img class="img-fluid" id="imagem" src="_logos/soundplay.png"/>
				
				<div class="opcoes">
					<div class="row">
						<div class="col">
							<nav class="navbar navbar-expand-lg navbar-dark categoria">
								<button style="border: 1px double #fff; margin: 10px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
									<span style="font-size: 15px;" class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
									<ul class="nav navbar-nav mt-2 mt-lg-1" type="disc">
										<li class="nav-item" onmousemove="mudaLogo('_logos/soundplay.png')" onmouseout="mudaLogo('_logos/soundplay.png')">
											<a class="nav-link" href="index.php">HOME</a>
										</li>
										<li class="nav-item" onmousemove="mudaLogo('_logos/lançamentos.png')" onmouseout="mudaLogo('_logos/soundplay.png')">
											<a class="nav-link" href="_páginas/lancamentos.php">LANÇAMENTOS</a>
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
																echo "<li><a class='dropdown-item' href='_páginas/classicas.php?ano=$id'>Forró Pé de Serra</a></li>";
															} else {
																
																$anoatual = date('Y');
																$decada_atual = $anoatual - $decada;
																
																if($decada_atual<10){
																	echo "<li><a class='dropdown-item' href='_páginas/classicas.php?ano=$id'>Atualmente</a></li>";
																} else {
																	echo "<li><a class='dropdown-item' href='_páginas/classicas.php?ano=$id'>Década de $decada</a></li>";
																}
																
															}
															
														}
													
													?>
												
												</ul>
											</li>
										</li>
										<li class="nav-item" onmousemove="mudaLogo('_logos/dvd.png')" onmouseout="mudaLogo('_logos/soundplay.png')">
											<a class="nav-link" href="_páginas/dvds.php"> DVD'S/ÁLBUNS</a>
										</li>
										<li class="nav-item" onmousemove="mudaLogo('_logos/sobre.png')" onmouseout="mudaLogo('_logos/soundplay.png')">
											<a class="link-menu nav-link" href="_páginas/sobre.php">SOBRE</a>
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
		
		<div class="content barra wrapper">
		
		  <div class="row justify-content-center">
			<section class="col-md-8" id="principal">
				<h1 class="titulo" style="text-align: center;"> O MELHOR DA MÚSICA NORDESTINA </h1>
				
					<?php
						echo "<a style='text-decoration: none;' href='_páginas/post.php?id=$id_destaque'>";
						echo   "<div style='padding: 10px; border: hidden;' class='card mb-3 destaque'>";
						
						$num = strlen($desc_destaque);

						if($num>400){
							$desc_destaque = substr($desc_destaque,0,401).'...';
						}
					
						echo 	"<img class='card-img-top' src='_upload/$imagem_destaque' alt='Card image cap'>";
						echo 	"<div class='card-body'>";				
						echo 	"<h4 class='card-title'>$titulo_destaque</h4>";
						echo 	"<p class='card-text'>$desc_destaque.</p>";
						
						include_once('_funcoes/tempo.php');
						echo "<span style='color: black;'><b>";	
						echo tempo($data_destaque);
						echo "</b></span>";
						
						echo 	"</div>";
						echo   "</div>";
						echo "</a>";
				  ?>
				
				<div class="card-group">
					<?php
				  
						include_once('_conexao/conexao.php');
						
						
						
						$sql_postagem = "SELECT * FROM postagem ORDER BY data_postagem desc LIMIT 1, 3";
						$sql_query_postagem = $mysqli->query($sql_postagem) or die("Falha na execução do código SQL" . $msqli->error);
						
						while($postagem = mysqli_fetch_array($sql_query_postagem)){
							$titulo_post = $postagem['titulo'];
							$desc_post = $postagem['postagem'];
							$id_post = $postagem['id'];
							$data_post = $postagem['data_postagem'];
							$data_post_convertida = substr("$data_destaque", 8, -9) . "-" . substr("$data_destaque", 5, -12) . "-" . substr("$data_destaque", 0, -15);
							$imagem_post = $postagem['imagem'];
							
							$num = strlen($desc_post);

								if($num>100){
									$desc_post = substr($desc_post,0,101).'...';
								}
							
							echo "<div style='padding: 10px; border: hidden; margin: 10px' class='card postagem'>";
							echo "<img class='card-img-top' src='_upload/$imagem_post' alt='Card image cap'>";
							echo "<div class='card-body'>";
							echo "<a href='_páginas/post.php?id=$id_post' style='text-decoration: none;'><h5 class='card-title'>$titulo_post</h5></a>";
							echo "<p class='card-text'>$desc_post</p>";
							
							include_once('_funcoes/tempo.php');
							
							echo tempo($data_post);
							echo "</div>";
							echo "</div>";
							
						}
					
					?>
				</div>
				
				<div style="margin: 10px;" class="row embed-responsive embed-responsive-16by9 postagemlancamento">
					<a href="_páginas/lancamentos.php#novo">Novo Lançamento</a>
				
				<?php
				
					$sql_lance = "SELECT * FROM music_lance ORDER BY data_postagem DESC LIMIT 1";
					$sql_lance_query = $mysqli->query($sql_lance) or die ("Erro ao se conectar com o Banco de Dados" . $mysqli->error);
					
					$quant_music = $sql_lance_query->num_rows;
					
					if($quant_music!=0){
						
						while($musica_lancada = mysqli_fetch_array($sql_lance_query)){
							$nome = $musica_lancada['nome'];
							$artista = $musica_lancada['artista'];
							$descricao = $musica_lancada['descricao'];
							$link_musica = $musica_lancada['link_musica'];
							$data_post = $musica_lancada['data_postagem'];
							
							include_once("_funcoes/tempo.php");
							
							echo "<div class='row lancamentonovo' id='lancamentonovo'>";
							echo "<div class='col-4'>";
							echo "<img class='card-img-top' src='https://img.youtube.com/vi/$link_musica/maxresdefault.jpg' alt='Card image cap'>";
							echo "</div>";
							echo "<div class='col'>";
							echo 	"<h5 class='card-title'>$nome - $artista</h5>";
							echo 	"<p class='legenda card-text'>$descricao</p>";
							echo   "<div class='row'>";
							echo 	"<div class='col'>";
							echo 	   "<p class='card-text'><small class='text-muted'>" . tempo($data_post) . "</small></p>";
							echo 	"</div>";
							echo   "</div>";
							echo  "</div>";
							echo "</div>";
							
						}
						
					}

				?>
				
				</div>
				
				<div class="card-group">
				  <?php
				  
						include_once('_conexao/conexao.php');
						
						$sql_recente = "SELECT MAX(data_postagem) as data_postagem FROM postagem";
						$sql_query = $mysqli->query($sql_recente) or die ("Falha na execução do código SQL" . $msqli->error);
						
						$quant = $sql_query->num_rows;
						
						if($quant==1){
							$postagem_recente = $sql_query->fetch_assoc();
							$mais_recente = $postagem_recente['data_postagem'];
						}
						
						$sql_postagem = "SELECT * FROM postagem ORDER BY data_postagem desc LIMIT 4, 3";
						$sql_query_postagem = $mysqli->query($sql_postagem) or die("Falha na execução do código SQL" . $msqli->error);
						
						while($postagem = mysqli_fetch_array($sql_query_postagem)){
							$titulo_post = $postagem['titulo'];
							$desc_post = $postagem['postagem'];
							$data_post = $postagem['data_postagem'];
							$id_post = $postagem['id'];
							$imagem_post = $postagem['imagem'];
							
							if($num>100){
									$desc_post = substr($desc_post,0,101).'...';
								}
							
							echo "<div style='padding: 10px; border: hidden; margin: 10px' class='card postagem'>";
							echo "<img class='card-img-top' src='_upload/$imagem_post' alt='Card image cap'>";
							echo "<div class='card-body'>";
							echo "<a href='_páginas/post.php?id=$id_post' style='text-decoration: none;'><h5 class='card-title'>$titulo_post</h5></a>";
							echo "<p class='card-text'>$desc_post</p>";
							include_once('_funcoes/tempo.php');
							
							echo tempo($data_post);
							echo "</div>";
							echo "</div>";
							
						}
					
					?>
				</div><br>
				
				<hgroup id="subtitulo">
					<h1>TOP das Melhores músicas do Sua Música</h1>
					<h2>O Melhor site para download!</h2>
				</hgroup>
				
				<table class="table">
					<tbody>
						<tr>
							<td>
								<a href="https://www.suamusica.com.br/wesleysafadao/wesley-safadao-atualizou-de-novo" target="_blank">
									<img src="https://images.suamusica.com.br/CtVzPvqkjuvjDQHrTaCv5Y-GTy4=/240x240/41261/3519979/cd_cover.png" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
							<td>
								<a href="https://www.suamusica.com.br/thiagoaquino/thiago-aquino-so-pedrada-5-atomico" target="_blank">
									<img src="https://images.suamusica.com.br/8mZ7OKw3oglQQHr7QD6XPF5fNQY=/240x240/40483/3483684/cd_cover.png" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
							<td>
								<a href="https://www.suamusica.com.br/japaozin/japaozin-pen-drive-atualizado" target="_blank">
									<img src="https://images.suamusica.com.br/WavMwjV9hpBhlU98rut29bwDVNU=/240x240/46572472/3475033/cd_cover.png" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="https://www.suamusica.com.br/xandaviao/xand-aviao-ensaio-do-comandante-2022" target="_blank">
									<img src="https://images.suamusica.com.br/lWPQG0gl1GOzl01sVAPlEhumtKk=/240x240/373377/3539522/cd_cover.jpg" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
							<td>
								<a href="https://www.suamusica.com.br/zevaqueiro/ze-vaqueiro-fortaleza-2022" target="_blank">
									<img src="https://images.suamusica.com.br/Tx5aqJlPj7DiUB2iXAkVyZfotu4=/240x240/29621022/3546160/cd_cover.jpg" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
							<td>
								<a href="https://www.suamusica.com.br/unhapintada/unha-pintada-ao-vivao-2022" target="_blank">
									<img src="https://images.suamusica.com.br/CMZceK15c3Ap-XW1qSSLAZcIOlk=/240x240/filters:format(jpg)/91262/3494532/cd_cover.jpeg" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="https://www.suamusica.com.br/NATTAN/nattan-carona-no-foguete" target="_blank">
									<img src="https://images.suamusica.com.br/RvxD0793gJHmqiOWRiOMuJhDiD4=/240x240/33911503/3448665/cd_cover.png" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
							<td>
								<a href="https://www.suamusica.com.br/jonasesticado/jonas-esticado-verao-2022" target="_blank">
									<img src="https://images.suamusica.com.br/s1brXMWzSJKBXoXD9XTatK_oOzI=/240x240/filters:format(jpg)/294172/3521595/cd_cover.jpeg?1" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
							<td>
								<a href="https://www.suamusica.com.br/mcrogerinhooficial/rogerinho-na-saliencia-cd-promocional-2022-1" target="_blank">
									<img src="https://images.suamusica.com.br/M7Ctg571ZrQczJlUp1iGOJZv--E=/240x240/filters:format(jpg)/36468999/3544716/cd_cover.jpeg?2" class="thumb figure-img img-fluid rounded" width="300" height="300" alt="">
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
			
			<aside class="col-md-4">
			
				<div class="lateral content">
					<h1> O QUE TEM PARA HOJE? </h1>
					
					<?php
					
					$sql_musica = "SELECT * FROM music_day ORDER BY data_musica DESC LIMIT 8";
					$sql_musica_query = $mysqli->query($sql_musica) or die("Falha na execução do código SQL" . $msqli->error);
					
					while($musica_day = mysqli_fetch_array($sql_musica_query)){
					
						$nome = $musica_day['nome'];
						$artista = $musica_day['artista'];
						$link = $musica_day['link_youtube'];
					
					echo "<div style='margin: 20px; background-color: rgba(0,0,0,0); border: hidden;' class='musicaselect card mb-3' style='max-width: 20rem;'>";
					echo "<div style='margin: 10px;' class='row embed-responsive embed-responsive-16by9 musica'>";
					echo "<div class='nome card-header'>$nome</div>";
					echo "<h5 style='text-align: right;' class='card-title'>$artista</h5>";
					echo "<iframe width='260' height='180' class='embed-responsive-item' src='https://www.youtube.com/embed/$link'></iframe>";
					echo "</div>";
					echo "</div>";
					 
					}
					 
					?>
					 
				</div>
			</aside>
			
			<footer class="row" id="creditos">
			
				<div class="col-10">
					<p>Copyright&copy <?php $anoatual = date('Y'); echo $anoatual;?><br>
					Santa Luzia-PB, Diego Araújo</p>
				</div>
				<div class="col embed-responsive embed-responsive-4by3">
					<audio style="width: 140px; height: 30px;" controls class="embed-responsive-item" controls="controls">
						<source src="_áudio/TonOliveira-JoiaRara.mp3" type="audio/mpeg"/>
					</audio>
				</div>
			</footer>
		  </div>
			
		</div>
	  
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	  
	</body>
</html>

<?php

	$contador = "_contador/home.txt";
	
	define("adi", 1);
	
	$id = fopen($contador,"r+");
	$conteudo = fread($id,filesize($contador));
	fclose($id);
	clearstatcache();
	
	$conteudo += adi;
	
	$id = fopen($contador,"r+");
	fwrite($id, $conteudo, strlen($conteudo) + 5);
	
	fclose($id);
	clearstatcache();
	
	$visualizacao = mysqli_connect('localhost','root','','soundplay') or die ("Erro ao se conectar ao Banco de Dados");
	$sql = "UPDATE visualizacoes SET num = '$conteudo' WHERE id = 1";
	mysqli_query($visualizacao,$sql) or die ("Erro ao tentar cadastrar registro");
	mysqli_close($visualizacao);

?>