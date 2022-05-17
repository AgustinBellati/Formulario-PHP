
<?php
    include('../../conexion.php');
   include('consulta.php');

?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   
    <div class="container-fluid">
        <br>
        <div class="row">
        
            <div class="col-md-3">
                
                <div class="card">
                    <div class="card-header">
                       ingrese los cortes
                    </div>
                    <div class="card-body"> 
                        <form action="enviar.php" method="POST" enctype="multipart/form-data">
                            <?php
                                session_start();
                                if ($_SESSION['msg']) {
                                    $msg=$_SESSION['msg'];
                                    echo '<div class="alert alert-primary" role="alert">'.strtoupper($msg).'</div>';
                                    $_SESSION['msg']=null;
                                }
                            ?>

                            <fieldset <?php echo $bloqueo;?>>
                               
                                <!-- fecha -->
                                <div class="mb-3 row">
                                                <!-- <label for="fecha" class="col-sm-12 col-form-label">fecha</label> -->
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control"  name="fecha" id="fecha" value="<?php echo $fecha;?>">
                                                </div>
                                            </div>
                                       
                                <!-- codigo -->
                                    <div class="mb-3 row">
                                        <!-- <label for="codigo" class="col-sm-12 col-form-label">codigo</label> -->
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  name="codigo" id="codigo"  placeholder="Ingrese codigo"  value="<?php echo $codigo;?>">
                                        </div>
                                    </div>
                                <!-- categoria -->
                                    <div class="mb-3 row">
                                        <!-- <label for="categoria" class="col-sm-12 col-form-label">categoria</label> -->
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="categoria" id="categoria"  placeholder="Ingrese la categoria"  value="<?php echo $categoria;?>">
                                        </div>
                                    </div>
                                    <!-- subcategoria -->
                                    <div class="mb-3 row">
                                        <!-- <label for="subcategoria" class="col-sm-12 col-form-label">subcategoria</label> -->
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="subcategoria" id="subcategoria"  placeholder="Ingrese la subcategoria"  value="<?php echo $subcategoria;?>">
                                        </div>
                                    </div> 
                                      <!-- Familia -->
                                      <div class="mb-3 row">
                                        <!-- <label for="Familia" class="col-sm-12 col-form-label">Familia</label> -->
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="familia" id="familia"  placeholder="Ingrese la Familia"  value="<?php echo $familia;?>">
                                        </div>
                                    </div> 
                                     <!-- subfamilia -->
                                     <div class="mb-3 row">
                                        <!-- <label for="subfamilia" class="col-sm-12 col-form-label">subfamilia</label> -->
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="subfamilia" id="subfamilia"  placeholder="Ingrese la subfamilia"  value="<?php echo $subfamilia;?>">
                                        </div>
                                    </div>   
                                    
                                  <!-- descrpcion -->
                                  <div class="mb-3 row">
                                        <!-- <label for="descrpcion" class="col-sm-12 col-form-label">descrpcion</label> -->
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="descripcion" id="descripcion"  placeholder="Ingrese la descripcion"  value="<?php echo $descripcion;?>">
                                        </div>
                                    </div>
                                      <!-- proovedor -->
                                  <div class="mb-3 row">
                                        <!-- <label for="proveedor" class="col-sm-12 col-form-label">proveedor</label> -->
                                        <div class="col-sm-12">
                                        <select name="proveedor"class="form-control" id="proveedor"  placeholder="Ingrese la proveedor" name="select">
                                            <?php
                                             include('proveedores.php');
                                            while($row2=$sql2->fetch_assoc()){
                                                $proveedores=$row2['proveedor'];
                                              echo "<option name='option' value='$proveedores'>$proveedores</option>";
                                            }
                                                
                                                
                                                   
                                            ?>
                                         </select>
                                            <!-- <input type="" class="form-control"  name="proveedor" id="proveedor" required placeholder="Ingrese la proveedor"  value="<?php echo $proveedor;?>"> -->
                                        </div>
                                    </div>
                                            <!-- peso inicial -->
                                  <div class="mb-3 row">
                                        <!-- <label for="peso inicial" class="col-sm-12 col-form-label">peso inicial</label> -->
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  step="0.1" name="peso_inicial" id="peso_inicial"  placeholder="Ingrese la peso inicial"  value="<?php echo $peso_inicial;?>">
                                        </div>
                                    </div>
                                           <!-- recortes -->
                                  <div class="mb-3 row">
                                        <!-- <label for="recortes" class="col-sm-12 col-form-label">recortes</label> -->
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  step="0.1" name="recortes" id="recortes"  placeholder="Ingrese los recortes"  value="<?php echo $recortes;?>">
                                        </div>
                                    </div>
                                   
                                             <!-- grasa -->
                                  <div class="mb-3 row">
                                        <!-- <label for="grasa" class="col-sm-12 col-form-label">grasa</label> -->
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  step="0.1" name="grasa" id="grasa"  placeholder="Ingrese grasa"  value="<?php echo $grasa;?>">
                                        </div>
                                    </div>

                                        <!-- hueso -->
                                    <div class="mb-3 row">
                                        <!-- <label for="hueso" class="col-sm-12 col-form-label">hueso</label> -->
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  step="0.1" name="hueso" id="hueso"  placeholder="Ingrese hueso"  value="<?php echo $hueso;?>">
                                        </div>
                                    </div>

                                        <!-- merma -->
                                    <div class="mb-3 row">
                                        <!-- <label for="merma" class="col-sm-12 col-form-label">merma</label> -->
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  step="0.1" name="merma_proceso" id="merma_proceso"  placeholder="Ingrese la merma"  value="<?php echo $merma_proceso;?>">
                                        </div>
                                    </div>
                                    
                                     <!-- estado -->
                                     <div class="mb-3 row">
                                      
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  name="estado" id="estado" placeholder="estado">
                                        </div>
                                    </div>
                               
                                    <div class="mb-3 row">
                                        <div class="offset-sm-2 col-sm-10">
                                              <a href="../../index.php" class="btn btn-primary">INICIO</a>
                                            <button type='submit' class='btn btn-success'>Guardar</button>            
                                           
                                        </div>
                                        </div>
                                  
                            </fieldset>           
                        </form>
                    </div>
                </div>
            </div>

            <?php require("get_table.php")?>

            <div class="col-md-9">
              <table class="table table-light table-striped table-sm">
                  <thead>
                  
                  <th scope="col">codigo</th>
                  <th scope="col">categoria</th>
                  <th scope="col">subcategoria</th>
                  <th scope="col">familia</th>
                  <th scope="col">subfamilia</th>
                  <th scope="col">descripcion</th>
                  <th scope="col">proveedor</th>
                  <th scope="col">peso inicial</th>
                  <th scope="col">recortes</th>
                  <th scope="col">grasa</th>
                  <th scope="col">hueso</th>
                  <th scope="col">merma</th>
                  <th scope="col">fecha</th>
                  <th scope="col">estado</th>
              </tr>
                  </thead>

                  <tbody>
                   
                        <?php 
                            while($row=$sql->fetch_assoc()){
                                $codigo=$row['codigo'];
                                $categoria=$row['categoria'];
                                $subcategoria=$row['subcategoria'];
                                $familia=$row['familia'];
                                $subfamilia=$row['subfamilia'];
                                $descripcion=$row['descripcion'];
                                $proveedor=$row['proveedor'];
                                $peso_inicial=$row['peso_inicial'];
                                $recortes=$row['recortes'];
                                $grasa=$row['grasa'];
                                $hueso=$row['hueso'];
                                $merma_proceso=$row['merma_proceso'];
                                $fecha=$row['fecha'];
                                $estado=$row['estado'];

                       
                    
    
                            echo "<tr>";
                                echo "<td>$codigo</td>";
                                echo "<td>$categoria</td>";
                                echo "<td>$subcategoria</td>";
                                echo "<td>$familia</td>";
                                echo "<td>$subfamilia</td>";
                                echo "<td>$descripcion</td>";
                                echo "<td>$proveedor</td>";
                                echo "<td>$peso_inicial</td>";
                                echo "<td>$recortes</td>";
                                echo "<td>$grasa</td>";
                                echo "<td>$hueso</td>";
                                echo "<td>$merma_proceso</td>";
                                echo "<td>$fecha</td>";
                                echo "<td>$estado</td>";
                            echo "</tr>";
                         } 
                         ?>
                  
                  
                  </tbody>
              </table>
              
            </div>
        </div>
    </div>
</body>
</html>



