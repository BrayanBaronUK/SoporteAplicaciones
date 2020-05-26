<?php
/*
  @session_start();
  include_once("conexion.php");
  $conex1 = oci_connect($user, $pass, $db);
  $elusuario = $_SESSION['usuario'];
  $sql = "select TIPO_USUARIO from usuarios_soporte_seg where usuario='$elusuario'";
  $resultado_set = oci_parse($conex1, $sql);
  oci_execute($resultado_set);
  while (oci_fetch($resultado_set)) {
      $tipouser = oci_result($resultado_set, "TIPO_USUARIO");
  }
  if($tipouser == 'ADMIN'){
      include_once("menu_admin.php");
  }else{
      include_once("menu_user.php");
  }
  */
?>