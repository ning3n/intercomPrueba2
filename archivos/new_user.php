<?php
include "arriba.php";
?>

      

 
       <form   action="2.php" method="post">

<center>
     <h3>Registrarse</h3> 
  
 
                                      
<table><tr><td></td><td>
<input type="text" size="50"  name="user" required="" placeholder="Username" >
</td></tr></table>

<table><tr><td></td><td>
<input type="password" size="50" name="password" required="" placeholder="Password" >
</td></tr></table>




<table><tr><td>
<input type="text" size="50"  name="email" required="" placeholder="Email" >
</td></tr></table>
                                    


<table>
    <tr>
    <td>Tipo de plan </td><td>
    <input type="radio" class="" name="plan" id="plan" value="1" />Premium
    <input type="radio" class="" name="plan" id="plan" value="2" />VozIP
    </td></tr></table>






                        <button  type="submit" onclick="myFunction()">Registrarse
                        </button>
                


<!--                                    <input type="submit" onclick="myFunction()" value="Log In" > <a href="#" class=" icon arrow"></a>-->

                                </form>

                  
                   
                     <br>
   <a href="login.php" >¿Ya tienes cuenta? Ingresa</a>
      </center> 
       <?php
include "abajo.php";
?>
