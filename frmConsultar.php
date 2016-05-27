<?php 
//para los caracteres especiales del idioma
@header("Content-Type: text/html;charset=iso-8859-1");

//incluye el archivo conectar
include('../include/Conectar.php');

//creamos un objeto instanciando la clase Conexion
$bd = new Conexion();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- para los caracteres especiales -->
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Conexiones a BD</title>
	
</head>
<body>
<header>	
	<h2 align="center">
		CARGOS REGISTRADOS
	</h2>
</header>
<section style="text-align: center;" >
		<table border="1" align="center">
		  	<tr>
		  		
		  	</tr>					  	
				<?php

					//usamos el método consultarTodo
					$sql = $bd->query($bd->consultarTodo("cargo"));
							
					
					//se recorre la consulta y se genera la tabla
					while ($cuerpoTabla = $bd->recorrer($sql)) {
						$idcargo = $cuerpoTabla['idcargo'];
						$nombre = $cuerpoTabla['nombre'];
										
						//iniciamos la fila de la tabla
						echo 	'<tr><td>
					   			'.$idcargo.'
								</td>
								<td>
					   			'.$nombre.'
								</td>';

						//mensaje para verificar si realmente desea borrar o no
						$confirmar = "return confirm('Confirmar: &iquest;Est&aacute; seguro que desea eliminar el registro?')";
														
						echo 	'
								<td>
								<a class="fade" href="../borrar/borrarCargo.php?idcargo='.$idcargo.'" title="Borrar" onclick="'.$confirmar.'"><img src="../img/iconoBorrar-mini.jpg"/></a>
								</td>
								<td >
								<a href="../modificar/modificarCargo.php?idcargo='.$idcargo.'" title="Modificar"><img src="../img/iconoModificar-mini.jpg" /></a>
								</td>';
												
						echo "</tr>";
					}
					
					//cerrar la conexión
					$bd->cerrar();
	?>
	</table>
</section>
<footer style="text-align: center;">
	Desarrollado para ITCA-FEPADE MEGATEC Zacatecoluca &copy; por Armando S&aacute;nchez
</footer>
</body>
</html>