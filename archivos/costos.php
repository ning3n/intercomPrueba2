<?php
include ("arriba-2.php")


?>  
		<center> <h4>Estadisticas</h4></center>
		
		<style type="text/css">
#columna{
overflow: auto;
width: 850px;
height: 200px; /*establece la altura máxima, lo que no entre quedará por debajo y saldra la barra de scroll*/
}
</style>

<form action="costos.php" method=post><hr>
<font size=1px>Indique rango de fecha a consultar:<br>
Desde 
<select name=dd1>
<option><?php $dd1=date("d"); echo $dd1; ?></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<select name=mm1>
<option><?php $mm1=date("m");  echo $mm1;?></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>
<select name=aa1>
<option><?php $aa1=date("Y"); echo $aa1;?></option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
</select>

Hasta
<select name=dd2>
<option><?php $dd1=date("d"); echo $dd1; ?></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<select name=mm2>
<option><?php $mm1=date("m");  echo $mm1;?></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>
<select name=aa2>
<option><?php $aa1=date("Y"); echo $aa1;?></option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
</select>

<hr>
 
</font>

Origen <input type=text name=src>
Destino <input type=text name=dst>



<hr>
<input type=submit class=ibra value=buscar>
</form>
<div id='columna'>
<table>
<thead>
				<tr class="centro">
					<td>Fecha</td>
					<td>Orígen</td>
					<td>Destinatario</td>
					<td>Segundos</td>
					<td>Valor</td><!--
					<td>Tarifa usuario</td>
					<td>Segundos usr</td>
					<td>Precio usuario</td>
					<td>Tarifa revendedor</td>
					<td>Segundos rev</td>
					<td>Precio revendedor</td>-->
					
				</tr>
				<tbody>
<?php


$dd1=$_POST['dd1'];
$mm1=$_POST['mm1'];
$aa1=$_POST['aa1'];
$dd2=$_POST['dd2'];
$mm2=$_POST['mm2'];
$aa2=$_POST['aa2'];

$fecha1=$aa1."-".$mm1."-".$dd1;
$fecha2=$aa2."-".$mm2."-".$dd2;



$src=$_POST['src'];
$dst=$_POST['dst'];
$filtrar="ANSWERED";



if (isset($src) && !empty($src)) {
  $sta7=" and src LIKE '$src%' ";
}

if (isset($dst) && !empty($dst)) {
  $sta8=" and dst LIKE '$dst%' ";
}




$sta3=" and (date between '$fecha1' and '$fecha2')";


$sta1= "SELECT * FROM calls";
$sta2=" where src_device_id='$paracostos' and disposition='$filtrar'  ";
$sta9="ORDER BY id DESC";

$sta10=$sta1.$sta2.$sta3.$sta7.$sta8.$sta9;
$totalizar=0;

include './conexion.php';
$conexionII=$misn;
$DB=$misN;
	
		mysql_select_db($DB,$conexionII) or die ("Problemas en la seleccion en la base de datos");
		$consultaII=mysql_query($sta10,$conexionII) 
		or die ("Datos suministrados incorrectosII");
		while ($row=mysql_fetch_array($consultaII)) {


	$date=$row['date'];
	$src=$row['src'];  
	$dst=$row['dst']; 
	$rate=$row['provider_rate']; 
	$billsec=$row['provider_billsec']; 
	$price=$row['provider_price'];
	$rate_usr=$row['user_rate']; 
	$billsec_usr=$row['user_billsec']; 
	$price_usr=$row['user_price']; 
	$rate_rs=$row['reseller_rate']; 
	$billsec_rs=$row['reseller_billsec']; 
	$price_rs=$row['reseller_price']; 
	$multiplica=($rate_usr*$billsec_usr); 
	$totalizador=$totalizador+$billsec_usr;
            








echo "<tr><td>".$date. "</td><td>". $src."</td><td>".$dst."</td><td>".$billsec_usr."</td><td>".$multiplica."</td></tr>";/*."<td>".$rate_usr."</td>"."<td>".$billsec_usr."</td>"."<td>".$price_usr."</td>"."<td>".$rate_rs."</td>"."<td>".$billsec_rs."</td>"."<td>".$price_rs."</td></tr>";*/



	
    }
 
echo "</table> </div>";


//////////////
/*
$hstaa1= "SELECT DISTINCT(src)  FROM calls";

$sta9="ORDER BY id DESC";

$hstaa10=$hstaa1.$sta2.$sta3.$sta7.$sta8.$sta9;
$totalizador3=0;

include './conexion.php';
$conexionII=$misn;
$DB=$misN;
	
		mysql_select_db($DB,$conexionII) or die ("Problemas en la seleccion en la base de datos");
		$consultaII=mysql_query($hstaa10,$conexionII) 
		or die ("Datos suministrados incorrectosII5");
		while ($row=mysql_fetch_array($consultaII)) {


	
	$totalizador3=$totalizador3+1;


}
echo " <marquee>Origen diferentes = ";
echo $totalizador3;          
/////////////


//////////////

$hsta1= "SELECT DISTINCT(dst)  FROM calls";

$sta9="ORDER BY id DESC";

$hsta10=$hsta1.$sta2.$sta3.$sta7.$sta8.$sta9;
$totalizador2=0;

include './conexion.php';
$conexionII=$misn;
$DB=$misN;
	
		mysql_select_db($DB,$conexionII) or die ("Problemas en la seleccion en la base de datos");
		$consultaII=mysql_query($hsta10,$conexionII) 
		or die ("Datos suministrados incorrectosII4");
		while ($row=mysql_fetch_array($consultaII)) {


	
	$totalizador2=$totalizador2+1;


}
echo " destinos diferentes = ";
echo $totalizador2;          
/////////////









$mocoo=round($totalizador,0);
//number_format($numero, 2, ",", ".");
$newmocoo = number_format($mocoo, 2, ",", ".");
echo " Total de segundos en llamadas es de: ";
echo $newmocoo;
echo " Seg </marquee>";
mysql_close($conexion);*/
?>

<br>
<br>
<br>
<center>
<table>
<tr class="centro">
<td bgcolor=#484848><font color=#FFFFFF size=1><center>Pais</center></font></td>
<td bgcolor=#484848><font color=#FFFFFF size=1><center>Total de segundos</center></font></td>
</tr>
	
<?php

$msta1= "select DISTINCT(prefix) from calls";


$msto9="ORDER BY dst DESC";

$msta10=$msta1.$sta2.$sta3.$sta7.$sta8.$msto9;
$mtotalizar=0;

$mconteo=1;
include './conexion.php';
$mconexionII=$misn;
$mDB=$misN;
	
		mysql_select_db($mDB,$mconexionII) or die ("Problemas en la seleccion en la base de datos");
		$mconsultaII=mysql_query($msta10,$mconexionII) 
		or die ("Datos suministrados incorrectosII");



  	while ($row=mysql_fetch_array($mconsultaII)){

$numero=0;
$thepunisher=$row['prefix'];



$mlegal1= "SELECT * FROM destinations where prefix = '$thepunisher' ORDER BY id";


include './conexion.php';
$mconexionIII=$misn;
$mDB=$misN;
	
		mysql_select_db($mDB,$mconexionIII) or die ("Problemas en la seleccion en la base de datos");
		$mconsultaIII=mysql_query($mlegal1,$mconexionIII) 
		or die ("Datos suministrados incorrectosIII");
		if ($mrowI=mysql_fetch_array($mconsultaIII)) {

$morigen=$mrowI['name'];

	echo  "	<tr><td>".$morigen."</td>";


}


$msto21="and prefix='$thepunisher' ";
$msto9="ORDER BY dst DESC";

$msta140=$sta1.$sta2.$sta3.$sta7.$sta8.$msto21.$msto9;

include './conexion.php';
$mconexionIvI=$misn;
$mDB=$misN;
	
		mysql_select_db($mDB,$mconexionIvI) or die ("Problemas en la seleccion en la base de datos");
		$mconsultaIvI=mysql_query($msta140,$mconexionIvI) 
		or die ("Datos suministrados incorrectosII");



	
  	while ($row1b=mysql_fetch_array($mconsultaIvI)){
 $aa1= $row1b['user_billsec'] ;
$numero=($numero+$aa1);
}
echo "<td>".$numero."</td></tr>";
}

?>










</table>










		
<?php
include ("abajo.php")
?>  

