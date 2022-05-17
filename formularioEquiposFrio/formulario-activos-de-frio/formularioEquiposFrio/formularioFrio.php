<?php
    include('../conexion.php');
    
        $descripcion=$_REQUEST['descripcion'];
        $tipo_frio=$_REQUEST['tipo'];
        $rango_min=$_REQUEST['minimo'];
        $rango_max=$_REQUEST['maximo'];
        $local=$_REQUEST['local'];
        $seccion=$_REQUEST['seccion'];
        $estado=$_REQUEST['estado'];
        $temp_vacio=$_REQUEST['vacio'];
        $imp=$_REQUEST['impreso'];
        $activo=$_REQUEST['activo'];
        $etiqueta=$_REQUEST['etiqueta'];
        $id;

    if ($_REQUEST['local'] && $_REQUEST['id']=='') {
        $id=null;
        $cons1="INSERT INTO `equipos_frio` (`id`, `descripcion`, `tipo_frio`, `rango_min`, `rango_max`, `local`, `seccion`, `estado`, `temp_vacio`, `etiqueta`, `imp`, `activo`) VALUES (NULL, '$descripcion', '$tipo_frio', '$rango_min', '$rango_max', '$local', '$seccion', '$estado', '$temp_vacio', '0', '$imp', '$activo')";
        
        $sql=$conexion->query($cons1) or die("Error al realizar la insercion en la db ".mysqli_error($conexion));

        $cons2="SELECT id, descripcion FROM equipos_frio WHERE local='$local' AND seccion='$seccion' group by local, seccion order by id desc limit 1";
        
        $sql_info=$conexion->query($cons2);

        if($row=$sql_info->fetch_assoc()){
            $id = $row['id'];
            $descripcion = strtoupper($row['descripcion']);
            $etiqueta = "TI".$id."L".$local."S".$seccion;
            $descripcion = $etiqueta." ".$descripcion;
            
            $cons3="UPDATE equipos_frio SET descripcion='$descripcion', etiqueta='$etiqueta' WHERE id=$id";
            
            $sql_upd=$conexion->query($cons3) or die(mysqli_error($conexion));

            header("location:formularioFrio.php?msg='REGISTRO actualizado'");


        }
    }
    //fetch assoc == array asociativo
    //$row array asociativo con los datos de la request
    elseif($_REQUEST['local'] && $_REQUEST['id']<>0){
        $id=$_REQUEST['id'];

        $cons2="SELECT * FROM equipos_frio WHERE id='$id'";
        $sql_info=$conexion->query($cons2);
        if($row=$sql_info->fetch_assoc()){
            $id = $row['id'];
            $descripcion = strtoupper($descripcion);
            $etiqueta = "TI".$id."L".$local."S".$seccion;
            $descripcion = $etiqueta." ".$descripcion;
          
            $cons3="UPDATE equipos_frio SET descripcion='$descripcion', etiqueta='$etiqueta', tipo_frio='$tipo_frio', rango_min='$rango_min', rango_max='$rango_max', local='$local', seccion='$seccion', estado='$estado', temp_vacio='$temp_vacio', imp='$imp', activo='$activo'  WHERE id=$id";
            $sql_upd=$conexion->query($cons3) or die(mysqli_error($conexion));
        header("location:formularioFrio.php?msg='REGISTRO actualizado'");
        }

    }

    //Levanto la info de la db
    if ($_GET['id']){
        $id=$_GET['id'];
        $cons_llenado="SELECT * FROM equipos_frio WHERE id='$id'";
        $sql_llenado=$conexion->query($cons_llenado);
        if($row=$sql_llenado->fetch_assoc()){
            $id = $row['id'];
            $descripcion = $row['descripcion'];
            $tipo_frio = $row['tipo_frio'];
            $rango_min = $row['rango_min'];
            $rango_max = $row['rango_max'];
            $local=$row['local'];
            $seccion=$row['seccion'];
            $estado=$row['estado'];
            $impreso=$row['impreso'];
            $activo=$row['activo'];
            $temp_vacio=$row['temp_vacio'];
            $etiqueta=$row['etiqueta'];
           
           
            

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ingresar equipos</title>
    <link rel="stylesheet" href="formularioFrio.css">
</head>
<body>
   <?php if($_GET['msg']){echo "<div class='' >".$_GET['msg']."</div>";}?>
<form action="#">
    <section class="form-registrer">
        <h1>Ingresar equipos:</h1>
        <input class="controls" type="number" id="id" name="id" placeholder="Id" value="<?php echo $id;?>"> 
        <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="descripcion" value="<?php echo $descripcion;?>">
       <h4>tipo de temp</h4>

        <select class="controls" name="tipo" id="tipoTemp">
            <?php echo "<option value='$tipo_frio' selected> $tipo_frio</option>";?>
            <option value="BAJA">BAJA</option>
            <option value="MEDIA">MEDIA</option>
        </select>
<h4>rango min</h4>
        <select  id="rangoMin" class="controls" name="minimo" >
        <?php echo "<option value='$' selected> $rango_min</option>";?>
           
            <option value="-45">-45</option>
            <option value="0">0</option>
        </select>
<h4>rango max</h4>
        <select  id="rangoMax" class="controls" name="maximo" >
        <?php echo "<option value='$rango_max' selected> $rango_max</option>";?>
           
            <option value="6">6</option>
            <option value="-12">-12</option>
        </select>
        
    
<h4>local</h4>
        <input class="controls" type="number" name="local" id="local"placeholder="local" min="1"  value="<?php echo $local;?>">
<h4>seccion</h4>
            <input class="controls" type="number" name="seccion" id="seccion"placeholder="seccion" min="1" value="<?php echo $seccion;?>">
<h4>estado</h4>
        <input type="range" id="estado" name="estado" min="0" max="1" step="1" value="<?php echo $estado;?>">
<h4>temperatura vacio</h4>
        <select  id="tempVacio" class="controls" name="vacio" >

        <?php echo "<option value='$temp_vacio' selected>$temp_vacio</option>";?>
            
            <option value="7">7</option>
            <option value="-11">-11</option>
        </select>
        
<h4>etiqueta</h4>
        <input class="controls" type="text"  name="etiqueta" id="etiqueta" placeholder="etiqueta" value="<?php echo $etiqueta;?>">
        <h4>impreso</h4>
        <input type="range" id="impreso" name="impreso" min="0" max="1" step="1" value="<?php echo $impreso;?>">
        <h4>activo</h4>
        <input type="range" id="activo" name="activo" min="0" max="1" > 
         
        <button class="boton cinco"type="submit">
            <div class="icono">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload" width="72" height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                    <polyline points="9 15 12 12 15 15" />
                    <line x1="12" y1="12" x2="12" y2="21" />
                  </svg>
            </div>
        <span>guardar</span>
    </button>
        <p><a href="#">ver tablas</a></p>
    </section>
 </form>


    <script src="formularioFrio.js"></script>
</body>
</html>