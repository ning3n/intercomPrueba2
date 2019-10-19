<?php
include ("arriba.php")
?>  
		<center> <h4 >Llamadas activas</h4><h1></h1></center>
		
		<center>
		<table>
			<thead>
				<tr >
					<td><center>Hora de inicio</center></td>
					<td><center>Duracion (seg)</center></td>
					<td><center>Orígen</center></td>
					<td><center>Destino</center></td>
					<td><center>Tarifa</center></td>
					
				</tr>


<?php


include './conexion.php';
$conexion=$misn;
$DB=$misN;
$device=$reg['primary_device_id'];
$prueba=88;	

	mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");
	$consulta=mysql_query("select * from activecalls where user_id='$prueba'",$conexion) 
	or die ("Datos suministrados incorrectosI <meta http-equiv=Refresh content=3;url=index.php>");
	while ($reg=mysql_fetch_array($consulta))
{


	
?>


				<tbody>
					<?php //while ($reg=mysql_fetch_array($consulta)) { 

						$fecha = date('Y-m-j h:i:sa');
						$calculo = $reg['start_time'];
						$segundos = strtotime($fecha) - strtotime($calculo); 



						?>
						<tr>
							<td><center><?php echo $reg['start_time'];?>
							</center></td>
							<td><center>
								<?php echo $segundos ; ?>
							</center></td>
							<td><center>
								<?php echo $reg['src'];?>
							</center></td>
							<td><center>
								<?php echo $reg['dst'];?>
							</center></td>
							<td><center>
								<?php echo substr($reg['user_rate'], 0, 6);?>
							</center></td>
							
							
						</tr>
					<?php 
}

// mysql_close($conexion); 
?>
				</tbody>
			</table>	
			<br>
			
			<br>
			





<!------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

</tbody>
			</table>


</center>
			
		
		
		<meta http-equiv=Refresh content="6;url=listado.php">

<?php
include ("abajo.php")
?>  

