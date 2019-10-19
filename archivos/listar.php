<?php
include ("arriba-2.php")
?>  
		<center> <h4>Llamadas activas</h4><h1></h1></center>
		
		
		<table>
			<thead>
				<tr class="centro">
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
$prueba1=$_POST['gafo'];	
$prueba2=$_GET['kill'];	

if ($prueba1){
$prueba=$prueba1;
}
if ($prueba2){
$prueba=$prueba2;
}


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



			
		
		
		<meta http-equiv=Refresh content="1;url=listar.php?kill=<?php echo $prueba;?>">

<?php
include ("abajo.php")
?>  

