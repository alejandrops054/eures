
<div class="content-wrapper">
    <section class="content-header">
    <h1>Nueva evalucion</h1>
    <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">evalucion</li>
    </ol>
    </section>

    <section class="content">

    <div class="row">
        <div class="col-md-6">
            <select class="form-control">
                <option value="">Selecciona el proveedor</option>
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

        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="reservation">
            </div>
        </div>
        
    </div>
    </br>
    <div class="row">    
        <?php 
            
            $item = null;
            $valor = null;

            $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

            foreach ($categoria as $key => $value){
                
                $itemLineamiento = null;
                $valorLineamiento = null;

                $lineamiento = ControladorLineamiento::ctrMostrarLineamientos($itemLineamiento, $valorLineamiento);

                echo'<div class="col-md-12">
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">'.$value["fsno"].' '.$value["texto"].'</h3>';
                                
    
                echo '          <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>';
                        
                        foreach ($lineamiento as $valores){
                            
                            if($valores["idcategoria"] == $value["id"]){
                                echo'<div class="box-body">
                                        <thead>
                                            <tr>
                                                <th>'.$valores["lino"].'</th>
                                                <th> '.$valores["lineamiento"].'</th>
                                                <label class="label pull-right bg-green" >'.$valores["puntos"].'PTS</label>
                                            </tr>
                                        </thead>
                                        

                                    </div>';
                            }
    
                        }
                        
                   echo'</div>
                    </div>';
            }

        ?>
    </div>
    </section>
</div>
