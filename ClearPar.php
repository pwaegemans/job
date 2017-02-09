<?php
class ClearPar {
	function build($string) {
		$string_origin = $string;
		$pattern_origin = array('()');
		$pattern_result = array('()');
		$string_result = preg_filter($pattern_origin, $pattern_result, $string_origin); 
		return $string_result;
	}
}
?>
<?php phpinfo(); ?>  
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
					<th style="background-color: #6699CC;">Problema 03 - Clear Par</th>
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
								$myString = new ClearPar();
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
						Usando PHP, crear una clase llamada  ClearPar  que tenga un método llamado build  que reciba como parámetro una cadena formada sólo por paréntesis ( ()()()()(()))))())((() ). El algoritmo debe eliminar todos los paréntesis que no tienen pareja.Finalmente devolver la nueva cadena.<br>
						<br>
						Indicaciones<br>
						<ul>
							<li>Crear la solución en un solo archivo llamado  ClearPar.php
							<li>El método build devuelve la salida del algoritmo
							<li>Considerar solamente cadenas formadas de paréntesis
						</ul>
						Ejemplos
						<ul>
							<li>entrada : "()())()" salida : "()()()"
							<li>entrada : "()(()" salida : "()()"
							<li>entrada : ")(" salida : ""
							<li>entrada : "((()" salida : "()"
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
