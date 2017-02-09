<?php
class CompleteRange {
	function build($string) {
		$string_origin = $string;
		$possible_split = array(',', ';', '.', ' ', '/');
		$pattern_origin = str_replace($possible_split, ",", $string_origin);
		//$string_result = $pattern_origin;

		$my_num_chain = preg_split('/,/', $pattern_origin, -1, PREG_SPLIT_NO_EMPTY);
		$my_num_chain2 = array_unique($my_num_chain);
		sort($my_num_chain2);
		
		$mychainstart = $my_num_chain2[0];
		$mychainstart_count = 0;
		$mychainend = 0;
		foreach ($my_num_chain2 as $value) {
			if (is_numeric($value)) {
				if ( ($mychainstart_count == 0) AND ($value >= $mychainstart) AND ($value >= 0) ) {
					$mychainstart_count = 1;
					$mychainstart = $value;
				}
				$mychainend = $value;
			}
		}

		$mychainnow = $mychainstart;
		if ($mychainend > $mychainstart) {
			while ($mychainend >= $mychainnow) {
				if (in_array($mychainnow, $my_num_chain2)) {
					$string_result .= $mychainnow;
				} else {
					$string_result .= '<font color="#FF0000">';
					$string_result .= $mychainnow;
					$string_result .= '</font>';
				}
				if ($mychainnow < $mychainend) {
					$string_result .= ', ';
				}
				$mychainnow++;
			}
		} else {
			$string_result .= 'Invalid chain for this test';
		}

		#reset($my_num_chain2);
		#$string_result .= '<br><br><br><br>all chain = '.print_r($my_num_chain2).'<br>';

		return $string_result;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<title>Complete Range - Prueba Online - Programador BackEnd - Patrick Waegemans</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>
	<body style="background-color: #FFFFFF;">
		<div align="center">
			<table border="0" cellpadding="5" cellspacing="2" width="800">
				<tr>
					<th align="center">
						<h2>Prueba Online - Programador BackEnd - Patrick Waegemans</h2>
					</th>
				</tr>
				<tr>
					<th style="background-color: #6699CC;">Problema 02 - Complete Range</th>
				</tr>

			</table>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" target="_self">
				<table width="800" align="center" cellpadding="15" cellspacing="5" bgcolor="#EEEEEE">
					<tr>
						<td width="100%" align="center">
							<b>Please, input your chain</b>
							<br>
							<br>
							<textarea name="chain_origin" rows="4" cols="50" border="1"></textarea>
							<br>
							<br>
							<input type="hidden" name="firstload" value="no">
							<input type="submit" name="Entrer" value="Send your Chain">
							<?php
							if (($_POST['firstload'] != 'no') AND ($_POST['chain_origin'] == '')) {
								echo '<br>';
								echo '<br>';
								echo '<font color="#FF0000">';
								echo 'your chain was empty';
								echo '</font>';
							} else {
								echo '<br>';
								echo '<br>';
								echo 'Origin: <br>';
								echo $_POST['chain_origin'];
								echo '<br>';
								echo '<br>';
								echo 'Result: <br>';
								$myString = new CompleteRange();
								echo $myString->build($_POST['chain_origin']);								
							}
							?>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<hr>
			<br>
			<table border="0" cellpadding="0" cellspacing="2" width="800" style="background-color: #FAFAFA;">
				<tr>
					<td>
						Usando PHP, crear una clase llamada  CompleteRange  que tenga un método llamado  build  el cual tome un parámetro de colección de números enteros positivos (1,2,3, ...n). El algoritmo debe completar si faltan números en la colección en el rango dado. Finalmente devolver la colección completa.<br>
						<br>
						Indicaciones<br>
						<ul>
							<li>Crear la solución en un solo archivo llamado  CompleteRange.php</li>
							<li>El método build devuelve la salida del algoritmo</li>
							<li>Considerar el parámetro de colecciones con números enteros positivos ordenados de manera ascendente. Ejemplo [4, 6, 7 ,10]</li>
						</ul>
						Ejemplos<br>
						<ul>
							<li>entrada : [1, 2, 4, 5] salida : [1, 2,  3 ,  4, 5]</li>
							<li>entrada : [2, 4, 9] salida : [2,  3 ,  4,  5, 6, 7, 8 , 9]</li>
							<li>entrada : [55, 58, 60] salida : [55,  56, 57,  58,  59,  60]</li>
						</ul>
					</td>
				<tr>
			</table>
			<br>
			<hr>
			<a href="mailto:pat@waegemans.com">pat@waegemans.com</a>
		</div>
	</body>
</html>