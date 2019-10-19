<?php
include ("arriba-2.php")
?>  
                <h4>Destinos Premium</h4>
                <table>

<tr class="centro">
<td bgcolor=#484848><font color=#FFFFFF>ANI</font></td>
<td bgcolor=#484848><font color=#FFFFFF><font color=#FFFFFF>Marcado</font></td>
<td bgcolor=#484848><font color=#FFFFFF>Destino</font></td>
</tr>

<?php
$filtrar="ANSWERED";


include './conexion.php';
$conexion=$misn;
$DB=$misN;
    
    mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");
    $consulta=mysql_query("SELECT dst, count(*) as num FROM calls where disposition='$filtrar' GROUP BY dst ORDER BY num DESC limit 0, 4 ",$conexion) 
    or die ("Datos suministrados incorrectos");
 

while ($row = mysql_fetch_row($consulta)){

$cadena = $row[0];
include './conexion.php';
$conexionI=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexionI) or die ("Problemas en la seleccion en la base de datos");
    $consultaI=mysql_query("SELECT DISTINCT src FROM calls where disposition='$filtrar' and dst='$cadena' ORDER BY id DESC limit 0, 7",$conexionI) 
    or die ("Datos suministrados incorrectosI");
while ($reg=mysql_fetch_array($consultaI)) {

$ori=$reg['src']; 


            
$num = 4;
$xxx="XXXX";
$cadena1 = substr($cadena, 0, -$num);
$cadena3 = substr($ori, 0, -$num);
$cadena2=$cadena1.$xxx;
$cadena4=$cadena3.$xxx;
         echo "<tr><td>".$cadena4. "</td><td>". $row[1]."</td><td>".$cadena2."</td></tr>";
    }
 

}
?>

</table>
<?php
include ("abajo.php")
?>  

