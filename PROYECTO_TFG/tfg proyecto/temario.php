<?php
session_start();
if(isset($_POST['salir'])){
    session_destroy();
    header("Location:index.php");
}
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
elseif(isset($_POST['tema'])){
    $tema=$_POST['tema']
    $conexion=mysqli_connect("localhost","root","")
    or die ("fail 1");
    mysqli_select_db($conexion,"bdtfg")
    or die("fail 2");
    $consulta1=mysqli_query($conexion,"select * from presentaciones");
    $consulta3=mysqli_query($conexion,"select * from presentaciones Where idPresentacion=". $tema."");
    $consulta4=mysqli_query($conexion,"select * from ejerciciosResueltos  Where idPresentacion=". $tema."");
    $nfilas1=mysqli_num_rows($consulta1);
    $nfilas3=mysqli_num_rows($consulta3);
    $nfilas4=mysqli_num_rows($consulta4);
    if($nfilas1>0){
       print("<form action='temario.php' method='post'>");
       print("<nav>");
       print("<ul>"); 
       for ($i=0; $i<$nfilas1;$i++){            
           $fila1=mysqli_fetch_array ($consulta1);        
           print($fila["NombreTema"]."<input type='submit' name='tema' value='".$fila1["idPresentacion"]."'>");    
       }
       print("</ul>"); 
       print("</nav>");    
       print("</form>");    
   
       }
       if($nfilas3>0){
           for ($i=0; $i<$nfilas3;$i++){            
               $fila3=mysqli_fetch_array ($consulta3);        
               print("<img src='media/img/temario/".$fila3["NombreTema"]."/".$fila3["url"]."'>");   
               print("<p></p>");
           }
       }
   
       if($nfilas4>0){
           for ($i=0; $i<$nfilas4;$i++){            
               $fila4=mysqli_fetch_array ($consulta4);        
               print("<img src='media/img/ejerciciosResueltos/".$fila4["encabezado"]."'>");
               print("<img src='media/img/ejerciciosResueltos/".$fila4["resultado"]."'>");   
               print("<p></p>"); 
           }
       }
       mysqli_close ($conexion);
   
   }
else{
 $conexion=mysqli_connect("localhost","root","")
 or die ("fail 1");
 mysqli_select_db($conexion,"bdtfg")
 or die("fail 2");
 $consulta1=mysqli_query($conexion,"select * from presentaciones");
 $consulta3=mysqli_query($conexion,"select * from presentaciones Where idPresentacion=1");
 $consulta4=mysqli_query($conexion,"select * from ejerciciosResueltos  Where idPresentacion=1");
 $nfilas1=mysqli_num_rows($consulta1);
 $nfilas3=mysqli_num_rows($consulta3);
 $nfilas4=mysqli_num_rows($consulta4);
 if($nfilas1>0){
    print("<form action='temario.php' method='post'>");
    print("<nav>");
    print("<ul>"); 
    for ($i=0; $i<$nfilas1;$i++){            
        $fila1=mysqli_fetch_array ($consulta1);        
        print($fila["NombreTema"]."<input type='submit' name='tema' value='".$fila1["idPresentacion"]."'>");    
    }
    print("</ul>"); 
    print("</nav>");    
    print("</form>");    

    }
    if($nfilas3>0){
        for ($i=0; $i<$nfilas3;$i++){            
            $fila3=mysqli_fetch_array ($consulta3);        
            print("<img src='media/img/temario/".$fila3["NombreTema"]."/".$fila3["url"]."'>");   
            print("<p></p>");
        }
    }

    if($nfilas4>0){
        for ($i=0; $i<$nfilas4;$i++){            
            $fila4=mysqli_fetch_array ($consulta4);        
            print("<img src='media/img/ejerciciosResueltos/".$fila4["encabezado"]."'>");
            print("<img src='media/img/ejerciciosResueltos/".$fila4["resultado"]."'>");   
            print("<p></p>"); 
        }
    }
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