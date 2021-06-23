
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
        <?php 
            
            $item = null;
            $valor = null;

            $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

            foreach ($categoria as $key => $value){

                echo'<div class="col-md-12">
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">'.$value["fsno"].' '.$value["texto"].'</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>';

                        $itemLineamiento = "idcategoria";
                        $valorLineamiento = $value["id"];

                        $lineamiento = ControladorLineamiento::ctrMostrarLineamientos($itemLineamiento, $valorLineamiento);

                        foreach ($lineamiento as $valores){
                            
                            if($lineamiento["idcategoria"] == $value["id"]){
                                echo'<div class="box-body">
                                       '.$lineamiento["lino"].' '.$lineamiento["lineamiento"].'
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
