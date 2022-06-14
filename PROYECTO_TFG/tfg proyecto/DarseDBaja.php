<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>baja</title>
    </head>
    <body>
        <header>
            <img src="" alt="">
            <nav>
                    <a href="temario.php">Inicio</a>
                    <a href="perfil.php">Perfil</a>
                    <a href="foro.php">Foro</a>
            </nav>
        </header>
        <br><br><br>
        <div id="contenedor">
        <main>
            <H1>Darse de baja</H1>
            <br>
<?php
if(isset($_POST['borrar'])){
    $usuario=$_SESSION['login'];
  $conexion=mysqli_connect("localhost","root","")
  or die ("fail 1");
  mysqli_select_db($conexion,"bdtfg")
  or die("fail 2");
$sentencia=mysqli_query($conexion,"DELETE FROM usuarios WHERE usuario='".$usuario."'");
session_destroy();
    mysqli_close ($conexion);
    header("Location:index.php");
}

elseif(isset($_POST['cancelar'])){
    header("Location:perfil.php");
}

else{
    print('<div style=" background-color:white;height: 80%;width: 25%;margin:auto;    border:3px double #006bb3;">');
    print("<form action='DarseDBaja.php' method='post'>");
    print("<p>Seguro que quiere darse de baja?</p>");
    print("<br>");
    print("<input type='submit' name='borrar' value='Borrar'/><p>");
    print("<input type='submit' name='cancelar' value='Cancelar'/><p>");
    print("</form>");
    print("<br>");
    print("</div>");
    print("<br>");
    print("<br>");

   
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
        <footer id="footer1"></footer>
    </body>