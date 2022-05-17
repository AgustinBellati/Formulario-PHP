<?php

  include('../../conexion.php');
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
    $msg="Error al instertar los datos.";
    var_dump($_POST);

  if (isset($_POST["codigo"],
    $_POST["categoria"],
    $_POST["subcategoria"]) 
    and $_POST["familia"] !=""
    and $_POST["subfamilia"]!=""
    and $_POST["descripcion"]!="" 
    and $_POST["proveedor"]!="" 
    and $_POST["peso_inicial"]!=""
    and $_POST["recortes"]!=""
    and $_POST["grasa"]!=""
    and $_POST["hueso"]!=""
    and $_POST["merma_proceso"]!=""
    and $_POST["fecha"]!=""
    and $_POST["estado"]!="" ){
    


  

    //Preparamos la orden SQL
    $cons1="INSERT INTO `rendimientos` (`codigo`, `categoria`, `subcategoria`, `familia`, `subfamilia`, `descripcion`, `proveedor`, `peso_inicial`, `recortes`, `grasa`, `hueso`, `merma_proceso`,`fecha`,`estado`)
    VALUES ('$codigo', '$categoria', '$subcategoria', '$familia', '$subfamilia', '$descripcion', '$proveedor', '$peso_inicial', '$recortes', '$grasa', '$hueso','$merma_proceso','$fecha','$estado')";
    //meter los datos en la tabla
    $sql=$conexion->query($cons1) or die("Error al realizar la insercion en la db ".mysqli_error($conexion));
    $msg="TODO OK!";


  
    }

    //consultar sabiendo codigo y proveedor
    elseif ($_GET['codigo'] and $_GET["proveedor"]){
       
       $codigo=$_GET['codigo'];
       $cons_llenado="SELECT * FROM rendimientos WHERE codigo='$codigo' and proveedor='$proveedor'";
       $sql_llenado=$conexion->query($cons_llenado);
       if($row=$sql_llenado->fetch_assoc()){
           
           $categoria=$row['categoria'];
           $subcategoria=$row['subcategoria'];
           $familia=$row['familia'];
           $subfamilia=$row['subfamilia'];
           $descripcion=$row['descripcion'];
          
           $peso_inicial=$row['peso_inicial'];
           $recortes=$row['recortes'];
           $grasa=$row['grasa'];
           $hueso=$row['hueso'];
           $merma_proceso=$row['merma_proceso'];
           $fecha=$row['fecha'];
           $estado=$row['estado'];
          
          
           

       }
   }
else{
      echo '<p>Por favor, complete el <a href="index.php">formulario</a></p>';
      $msg="Faltan datos!";
        
    }

    session_start();
    $_SESSION['msg']=$msg;

    echo $msg;

header("location:index.php");

?>