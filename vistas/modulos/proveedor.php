<div class="content-wrapper">

  <section class="content-header">
    
    <h1>Administrar Proveedor </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Proveedor</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpresa">Agregar proveedor</button>
        <a href="crear-proveedor"><button class="btn btn-primary">Crear accesso a proveedor</button></a>
      </div>

      <div class="box-body">
        <h3>Proveedor registrados</h3>
       <table class="table table-bordered table-striped dt-responsive tablas">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Empresa</th>
           <th>Razon social</th>
           <th>Municio o Alcaldia</th>
           <th>Calle</th>
           <th>Estado</th>
           <th>colonia</th>
           <th>Tel</th>
           <th>Status</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody>
          <?php 
            
            $item = null;
            $valor = null;
                    
            $proveedor = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

            foreach ($proveedor as $key => $value){
              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["Empresa"].'</td>
                      <td>'.$value["razon_social"].'</td>
                      <td>'.$value["rfc"].'</td>
                      <td>'.$value["calle"].'</td>
                      <td>'.$value["region"].'</td>
                      <td>'.$value["colonia"].'</td>
                      <td>'.$value["cp"].'</td>';

              if($value["estado"] != 0){
                echo '<td><button class="btn btn-success btn-xs btnActivar" idProveedor="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';    
              }else{
                echo '<td><button class="btn btn-danger btn-xs btnActivar" idProveedor="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
              } 

              echo '<td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarProveedor" idProveedor="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarProveedor"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>
                      </div>  
                    </td>
                  </tr>';
            }
          ?>
        </tbody>
       </table>
      </div>

      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Perfil</th>
           <th>Estado</th>
           <th>Último login</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody id="myTable">

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        foreach ($usuarios as $key => $value){
         
          if($value["perfil"] == "Proveedor"){

            echo ' <tr>
            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["usuario"].'</td>
            <td>'.$value["perfil"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

            }             

            echo '<td>'.$value["ultimo_login"].'</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>';
  }
          }


        ?> 

        </tbody>
       </table>
      </div>
    </div>
  </section>

</div>

<!--=====================================
MODAL AGREGAR EMPRESA
======================================-->

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#DD4B39; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Proveedor</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL EMPRESA -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoEmpresa" placeholder="Ingresar Empresa" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL RAZON SOCIAL -->
             <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevorazon_social" placeholder="Ingresar razon social" id="nuevorazon_social" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevorfc" placeholder="Ingresar razon RFC" id="nuevorfc" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA MUNICIPIO -->
             <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevomunicipio" placeholder="Ingresar Alcaldia o municipio" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevacalle" placeholder="Ingresar Calle" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaregion" placeholder="Ingresar Estado" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevacolonia" placeholder="Ingresar Colonia" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevapais" placeholder="Ingresar País" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevacp" placeholder="Ingresar CP" required>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevatel" placeholder="Ingresar No. Telefonico" required>
              </div>
            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Empresa</button>
        </div>

        <?php
          $crearEmpresa = new ControladorEmpresa();
          $crearEmpresa -> ctrAgregarEmpresa();
        ?>

      </form>
    </div>
  </div>
</div>


<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#DD4B39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg" name="nuevoPerfil">
                  <option value="">Selecionar perfil</option>
                  <option value="Proveedor">Proveedor</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 