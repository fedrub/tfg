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
if(isset($_POST['enviar'])){
    $titulo=$_POST['titulo'];
    $cuerpo=$_POST['cuerpo'];

    $contador=0;

    $conexion=mysqli_connect("localhost","root","")
    or die ("fail 1");
    mysqli_select_db($conexion,"bdtfg")
    or die("fail 2");
    $insercion=mysqli_query($conexion,"INSERT INTO posts(fecha, titulo, cuerpo, usuario)VALUES(CURDATE(),'".$titulo."','".$cuerpo."','".$_SESSION['login']."')");
        print("Se ha registrado correctamente");
        header("Location:foro.php");
        mysqli_close ($conexion);
}
else{
 print("<form action='post.php' method='post'>");
?>
<table border="1" style=" width: 40%;height:200px;">
    <tr>
        <td>Titulo</td>
        <td><input type='text' name='titulo'style="width: 90%;"  required></td>
    </tr>
    <tr>
        <td>Cuerpo</td> 
        <td><textarea name="cuerpo" rows="5" cols="50"style="width: 90%;"  required></textarea></td> 
</tr>
</table>
<input type='submit' name='enviar' value='Postear' style="width: 10%; margin-top: 20px;"/>
<?php
 print("</form>");
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
</html>