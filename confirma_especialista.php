<script language= "javascript" type="text/javascript">
function AlertaCreacionEsp(){  
    alert('Se ha creado usuario correctamente, verificar tabla de usuarios, clave inicial AVANTEL...!');
    window.location='Especialista_creacion.php';
}
function AlertaCamposVacios(){
    window.location='Especialista_creacion.php';
} 
function TiempoEjecucion(){
  setTimeout(AlertaCamposVacios(),600000);
}
</script>
<?php

//echo "ingreso a la insersion";
include_once ("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

  $v_names=$_POST["names"];
  $v_lastname=$_POST["lastname"];
  $v_cedula=$_POST["cedula"];
  $v_phone=$_POST["phone"];
  $v_email=$_POST["email"];
  $v_cargo=$_POST["cargo"];
  $v_phone_dotacion=$_POST["phone_dotacion"];
  $v_ip=$_POST["ip"];
  $v_fecha_cre ="SYSDATE";
    
  $sql ="INSERT INTO USUARIOS_SOPORTE VALUES (SUBSTR('$v_names',1,1)||REPLACE(SUBSTR('$v_lastname',1,7),' ',''),'$v_names','$v_lastname',$v_cedula,$v_phone,'$v_email','$v_cargo',$v_phone_dotacion,'$v_ip',$v_fecha_cre)";

    $queryf= oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);

  $filas = oci_num_rows($queryf);

    if ($filas>0):

      $cons = "INSERT INTO USUARIOS_SOPORTE_SEG VALUES(SUBSTR('$v_names',1,1)||REPLACE(SUBSTR('$v_lastname',1,7),' ',''),'AVANTEL','A')";
      $queryf= oci_parse($conex2, $cons);
      oci_execute($queryf);
      oci_commit($conex2);

        echo "<script>";
        echo "AlertaCreacionEsp()";
        echo "</script>";

    else:
      echo "<script>";
      echo "TiempoEjecucion()";
      echo "</script>";

    //  echo "<script>";
   //   echo "AlertaCamposVacios()";
    //  echo "</script>";

    endif;
    //$sql = "select id_usuario, nom_libro,num_dias from reservado  where id_usuario = $v_cedula and num_dias= $v_num_dias and nom_libro = $v_nom_libro";
   /* $sql = "SELECT NOMBRES, APELLIDOS, CORREO_ELECTRONICO,FECHA_CREACION FROM USUARIOS_SOPORTE WHERE NOMBRES= $v_names AND APELLIDOS= $v_lastname and CORREO_ELECTRONICO= $v_email";
    $queryf= oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);     

    while ( $row = oci_fetch_array ($queryf)) {
    echo "Se ha creado el especialista ".$row["NOMBRES"]."  ".$row["APELLIDOS"]." de correo: ".$row["CORREO_ELECTRONICO"]; //."  con fecha: ".$row["FECHA_CREACION"];
    }
    echo"<BR>";
    oci_execute($queryf);
    oci_commit($conex2);*/
?>