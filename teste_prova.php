<?php

function verificaSomas($m)
{

	$max    = count($m);
	$somaD2 = $somaD1  = $somaL = $somaC = $col = 0;
	 
	// Faz as somas linhas, colunas e diagonal
	for($i=0; $i<$max; $i++) {
		for ($j=0;$j<$max;$j++) {

			$somaL+= $m[$i][$j];
			$somaC+= $m[$j][$i];
			
			//Soma diagonal 1

			if($i == $j) {
				$somaD1+= $m[$i][$j];
			}

			//Soma diagonal 2

			if($i+$j == ($max-1)) {
				$somaD2+= $m[$i][$j];
			}
		}		

		//Soma linhas
		$somaLF[] = $somaL;		
		$somaL 	  = 0;

		// Soma Colunas
		$somaCF[] = $somaC;		
		$somaC 	  = 0;

	}


	// Verifica as somas das Linhas
	$max 	= count($somaLF);
	$S1   	= $somaLF[0];
	$somaOk = 0;

	for($i=1; $i<$max; $i++) {
		if ($somaLF[$i] == $S1) {
			$somaOk++;
			$S1 = $somaLF[$i];
		}
	}

	if (!($somaOk == ($max-1))) {
		echo 'Não é um quadrado perfeito';
	}

	// Verifica as somas das Colunas
	$max 	= count($somaCF);
	$S2   	= $somaCF[0];
	$somaOk = 0;

	for($i=1; $i<$max; $i++) {
		if ($somaCF[$i] == $S2) {
			$somaOk++;
			$S2 = $somaCF[$i];
		}
	}

	if (!($somaOk == ($max-1))) {
		echo 'Não é um quadrado perfeito';
	}

	// Se for um quadrado perfeito, entra nesta condição	
	if ($S1 == $S2 && $S1 == $somaD1 &&  $somaD1 == $somaD2 && $S2 == $somaD2) {

		echo 'O quadrado é perfeito!';

	} else {

		echo 'Não é um quadrado perfeito';

	}
	

}

function limpaString($str)
{

	$max   = strlen($str);
	$limpa = '';
	
	for($i=0; $i<$max; $i++) {		

		if ($str[$i] != ' ' && $str[$i] != ';' && $str[$i] != ':' && $str[$i] != '' && $str[$i] != PHP_EOL) {

			 $limpa.= $str[$i];			

		} else if ($str[$i] == ' ' || $str[$i] == ';' || $str[$i] == ':' || $str[$i] == '') {

			$matriz[] = $limpa;
			$limpa   = '';			

		}

	}

	$matriz[] = $limpa;

	return $matriz;

}

function lerArquivo($arquivo)
{

	if (file_exists($arquivo)) {
		
		$file = fopen($arquivo, 'r');
		
		while (!feof($file)) {

			$str 		= fgets($file);
			$matrizF[] 	= limpaString($str);		
		
		}

		fclose($file);

		return $matrizF;

	}

}

$arquivo = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $argv[1];
$m = lerArquivo($arquivo);
verificaSomas($m);

?>