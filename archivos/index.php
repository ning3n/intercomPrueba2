<?php 
include "arriba.php" ;
?>


<h2>Que es Intercom?</h2>
<p><br>Pues aqui colocar algo referente a lo que es intercom y que servicos ofrece <br><br><br><br><br></p>
<p class="dotline"><img src="images/blank.gif" alt="" height="1" width="1" /></p>

<p class="dotline"><img src="images/blank.gif" alt="" height="1" width="1" /></p>

<h3>Numeros de Prueba</h3>

<div id="testimonial">
<p>


 <table>
<thead>
                <tr>
                    <center><td bgcolor=#484848><font color=#FFFFFF size=1>Fecha</font></td>
                    <td bgcolor=#484848 ><font color=#FFFFFF>Numero de Prueba</font></td>
                    <td bgcolor=#484848><font color=#FFFFFF>Pais</font></td></center>
                    

                 
                </tr>
</thead>
<tbody>

<?php




include './conexion.php';
$conexion=$misn;
$DB=$misN;
    
    mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");
    $consulta=mysql_query("SELECT * FROM dids",$conexion) 
    or die ("Datos incorrectos");



while ($row = mysql_fetch_array($consulta)){

$did=$row['did'];

$didfecha=$row['closed_till'];
$concatenador=substr($row['did'],0,2); 
$concatenadores=substr($row['did'],0,3); 
$null="";
/*
$num = 6;
$xxx="XXXXXX";
$cadena1 = substr($did, 0, -$num);
substr($row["nombre_campo"],0,100).'...';    
$cadena2=$cadena1.$xxx;
*/
$Flecha="no";
$valum="no";
$valum2="si";
include './conexion.php';
$conexionIP=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexionIP) or die ("Problemas en la seleccion en la base de datos");
    $consultaIP=mysql_query("SELECT * FROM destinations where prefix LIKE'$concatenadores%'",$conexionIP) 
    or die ("Datos incorrectos");

if ($rowIP = mysql_fetch_array($consultaIP)){
$Flecha="si";

}


if ($Flecha==$valum2) 
{
include './conexion.php';
$conexionI=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexionI) or die ("Problemas en la seleccion en la base de datos");
    $consultaI=mysql_query("SELECT * FROM destinations where prefix LIKE'$concatenadores%'",$conexionI) 
    or die ("Datos incorrectos");

while ($rowI = mysql_fetch_array($consultaI)){
$link=$rowI['direction_code'];

}
}

if ($Flecha==$valum) 
{
include './conexion.php';
$conexionI=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexionI) or die ("Problemas en la seleccion en la base de datos");
    $consultaI=mysql_query("SELECT * FROM destinations where prefix LIKE'$concatenador%'",$conexionI) 
    or die ("Datos incorrectos");

while ($rowI = mysql_fetch_array($consultaI)){
$link=$rowI['direction_code'];

}
}




include './conexion.php';
$conexionII=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexionII) or die ("Problemas en la seleccion en la base de datos");
    $consultaII=mysql_query("SELECT * FROM directions where code='$link'",$conexionII) 
    or die ("Datos incorrectos");

while ($rowII = mysql_fetch_array($consultaII)){
$linkI=$rowII['name'];

}




            
    echo "<tr><td> "."<center>". $didfecha."</center>"."</td><td> "."<center>". $did."</center>"."</td><td> "."<center>".$linkI."</center>"."</td></tr>";
         //echo $ori. " ". $nombre." ".$prefijo."  \n";
$limite=$limite+1;

         }
    


?>
  </tbody>
</table>






</p>













<?php
include "abajo.php";

?>
