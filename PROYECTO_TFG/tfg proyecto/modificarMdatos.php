<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Modificar</title>
    </head>
    <body>
        <header>
            <img src="media/cabecera.jpg" alt="">
            <nav>
                    < <a href="temario.php">Inicio</a>
                    <a href="perfil.php">Perfil</a>
                    <a href="foro.php">Foro</a>
                    <a href="ejercicios.php">Ejercicios</a>

        </header>
        <br><br><br>
        <div id="contenedor">
        <main>
            <H1>Editar Datos</H1>
            <br>
<?php
if(isset($_POST['enviar'])){
    $clave=$_POST['clave'];
    $apellido=$_POST['apellido'];
    $nombre=$_POST['nombre'];
    $fechaNacimiento=$_POST['fechaNacimiento'];
    $correoElectronico=$_POST['correoElectronico'];
    $sexo=$_POST['sexo'];
    $tiempoDescanso=$_POST['tiempoDescanso'];
    $periodoEstudio=$_POST['periodoEstudio'];
    $lapsoDescanso=$_POST['lapsoDescanso'];
    $conexion=mysqli_connect("localhost","root","")
    or die ("fail 1");
    mysqli_select_db($conexion,"bdtfg")
    or die("fail 2"); 
    $alteracion=mysqli_query($conexion,"UPDATE usuarios SET clave='".$clave."',apellidos='".$apellido."',nombre='".$nombre."',fechaNacimiento='".$fechaNacimiento."',correoElectronico='".$correoElectronico."',sexo='".$sexo."',tiempoDescanso='".$tiempoDescanso."',periodoEstudio='".$periodoEstudio."',lapsoDescanso='".$lapsoDescanso."'  WHERE usuario='".$_SESSION['login']."';");
    $consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$_SESSION['login']."';");
    $nfilas=mysqli_num_rows($consulta);
    if($nfilas>0){
        $fila=mysqli_fetch_array ($consulta);
        header("Location:perfil.php");
    }
    else{
        print("Error en la modificacion de los datos");
    }
}
else{
    $conexion=mysqli_connect("localhost","root","")
    or die ("fail 1");
    mysqli_select_db($conexion,"bdtfg")
    or die("fail 2"); 
    $consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$_SESSION['login']."';");
    $nfilas=mysqli_num_rows($consulta);
    if($nfilas>0){
    $fila=mysqli_fetch_array ($consulta);
    print("<form action='modificarMdatos.php' method='post'>"); 
    Print("<table border='1' style=' width: 40%;height:200px;'>
            <tr><td>Clave:</td> <td><input type='password' name='clave' placeholder=".$fila["clave"]."  required/></td></tr>
            <tr><td>Apellido:</td> <td><input type='text' name='apellido' placeholder=".$fila["apellido"]."  required/></td></tr>
            <tr><td>Nombre:</td> <td><input type='text' name='nombre' placeholder=".$fila["nombre"]."  required/></td></tr>
            <tr><td>Fecha de nacimiento:</td> <td><input type='date' name='fechaNacimiento' placeholder=".$fila["fechaNacimiento"]."  required/></td></tr>
            <tr><td>Correo electronico:</td><td><input type='text' name='correoElectronico' placeholder=".$fila["correoElectronico"]." required/></td></tr>
            <tr><td>Sexo:</td><td><select name='sexo'  required>
            <option value='H'>Hombre
            <option value='M'>Mujer
            </select></td></tr>
            <tr><td>Tiempo de descanso:</td><td><select name='tiempoDescanso'  required>
            <option value='1'>10 mins.
            <option value='2'>15 mins.
            <option value='3'>20 mins.
            <option value='4'>25 mins.
            <option value='5'>30 mins.
            </select></td></tr>
            <tr><td>Periodo de estudio:</td><td><select name='periodoEstudio'  required>
            <option value='1'>30 mins.
            <option value='2'>45 mins.
            <option value='3'>60 mins.
            <option value='4'>75 mins.
            <option value='5'>90 mins.
            </select></td></tr>
            <tr><td>Lapso de descanso:</td><td><select name='lapsoDescanso'  required>
            <option value='1'>20 mins.
            <option value='2'>25 mins.
            <option value='3'>30 mins.
            <option value='4'>35 mins.
            <option value='5'>40 mins.
            </select></td></tr>
            </table>
    <input type='submit' name='enviar' value='Modificar' style='width: 10%; margin-top: 20px;'/>");
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
        <footer id="footer2"></footer>
    </body>