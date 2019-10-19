<?php
include ("arriba.php")
?>  

                <h4>Registro de Pruebas</h4>



                <table >
<thead>
                <tr>
                    <td bgcolor=#484848><font color=#FFFFFF>N&deg;</td>
                    <td bgcolor=#484848><font color=#FFFFFF>Fecha y Hora</td>
                    <td bgcolor=#484848><font color=#FFFFFF>n&uacute;mero de Prueba</td>
                    <td bgcolor=#484848><font color=#FFFFFF>Origen</td>
                    <td bgcolor=#484848><font color=#FFFFFF>Duración (SEG)</td>
                    

                    
                </tr>
</thead>
<tbody>


<?php
$filtrar="ANSWERED";
$filtrarES="CONTESTADA";
include './conexion.php';
$conexionn=$misn;
$DB=$misN;
    
    mysql_select_db($DB,$conexionn) or die ("Problemas en la seleccion en la base de datos");
    $consultaa=mysql_query("SELECT dst,src,real_duration,calldate FROM calls  where disposition='$filtrar'  ORDER BY calldate DESC ",$conexionn) 
    or die ("Datos suministrados incorrectos");
 
$conteo=1;  
$gafo=50;
while ($rowFF = mysql_fetch_array($consultaa)){

$PIII=$rowFF['dst'];
$srcF=$rowFF['src'];
$dur=$rowFF['real_duration'];
$date=$rowFF['calldate'];
$num = 4;
$num2 = 10;
$xxxII="XXXX";
$cadenasI = substr($srcF, 0, -$num);
$ducadenasI = substr($dur, 0, -$num2);
$cadenas2=$cadenasI.$xxxII;



include './conexion.php';
$conexionF=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexionF) or die ("Problemas en la seleccion en la base de datos");
    $consultaF=mysql_query("SELECT did FROM dids where did='$PIII'",$conexionF) 
    or die ("Datos incorrectos");

while ($rowF = mysql_fetch_array($consultaF)){

$didF=$rowF['did'];





echo "<tr><td> "."<center>". $conteo."</center>"."</td><td> "."<center>". $date."</center>"."</td><td> "."<center>". $didF."</center>"."</td><td> "."<center>".$cadenas2."</center>"."</td><td> "."<center>".round($ducadenasI,0)."</center>"."</td></tr>";
$conteo=$conteo+1;
 
if ($conteo==$gafo){
break 1;
}

}


}
?>

 </tbody>
</table>

<?php
include ("abajo.php")
?>  

