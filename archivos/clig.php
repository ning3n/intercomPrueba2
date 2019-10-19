<?php
include ("arriba-2.php")
?>  
<?php

$cantidad=$_POST['cantidad'];
$id=$_POST['id'];

include './conexion.php';
$conexion=$misn;
$DB=$misN;



	mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");
	$consulta=mysql_query("select * from devices where id=$id order by id DESC limit 1",$conexion) 
	or die ("Datos suministrados incorrectos <meta http-equiv=Refresh content=3;url=superlog.php>");
	while ($reg=mysql_fetch_array($consulta))
{
$name=$reg['name'];
}
	mysql_close($conexion);


?>
</center>       
    
 <h2 class="top-1 p0">Cli</h2>
  
         

 
     


    
 
                                                     
    
            



<form action=guardacli.php method=post>
<center><table >
<tr width=900>
<td> Nombre del Dispositivo&nbsp;&nbsp;&nbsp;&nbsp; </td> <td> N&uacute;mero&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td>Suministre CLI</td>
</tr>



<?php 


for ($i = 1; $i <= $cantidad; $i++) {

$nu=$i;



?>
<tr><td><?php echo $name; ?></td><td><?php echo $nu; ?></td><td><input type=text name="cli<?php echo $nu; ?>" required ></td></textarea></td></tr>

<?php 

}

?>


<tr>
<td colspan=5><center><input type=hidden name=id value="<?php echo $id; ?>"><input type=hidden name=cantidad value="<?php echo $cantidad; ?>"><input type=submit value=Agregar class=flecha onmouseover="this.style.background='#66bbdd'"
onmouseout="this.style.background='#55b7c8'"></center></td>
</tr>
</table>
</form>


<?php
include ("abajo.php")
?>

