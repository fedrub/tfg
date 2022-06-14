<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>perfil</title>
    </head>
    <body>
        <header>
            <img src="media/cabecera.jpg" alt="">
            
<?php
if(isset($_POST['salir'])){
    session_destroy();
    header("Location:index.php");
}
else{
    ?>
            <nav>
                    <a href="temario.php">Inicio</a>
                    <a href="perfil.php">Perfil</a>
                    <a href="foro.php">Foro</a>
                    <a href="ejercicios.php">Ejercicios</a>
            </nav>
        </header>
        <div id="contenedor">
        <main>
            <H1>Perfil</H1>
            <br>
            <?php
            $usuario=$_SESSION['login'];
            $conexion=mysqli_connect("localhost","root","")
            or die ("fail 1");
            mysqli_select_db($conexion,"bdtfg")
            or die("fail 2");
            $consulta=mysqli_query($conexion,"SELECT * FROM usuarios where usuario='".$usuario."';");
            $nfilas=mysqli_num_rows($consulta);
            if($nfilas==1){                 
                $fila=mysqli_fetch_array ($consulta);

                print("<table id='datosPerfil' border='1'>");
                print("<tr>");
                print("<td>Usuario</td>");
                print("<td>Nombre</td>");
                print("<td>Apellidos</td>");
                print("<td>Fecha de nacimiento</td>");
                print("<td>Correo electronico</td>")
                print("<td>Tiempo de descanso</td>");
                print("<td>Periodo de estudio</td>");
                print("<td>Lapso de descanso</td>");
               print("</tr>");
                print("<tr>");
                print("<td>".$fila["usuario"]."</td>");
                print("<td>".$fila["nombre"]."</td>");
                print("<td>".$fila["apellidos"]."</td>");
                print("<td>".$fila["fechaNacimiento"]."</td>");
                print("<td>".$fila["correoElectronico"]."</td>");
                switch($fila["tiempoDescanso"]){
                    case 1:
                        print("10 mins.");
                        break;
                    case 2:
                        print("15 mins.");
                        break;
                    case 3:
                        print("20 mins.");
                        break;
                    case 4:
                        print("25 mins.");
                        break;
                    case 5:
                        print("30 mins.");
                        break;
                }
                switch($fila["periodoEstudio"]){
                    case 1:
                        print("30 mins.");
                        break;
                    case 2:
                        print("45 mins.");
                        break;
                    case 3:
                        print("60 mins.");
                        break;
                    case 4:
                        print("75 mins.");
                        break;
                    case 5:
                        print("90 mins.");
                        break;
                }
                switch($fila["lapsoDescanso"]){
                    case 1:
                        print("20 mins.");
                        break;
                    case 2:
                        print("25 mins.");
                        break;
                    case 3:
                        print("30 mins.");
                        break;
                    case 4:
                        print("35 mins.");
                        break;
                    case 5:
                        print("40 mins.");
                        break;
                }
               print("</tr>");
               print("<//table>");
            }
            ?>
    <table>
        <tr>
        <td><h4>Editar Perfil</h4></td>
        <td><h4>Darse de baja</h4></td>
    </tr>
    <tr>
        <td><a href="modificarMdatos.php">Editar Mis Datos</a></td>
        <td><a href="DarseDBaja.php">Darse de Baja</a></td>
    </tr>
    </table>
    <br>
    <?php
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
    </div>
        <footer id="footer1"><p></p></footer>
    </body>
