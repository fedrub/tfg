<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Inicio</title>
    </head>
    <body>
        <header>
            <img src="" alt="">
            
<?php
if(isset($_POST['salir'])){
    session_destroy();
    header("Location:index.php");
}
elseif(isset($_SESSION['login'])){
    header("Location:temario.php");
   }
elseif(isset($_POST['enviar']) && !isset($_SESSION['login'])){
       session_destroy();
       session_start();
       $usuario=$_POST['usuario'];
       $clave=$_POST['clave'];
       $conexion=mysqli_connect("localhost","root","")
           or die ("fail 1");
       mysqli_select_db($conexion,"bdtfg")
           or die("fail 2");
       $consulta1=mysqli_query($conexion,"SELECT * FROM usuarios where usuario='".$usuario."';");
       $nfilas1=mysqli_num_rows($consulta1);
       if($nfilas1==1){
           $fila1=mysqli_fetch_array ($consulta1);
           $consulta2=mysqli_query($conexion,"SELECT * FROM usuarios where clave='".$clave."';");
           $nfilas2=mysqli_num_rows($consulta2);
           if($nfilas2==1){
               $fila2=mysqli_fetch_array ($consulta2);
               $_SESSION['login']=$usuario;
               header("Location:temario.php");
            }
            else{
                echo'<script language="javascript">alert("Contraseña incorrecta")</script>';
                header("Location:autenticar.php");
                
            }
    
        }
        else{
            echo '<script language="javascript">alert("Usuario incorrecto")</script>';
            header("Location:autenticar.php");
    
        }
    
        mysqli_close ($conexion);
    
    }   
else{
   
   print("<form action='autenticar.php' method='post'>"); 
?>
       </header>
       <div id="contenedor">
       <main>
<table border="1" style=" width: 40%;height:200px;">
   <tr>
       <td>Login</td>
       <td><input type='text' name='usuario'style="width: 90%;"  required></td>
   </tr>
   <tr> 
       <td>Contraseña</td>
       <td><input type='password' name='clave' style="width: 90%;"  required></td>
   </tr>
</table>
<input type='submit' name='enviar' value='Enviar'    style="width: 10%; margin-top: 20px;"/>
<br><br>
<a href="registro.php" ><span>no estas registrado?</span>Registrate.</a>

<?php
   print("<p></form>");

?>
       </main>
       <aside>
           <div>
               <h4>Estado</h4>
              <p>No esta conectado<p>  
           </div>
       </aside>

   </div>
       <footer id="footer1"></footer>
   </body>
<?php
}
?>
