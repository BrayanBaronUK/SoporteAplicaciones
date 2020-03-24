<script language= "javascript" type="text/javascript">
function MiFuncionJS(){  
    window.location='index.php';
}
function AlertaIngreso(){ 
    alert("Usuario y/o clave incorrectos");
    window.location='login.php';
}
function AlertaCampos(){  
    alert('Campo de usuario y/o clave no Indicado');
    window.location='login.php';
}
function NuevoUsuario(){  
    window.location='Nuevo_usuario.php';
} 
</script>
<?php
include_once ("conexion.php");
$conex2 = oci_connect($user, $pass, $db);
if (isset($_POST['user'],$_POST['pass'])):
	if ($_POST['user']!=""):
		if ($_POST['pass']!=""):
            $var1 = $_POST['user'];
            $var2 = $_POST['pass'];
            $var3="A";
            //$ddl_qry = "select usuario from usuarios_soporte_seg where usuario='$var1' and clave='$var2'";
            //$consulta = "EXECUTE IMMEDIATE $ddl_qry";
            $consulta="Update usuarios_soporte_seg set usuario='$var1' where usuario='$var1' and clave='$var2'";       
            //$consulta = "select COUNT(*) from usuarios_soporte_seg";
           // $consulta = "select * from usuarios_soporte_seg where usuario='$var1' and clave='$var2'";
            //$consulta = "insert into usuarios_soporte_seg values ('$var1','$var2','$var3')";           
            $queryf= oci_parse($conex2, $consulta);
            oci_execute($queryf);
            oci_commit($conex2);  
            $filas = oci_num_rows($queryf);
           // echo ("filaaaaaaaaas: $filas");
            if ($filas>0):
                if($_POST['pass']=='AVANTEL'):
                @session_start();
              //  session_register('usuario');
                $_SESSION['usuario'] = $_POST['user'];  

                echo "<script>";
                echo "NuevoUsuario();";
                echo "</script>"; 
                endif;

                @session_start();
              //  session_register('usuario');
                $_SESSION['usuario'] = $_POST['user'];                  
                 //  echo "console.log('usuario','".$_SESSION['usuario']."');";    
                
                echo "<script>";
                echo "MiFuncionJS();";
                echo "</script>";

                 else:
                //echo "error en la autenticacion";
                echo "<script>";
                echo "AlertaIngreso()";
                echo "</script>";            
            endif;
            echo "<script>";
            echo "AlertaCampos()";
            echo "</script>";      
        endif;
        echo "<script>";
        echo "AlertaCampos()";
        echo "</script>"; 
    endif;
    echo "<script>";
    echo "AlertaCampos()";
    echo "</script>"; 
endif;
OCILogoff($conex2);
?>