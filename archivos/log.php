<?php

$username=$_POST['user'];
$password=$_POST['password'];





if(empty($username) || empty($password)){
header("Location: login.php");
exit();
}
include './conexion.php';
$conexion=$misn;
$DB=$misN;


mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");

$result = mysql_query("select * from users where username='$username' and password='$password' order by id DESC limit 1",$conexion);

if($row = mysql_fetch_array($result)){
if($row['password'] == $password){
session_start();
$_SESSION['user'] = $username;
$_SESSION['password'] = $password;
header("Location: superlog.php");




}else{





header("Location: login.php");
exit();
}
}else{
header("Location: login.php");
exit();
}







	
	

	

?>

</body>
	</html>	
