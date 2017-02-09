<?php
class ChangeString {
	function build($string) {
		$string_origin = $string;
		$pattern_origin = array ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', '&ntilde;', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', '&Ntilde;', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		$pattern_result= array ('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', '&ntilde;', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'a', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', '&Ntilde;', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'A');
		$string_origin = utf8_decode($string_origin);
		$my_chars = preg_split('//', $string_origin);
		$my_chars = array_map('utf8_encode', $my_chars);
		$string_result = '';
		foreach ($my_chars as $value) {
			$value = htmlentities($value, ENT_QUOTES | ENT_IGNORE,"UTF-8");
			if ( ($value != '') AND (in_array($value, $pattern_origin)) ) {
				$key_origin = array_search($value, $pattern_origin);
				$new_value = $pattern_result[$key_origin];
				$string_result .= '<font color="#FF0000">';
				$string_result .= $new_value;
				$string_result .= '</font>';
			} else {
				$string_result .= $value;
			}
		}
		unset($value);
		return $string_result;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<title>Prueba Online - Programador BackEnd - Patrick Waegemans</title>
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
					<th style="background-color: #6699CC;">Problema 01 - Change String</th>
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
								$myString = new ChangeString();
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
						Usando PHP, crear una clase llamada  ChangeString  que tenga un método llamado  build el cual tome un parámetro string que debe ser modificado por el siguiente algoritmo . Reemplazar cada letra de la cadena con la letra siguiente en el alfabeto. Por ejemplo reemplazar  a  por  b  ó  c  por  d.  Finalmente devolver la cadena.<br>
						<br>
						Indicaciones<br>
						<ul>
							<li>Crear la solución en un solo archivo llamado ChangeString.php</li>
							<li>El método build devuelve la salida del algoritmo</li>
							<li>Considerar el siguiente abecedario : a, b, c, d, e, f, g, h, i,j,k,l,m,n,ñ,o,p,q,r, s, t, u, v, w, x, y, z.</li>
						</ul>
						Ejemplos<br>
						<ul>
						<li>entrada : "123 abcd*3" salida : "123 b  cde*  3"</li>
						<li>entrada : "**Casa 52" salida : "** Dbtb  52"</li>
						<li>entrada : "**Casa 52Z" salida : "**D  btb  52 A "</li>
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