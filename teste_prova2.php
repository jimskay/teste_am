<?php

/*

stdClass Object
(
    [id] => 8371
    [name] => VESTIDO TRICOT CHEVRON
    [tags] => Array
        (
            [0] => balada
            [1] => neutro
            [2] => delicado
            [3] => festa
        )

)

*/


$arquivo = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $argv[1];
$str 	 = '';

if (file_exists($arquivo)) {
		
	$file = fopen($arquivo, 'r');
	
	while (!feof($file)) {

		$str.= fgets($file);
		
	}

	fclose($file);

	$prod = json_decode($str);
	$vx   = array();

	foreach($prod as $p => $ch) {
		foreach($ch as $prod2) {
				
			$v['id'] 	= $prod2->id;
			$v['name'] 	= $prod2->name;

			for($i=0; $i<20; $i++) {
				$vx[$i] = 0;
			}

			for($i=0; $i<20; $i++) {

				$chave = '';

				if (array_key_exists($i, $prod2->tags)) {

					$chave = $v['tags'][] = $prod2->tags[$i];					

				}

				switch ($chave) {

					case 'neutro':						
						$vx[0] = 1;						
						break;

					case 'veludo':
						$vx[1] = 1;
						break;
						
					case 'couro':
						$vx[2] = 1;
						break;

					case 'basics':
						$vx[3] = 1;
						break;

					case 'festa':
						$vx[4] = 1;
						break;															
					
					case 'workwear':
						$vx[5] = 1;
						break;

					case 'inverno':
						$vx[6] = 1;
						break;

					case 'boho':
						$vx[7] = 1;
						break;

					case 'estampas':
						$vx[8] = 1;
						break;	

					case 'balada':
						$vx[9] = 1;
						break;																											

					case 'colorido':
						$vx[10] = 1;
						break;	

					case 'casual':
						$vx[11] = 1;
						break;
						
					case 'liso':
						$vx[12] = 1;
						break;
						
					case 'moderno':
						$vx[13] = 1;
						break;

					case 'passeio':
						$vx[14] = 1;
						break;																

					case 'metal':
						$vx[15] = 1;
						break;

					case 'viagem':
						$vx[16] = 1;
						break;

					case 'delicado':
						$vx[17] = 1;
						break;							

					case 'descolado':
						$vx[18] = 1;
						break;							

					case 'elastano':
						$vx[19] = 1;
						break;
				
				}
				

			}			

			$v['tagsVector']   = $vx;
			$ver['products'][] = $v;

		}

	}

	$s = json_encode($ver);
	die($s);

}



die;
?>