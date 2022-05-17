<?php

    //recojo las variables
    $codigo=$_REQUEST['codigo'];
    $categoria=$_REQUEST['categoria'];
    $subcategoria=$_REQUEST['subcategoria'];
    $familia=$_REQUEST['familia'];
    $subfamilia=$_REQUEST['subfamilia'];
    $descripcion=$_REQUEST['descripcion'];
    $proveedor=$_REQUEST['proveedor'];
    $peso_inicial=$_REQUEST['peso_inicial'];
    $recortes=$_REQUEST['recortes'];
    $grasa=$_REQUEST['grasa'];
    $hueso=$_REQUEST['hueso'];
    $merma_proceso=$_REQUEST['merma_proceso'];
    $fecha=$_REQUEST['fecha'];
    $estado=$_REQUEST['estado'];
    

    $cons2="SELECT * FROM rendimientos";
    $sql=$conexion->query($cons2) or die("error ! ".mysqli_error($conexion));
    
?>