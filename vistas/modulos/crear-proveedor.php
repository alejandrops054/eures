<div class="content-wrapper">

  <section class="content-header">
    <h1>usuario proveedor</h1> </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">usuario proveedor</li>
    </ol>
  </section>

  <form role="form" method="post" enctype="multipart/form-data">

    <div class="modal-body">
        <div class="box-body">

        <!-- ENTRADA PARA EL EMPRESA -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoPerfil" >
                    <option value="">Selecciona proveedor</option>
                    <?php 
                        $item = null;
                        $valor = null;
                    
                        $proveedor = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

                        foreach ($proveedor as $key => $value){
                            echo '<option value="'.$value["id"].'">'.$value["Empresa"].' '.$value["municipio"].' '.$value["calle"].' '.$value["region"].' '.$value["colonia"].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        
        <!-- ENTRADA PARA EL NOMBRE -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
            </div>
        </div>

        <!-- ENTRADA PARA EL USUARIO -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
            </div>
        </div>

        <!-- ENTRADA PARA LA CONTRASEÑA -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
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
  <button type="submit" class="btn btn-primary">Guardar Empresa</button>
</div>

<?php
  $crearEmpresa = new ControladorEmpresa();
  $crearEmpresa -> ctrAgregarEmpresa();
?>

</form>

</div>