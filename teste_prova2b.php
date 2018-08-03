<?php

function verifica_similariedade($prodZ, $vetorPB) {

	$D = 0;
	$S = array();

	foreach($prodZ as $p => $ch) {
		foreach($ch as $prod2) {

			$V2 = $prod2->tagsVector;

			for($i=0; $i<20; $i++) {

				$D += (($vetorPB[$i] - $V2[$i])^2);				

			}

			$S['simil'][]= sqrt($D);
			$S['nome'][] = $prod2->name;
			$S['id'][] 	 = $prod2->id;

		}
	}

	sort($S);

	for($i=0; $i<3; $i++) {

		echo '- '.$S[2][$i].' ('.$S[0][$i].') com S='.$S[1][$i];
		echo ' ';

	}

	die;

}


$iBusca  = $argv[1];
$arquivo = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'produtos_gerados.txt';
$str 	 = '';

if (file_exists($arquivo)) {
		
	$file = fopen($arquivo, 'r');
	
	while (!feof($file)) {

		$str.= fgets($file);
		
	}

	fclose($file);

	$prodZ = $prod = json_decode($str);
	$vx   = array();

	foreach($prod as $p => $ch) {
		foreach($ch as $prod2) {
				
			if ($prod2->id == $iBusca) {

				echo 'Os três produtos mais similares ao produto '.$prod2->id.' ('.$prod2->name.') são:';
				echo ' ';

				$vetorPB = $prod2->tagsVector;
				verifica_similariedade($prodZ, $vetorPB);				
				die;
			}
			
		}

	}	

}

die;

?>