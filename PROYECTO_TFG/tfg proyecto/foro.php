<?php
session_start();
if(isset($_POST['salir'])){
    session_destroy();
    header("Location:index.php");
}
else{
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Foro</title>
    </head>
    <body>
        <header>
            <img src="" alt="">
            <nav>
                    <a href="temario.php">Inicio</a>
                    <a href="perfil.php">Perfil</a>
                    <a href="foro.php">Foro</a>
                    <a href="ejercicios.php">Ejercicios</a>
            </nav>
        </header>
        <div id="contenedor">
        <main>
            <H1>Foro</H1>

<?php
       $conexion=mysqli_connect("localhost","root","")
       or die ("fail 1");
       mysqli_select_db($conexion,"bdtfg")
       or die("fail 2");
       $consulta=mysqli_query($conexion,"select * from posts");
       $nfilas=mysqli_num_rows($consulta);
       if($nfilas>0){
?>
           <table border="1">
           <tr>
           <th>Fecha</th>
           <th>Titulo</th>
           <th>Cuerpo</th>
           </tr>
<?php
           for ($i=0; $i<$nfilas;$i++){
               $fila=mysqli_fetch_array ($consulta);
                print("<tr>");
                print("<td>".$fila["fecha"]."</td>");
                print("<td>".$fila["titulo"]."</td>");
                print("<td>".$fila["cuerpo"]."</td>");      
               print("</tr>");
            }
?>
           </table>
           <br>
<?php
           mysqli_close ($conexion);
        }
        
?>
        </main>
        <aside>
            <div>
                <h4>Estado</h4>
                <?php
                 print("<p>Bienvenido<p>".$_SESSION['login']);
                 print("<form action='autenticar.php' method='post'>"); 
                print("<input type='submit' name='salir' value='Salir'/>");
                print("</form>");
               ?>
            </div>
        </aside>
    </div>
        <footer id="footer2"></footer>
<?php
}
?>