<?php
	
	
	function tempo($data_inserida){
		
		if($data_inserida!=0){
		
			date_default_timezone_set('America/Sao_Paulo');
			
			$date = date('Y-m-d H:i:s');
			$data_unix = strtotime($date);
			
			$data_unix_inserida = strtotime($data_inserida);
			
			$diferenca = $data_unix - $data_unix_inserida;
			
			if($diferenca<=60){
				echo "Agora Mesmo<hr>";
			} else if ($diferenca>60 and $diferenca<=3600){
				$minutos = str_replace(".", "", substr(($diferenca / 60), 0,2));
				
				if($minutos<2){
					echo "Postado há $minutos minuto";
				} else {
					echo "Postado há $minutos minutos";
				}
				
			} else if ($diferenca>=3600 and $diferenca < 86400){
				$hora = str_replace(".", "", substr(($diferenca / 3600), 0,2));
				if($hora<2){
					echo "Postado há $hora hora";
				} else {
					echo "Postado há $hora horas";
				}
			} else if ($diferenca>=86400 and $diferenca < 604800){
				$dia = str_replace(".", "", substr(($diferenca / 86400), 0,2));
				if($dia<2){
					echo "Postado há $dia dia atrás";
				} else {
					echo "Postado há $dia dias atrás";
				}
			} else if ($diferenca>=604800 and $diferenca < 2635200){
				$semana = str_replace(".", "", substr(($diferenca / 604800), 0,2));
				if($semana<2){
					echo "Postado há $semana semana atrás";
				} else {
					echo "Postado há $semana semanas atrás";
				}
			} else if ($diferenca>=2635200){
				$mes = str_replace(".", "", substr(($diferenca / 2635200), 0,2));
				if($mes<2){
					echo "Postado há $mes mês atrás";
				} else {
					echo "Postado há $mes meses atrás";
				}
			}
		}
	}
	
?>