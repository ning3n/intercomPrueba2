<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><title>INTERCOM</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>




<?php
session_start();
$username=$_SESSION['user'];
$password=$_SESSION['password'];

include './conexion.php';
$conexion=$misn;
$DB=$misN;


	mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");
	$consulta=mysql_query("select * from users where username='$username' and password='$password' order by id DESC limit 1",$conexion) 
	or die ("Datos suministrados incorrectos <meta http-equiv=Refresh content=3;url=index.php>");
	while ($reg=mysql_fetch_array($consulta))
{
$paracostos=$reg['primary_device_id'];
$gafo=$reg['id'];
}


$cos=0;
include './conexion.php';
$conex=$misn;
$DB=$misN;

	mysql_select_db($DB,$conex) or die ("Problemas en la seleccion en la base de datos");
	$consI=mysql_query("SELECT * FROM calls where src_device_id='$paracostos' ORDER BY id DESC",$conex) 
	or die ("Datos suministrados incorrectosI");
	while ($rew=mysql_fetch_array($consI)) {


$rate_usr=$rew['user_rate']; 
$billsec_usr=$rew['user_billsec'];
$pay=$rate_usr*$billsec_usr;
$cos=$cos+$pay;
}



?>



		 


<body>
<div id="topPanel">
<ul>
<li><form action=superlog.php method=post><input type=hidden name=user value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>"><input type=submit value="Principal"  class=flecha onmouseover="this.style.background='black'" onmouseout="this.style.background='#55b7c8'">
</form></li>
<li><form action=costos.php method=post><input type=hidden name=user value="<?php echo $username;?>">
<input type=hidden name=gafo value="<?php echo $gafo;?>"><input type=submit value="Estadisticas"  class=flecha onmouseover="this.style.background='black'"
onmouseout="this.style.background='#55b7c8'">
                              </form></li>
<li><form action=# method=post><input type=hidden name=user value="<?php echo $username;?>">
<input type=hidden name=gafo value="<?php echo $gafo;?>"><input type=submit value="Numeros"  class=flecha onmouseover="this.style.background='black'"
onmouseout="this.style.background='#55b7c8'">
                              </form></li>
<li><form action=listar.php method=post><input type=hidden name=user value="<?php echo $username;?>">
<input type=hidden name=gafo value="<?php echo $gafo;?>"><input type=submit value="Llamadas"  class=flecha onmouseover="this.style.background='black'"
onmouseout="this.style.background='#55b7c8'">
                              </form></li>
<li><form action=seleccion.php method=post><input type=hidden name=user value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>"><input type=submit value="Ingresar cli"  class=flecha onmouseover="this.style.background='black'" onmouseout="this.style.background='#55b7c8'">
                              </form></li>
<li><form action=bye.php method=post><input type=hidden name=paracostos value="<?php echo $paracostos;?>">
<input type=hidden name=password value="<?php echo $password;?>"><input type=submit value="Salir"  class=flecha onmouseover="this.style.background='black'"
onmouseout="this.style.background='#55b7c8'">
</form></li>
<!--<li class="active">Home</li>-->
</ul>
<a href="index.html"><img src="images/logo0.gif" title="INTERCOM" alt="INTERCOM" border="0" height="80" width="230" /></a>
<div id="headerPanelfast">



<?php
$moco=round($cos,0);
//number_format($numero, 2, ",", ".");
$newmoco = number_format($moco, 2, ",", ".");
?>

                <?php echo"<b>Bienvenido &nbsp;&nbsp;&nbsp;    </b>".$username."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <b>SALDO: " .$newmoco."</b>"; ?>



<h2>Llamada</h2>
<p>En esta seccion podra visualizar las llamadas que se encuentran activas</p>
<a href="listado.php">&nbsp; </a></div>
<div id="headerPanelsecond">
<h2>Pruebas</h2>
<p>Esta sección es un listado detallado de las pruebas realizadas</p>
<a href="pruebas.php">&nbsp; </a></div>
<div id="headerPanelthird">
<h2>Destinos</h2>
<p>Esta sección muestra un listado con los destinatarios mas frecuentes</p>
<a href="top.php">&nbsp; </a></div>
</div>



<div id="bodyPanel">




