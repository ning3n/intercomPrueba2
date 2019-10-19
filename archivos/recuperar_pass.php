
<?php
include "arriba.php";

?>
 
       <form   action="recuperar_pass.php" method="post">


    
 
                                                     <div class="form-group">
    
                <div class="col-xs-12">
<table><tr><td><i class="md md-ibra1"></i></td><td>
<input type="text" size="50" class="form-control" name="user" required="" placeholder="Usuario" >
</td></tr></table>
                                        </div>
</div>





<div class="form-group text-right m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit" onclick="myFunction()">Recuperar
                        </button>
                    </div>
                </div>


<!--                                    <input type="submit" onclick="myFunction()" value="Log In" > <a href="#" class=" icon arrow"></a>-->

                                </form>
 <div class="form-group m-t-30">
                    <div class="col-sm-7">
                        <a href="login.php" class="text-muted"><i class="md md-ibra3"></i> Ingresar</a>
                    </div>
                    <div class="col-sm-5 text-right">
                     
   <a href="new_user.php" class="text-muted">Crear cuenta</a>
       
             </div>
                </div>

            <?php

$username=$_POST['user'];
if ($username){
include './conexion.php';
$conexion=$misn;
$DB=$misN;

    mysql_select_db($DB,$conexion) or die ("Problemas en la seleccion en la base de datos");
    $consulta=mysql_query("select * from users where username ='$username' order by id DESC limit 1",$conexion) 
    or die ("Problemas al buscar.".mysql_error());
    if ($reg=mysql_fetch_array($consulta))
{
$passwordRE=$reg['password'];
echo "<center>El Password para el usuario es: ".$passwordRE."</center>";


}
}else{

echo "<center>El usuario no existe en nuestos registros.</center>";


}
    mysql_close($conexion);

include "abajo.php";
?> 
            
  
