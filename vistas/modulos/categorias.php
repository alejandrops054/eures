<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Categoria de liniamentos
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administracion de lineamiento</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          Agregar Categoria
        </button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalLineamiento">
          Agregar Liniamiento
        </button>
      </div>

      <!--Categoria de Liniamentos-->
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>No</th>
           <th>Programa</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody id="myTable">

        <?php

          $item = null;
          $valor = null;

          $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

          foreach($categoria as $key => $value){

            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["fsno"].'</td>
                    <td>'.$value["texto"].'</td>
                    <td>
                      <div class="btn-group">    
                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                      </div>  
                    </td>
                  </tr>';
          }
        ?> 

        </tbody>
       </table>
      </div>

      <!-- -->

    </div>
  </section>
</div>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Lineamiento
    </h1>
  </section>

  <section class="content">
    <div class="box">

      <!--Liniamentos-->
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>No Programa</th>
           <th>No</th>
           <th>Programa</th>
           <th>Lineamientos</th>
           <th>Puntaje</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody id="myTable">

        <?php

          $item = null;
          $valor = null;

          $Lineamientos = ControladorLineamiento::ctrMostrarLineamientos($item, $valor);

          foreach($Lineamientos as $key => $value){

            echo '<tr>
                    <td>'.($key+1).'</td>';
                    $itemCategoria = "id";
                    $valorCategoria = $value["idcategoria"];

                    $respuestaCategoria = ControladorCategorias::ctrMostrarCategorias($itemCategoria, $valorCategoria);

             echo  '<td>'.$respuestaCategoria["fsno"].'</td>
                    <td>'.$value["lino"].'</td>
                    <td>'.$respuestaCategoria["texto"].'</td>
                    <td>'.$value["lineamiento"].'</td>
                    <td>'.$value["puntos"].'</td>
                    <td>
                      <div class="btn-group">    
                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                      </div>  
                    </td>
                  </tr>';
          }
        ?> 

        </tbody>
       </table>
      </div>

      <!-- -->

    </div>
  </section>
</div>



<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#DD4B39; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Categoria</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevafsno" placeholder="Ingresar FS y numero" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevatexto" placeholder="Ingresar Texto" required>
              </div>
            </div>

            
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>

        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>
      </form>
    </div>
  </div>
</div>


<div id="modalLineamiento" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#DD4B39; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Liniamiento</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        

        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control" id="seleccionarCategoria" name="seleccionarCategoria" required>
                  <option value="">Selecciona una categoria</option>
                  <?php 

                    $item = null;
                    $valor = null;
                    
                    $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                    
                    foreach ($categoria as $key => $value){
                      echo '<option value="'.$value["id"].'">'.$value["fsno"].' '.$value["texto"].'</option>';
                    }
                    ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevano" placeholder="Ingresar numero" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <textarea name="nuevalineamiento" class="form-control input-lg" rows="10" cols="50" required placeholder="Ingresar Lineamiento"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevapuntos" placeholder="Ingresa cuantos puntos vale" required>
              </div>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Lineamiento</button>
        </div>

        <?php

          $crearLineamiento = new ControladorLineamiento();
          $crearLineamiento -> ctrCrearLineamiento();

        ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>


