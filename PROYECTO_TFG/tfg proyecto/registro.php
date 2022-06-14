<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Registro</title>
    </head>
    <body>
        <header>
            <img src="" alt="">
            
<?php
if(isset($_SESSION['login'])){
    header("Location:temas.php");
    }

elseif(isset($_POST['insertar']) && !isset($_SESSION['login'])){
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $apellidos=$_POST['apellidos'];
        $nombre=$_POST['nombre'];
        $fechaNacimiento=$_POST['fechaNacimiento'];
        $sexo=$_POST['sexo'];
        $conexion=mysqli_connect("localhost","root","")
        or die ("fail 1");
        mysqli_select_db($conexion,"bdtfg")
        or die("fail 2");
        $insercion=mysqli_query($conexion,"INSERT INTO usuarios(usuario, clave, apellidos, nombre, fechaNacimiento, sexo )VALUES('".$usuario."','".$clave."','".$apellido."','".$nombre."',".$fechaNacimiento.",'".$sexo."')");
        $consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$usuario."';");
        $nfilas=mysqli_num_rows($consulta);
        if($nfilas>0){
            $fila=mysqli_fetch_array ($consulta);
            echo '<script language="javascript">alert("Se ha registrado correctamente")</script>';
                header("Location:index.php");
            }
        
        else{
            print("error al registrarse, intentelo de nuevo");
            print('<form action="registro.php" method="post">');
?>
            <table border="1" style=" width: 40%;height:200px;">
            <tr><td>Usuario:</td><td><input type='text' name='usuario'  required/></td></tr>
            <tr><td>Clave:</td> <td><input type='password' name='clave'  required/></td></tr>
            <tr><td>Apellido:</td> <td><input type='text' name='apellido'  required/></td></tr>
            <tr><td>Nombre:</td> <td><input type='text' name='nombre'  required/></td></tr>
            <tr><td>Fecha de nacimiento:</td> <td><input type='date' name='fechaNacimiento'  required/></td></tr>
            <tr><td>Sexo:</td><td><select name='sexo'  required>
            <option value='H'>Hombre
            <option value='M'>Mujer
            </select></td></tr>
            </table>
            <input type='submit' name='insertar' value='Registrarse' />
<?php    
        print("</form>");
        }
        mysqli_close ($conexion);
    }
    
    else{
        print('<form action="registro.php" method="post">');
        ?>
        </header>
        <main>
            <H1>Listado de Posts</H1>
            <table border="1" style=" width: 40%;height:200px;">
            <tr><td>Usuario:</td><td><input type='text' name='usuario'  required/></td></tr>
            <tr><td>Clave:</td> <td><input type='password' name='clave'  required/></td></tr>
            <tr><td>Apellido:</td> <td><input type='text' name='apellido'  required/></td></tr>
            <tr><td>Nombre:</td> <td><input type='text' name='nombre'  required/></td></tr>
            <tr><td>Fecha de nacimiento:</td> <td><input type='date' name='fechaNacimiento'  required/></td></tr>
            <tr><td>Sexo:</td><td><select name='sexo'  required>
            <option value='H'>Hombre
            <option value='M'>Mujer
            </select></td></tr>
            </table>
            <input type='submit' name='insertar' value='Registrarse' />
        <?php    
                print("</form>");
    }

?>
        </main>
        <aside>
            <div>
                <h4>Estado</h4>
               <p>No esta conectado<p>  
            </div>
        </aside>
    </div>
        <footer  id="footer1"><p></p></footer>
    </body>
<?php
}
?>
