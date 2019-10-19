<?php
include "arriba.php";
?>

  
       <form   action="log.php" method="post">


    
<center> 
<h3>Iniciar Seccion</h3>
                         
<table><tr><td></td><td>
<input type="text" size="50" class="form-control" name="user" required="" placeholder="Username" >
</td></tr></table>
                                   
<table><tr><td></td><td>
<input type="password" size="50" class="form-control" name="password" required="" placeholder="Password" >
</td></tr></table>





                        <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit" >Log In
                        </button>
               

<!--                                    <input type="submit" onclick="myFunction()" value="Log In" > <a href="#" class=" icon arrow"></a>-->

                                </form>
 
                        <a href="recuperar_pass.php" class="text-muted"><i class="md md-ibra3"></i> Olvidaste tu contraseña?</a>
                   
                     
   <a href="new_user.php" class="text-muted">Crear cuenta</a>
       
       </center>     


  <?php
include "abajo.php";
?>
