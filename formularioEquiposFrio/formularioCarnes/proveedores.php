<?php

$proveedores=$_REQUEST['option'];

$cons3="SELECT proveedor  FROM proveedores_carne" ;
$sql2=$conexion->query($cons3) or die("error ! ".mysqli_error($conexion));



?>