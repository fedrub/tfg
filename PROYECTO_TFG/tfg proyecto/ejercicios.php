<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>New Post</title>
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
        <br><br><br>
        <div id="contenedor">
        <main>
            <H1>Post</H1>
            <br>
<?php
if(isset($_POST['tema'])){
    $tema=$_POST['tema']
    $conexion=mysqli_connect("localhost","root","")
    or die ("fail 1");
    mysqli_select_db($conexion,"bdtfg")
    or die("fail 2"); 
    $consulta1=mysqli_query($conexion,"select * from presentaciones");
    $consulta3=mysqli_query($conexion,"select * from ejercicios Where Where idPresentacion=". $tema."");
    $nfilas1=mysqli_num_rows($consulta1);
    $nfilas3=mysqli_num_rows($consulta3);
    if($nfilas1>0){
        print("<form action='ejercicios.php' method='post'>");
        print("<nav>");
        print("<ul>"); 
        for ($i=0; $i<$nfilas1;$i++){            
            $fila1=mysqli_fetch_array ($consulta1);        
            print($fila1["NombreTema"]."<input type='submit' name='tema' value='".$fila1["idPresentacion"]."'>");    
        }
        print("</ul>"); 
        print("</nav>");    
        print("</form>");    
        }    
    if($nfilas3>0){
        for ($i=0; $i<$nfilas3;$i++){            
            $fila3=mysqli_fetch_array ($consulta3);
            print("<a href='ejercicio'><img src='media/img/ejercicios/encabezado/".$fila3["encabezado"]."'></a>");       
        }
    }    
}
else{
    $conexion=mysqli_connect("localhost","root","")
    or die ("fail 1");
    mysqli_select_db($conexion,"bdtfg")
    or die("fail 2"); 
    $consulta1=mysqli_query($conexion,"select * from presentaciones");
    $consulta3=mysqli_query($conexion,"select * from ejercicios Where idPresentacion= 1");
    $nfilas1=mysqli_num_rows($consulta1);
    $nfilas3=mysqli_num_rows($consulta3);
    if($nfilas1>0){
        print("<form action='ejercicios.php' method='post'>");
        print("<nav>");
        print("<ul>"); 
        for ($i=0; $i<$nfilas1;$i++){            
            $fila1=mysqli_fetch_array ($consulta1);        
            print($fila1["NombreTema"]."<input type='submit' name='tema' value='".$fila1["idPresentacion"]."'>");    
        }
        print("</ul>"); 
        print("</nav>");    
        print("</form>");    
        }    
    if($nfilas3>0){
        for ($i=0; $i<$nfilas3;$i++){            
            $fila3=mysqli_fetch_array ($consulta3);
            print("<a href='ejercicio'><img src='media/img/ejercicios/encabezado/".$fila3["encabezado"]."'></a>");       
        }
    }        
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
        <footer id="footer1"><p></p></footer>
    </body>