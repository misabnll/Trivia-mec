<?php
require_once('../../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(MODULES."/generate_tables/generate_tables.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
require_once('../../settings.php'); //Modulos cargan antes que setting, ya que setting puede utilizar a los modulos
if($is_session_log):
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$table_g = new generate_tables();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="home page">
    <meta name="author" content="Cíborg">
    <link rel="icon" href="themes/images/favicon.ico">
    <title>Editar categoría</title>
    <style type="text/css">
        .font{
            font-size:9px;
        }
        tfoot input{
            width: 100%;
            padding: 2px;
            box-sizing: border-box;
        }
    </style>
    <?php
    require_once('../includes/header-link.php');
    $option="<li><a title=\"View categories\" href=\"view-categories\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></a></li>";
    ?>
</head>
<body>
    <div id="wrapper">
       <?php require_once('../includes/navbar-default.php');?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div style="float:right;height:30px;position:static;" id="message"></div>
                    <h2 class="page-header">Editar categoría</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $e=null;
                if (isset($_GET['e'])){
                    $e=$validate->xss_injet($_GET['e'],"int");
                    if($validate->var_validations($e)){
                        $data = $sql_q->selects($conn, "SELECT ct.id AS 'ID',ct.id_type_category,ct.description AS 'Categoría',tc.description AS 'TCoría' FROM mec_categories AS ct INNER JOIN mec_type_categories AS tc ON ct.id_type_category=tc.id WHERE ct.id = ".$e.";");
                        if ($data) {
                            $valor=$data[0];
                ?>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#editar" data-toggle="tab">Editar</a></li>
                    <li><a href="#preguntas" data-toggle="tab">Tus preguntas</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="editar">
                        <form role="form" action="controllers/categories_controllers.php?e=edit" method="post" id="formCategory">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <?php
                                    Print $table_g->form_input("hidden","txtId","form-control","txtId","","",$valor['ID'],11,"");
                                    print $table_g->form_input("text","txtcategoria","form-control","txtcategoria","required","Nombre de la categoría",$valor['Categoría'],30,"");
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Tipos de categorías</label>
                                    <?php
                                    $data = $sql_q->selects($conn, "SELECT id, description FROM mec_type_categories WHERE id <> ".$valor['id_type_category'].";");
                                    print $table_g->form_input("select","slcTca","form-control","slcTca","required","",$data,"","<option value=\"".$valor['id_type_category']."\">".$valor['TCoría']."</option>");
                                    ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Actualizar <i class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="preguntas">
                        <?php
                        $sql = "SELECT qs.id AS 'ID',qs.description AS 'Pregunta',ca.description AS 'Categoría',lv.description AS 'Nivel',st.description AS 'Estatus' FROM mec_questions AS qs INNER JOIN mec_categories AS ca ON qs.id_category=ca.id INNER JOIN mec_levels AS lv ON qs.id_levels=lv.id INNER JOIN mec_status AS st ON qs.id_status=st.id WHERE qs.id_category=".$valor['ID'].";";
                        $data = $sql_q->selects($conn, $sql);
                        if ($ss_in[3]<>2) {
                            $type=1;
                        }elseif ($ss_in[3]==1) {
                            $type=2;
                        }
                        print $table_g->print_table($data,"question","table table-striped table-bordered table-hover",$type,"dataTable1","info font");
                       ?>
                    </div>
                </div>
                <?php
                        }else{
                            print($GLOBALS['gene']->message_all(0,"","Los datos no pudieron ser consultados."));
                        }
                    }else{
                        print($GLOBALS['gene']->message_all(0,"","Se produjo un error en el sistema!"));
                    }
                }else{
                    print($GLOBALS['gene']->message_all(0,"","Se produjo un error en el sistema!!"));
                }?>
            </div>
        </div>
    </div>
    <?php
    require_once('../includes/footer-link.php');
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            "use strict";
            $('#formCategory').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#message').html(data);
                    },
                    error: function (textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    },
                    beforeSend: function (){
                       $("#message").html("<p class='text-center'><img src='themes/images/ajax-loader.gif'></p>");
                    },
                })
                return false;
            });
        });
        $(document).ready(function(){
            $('#dataTable1 tfoot th').each(function(){
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar: '+title+'"/>');
            });
            // DataTable
            var table = $('#dataTable1').DataTable({responsive: true});
            // Apply the search
            table.columns().every(function(){
                var that = this;
                $('input',this.footer()).on('keyup change',function(){
                    if(that.search() !== this.value){
                        that
                        .search(this.value)
                        .draw();
                    }
                });
            });
        });
        $(".delete-link").click(function(){
            var del_id = $(this).attr("id");
            var parent = $(this).parent("td").parent("tr");
            if(confirm('Eliminar permanentemente el registro: '+del_id+' ?')){
                var parametros = {
                    del_id : del_id
                };
                $.ajax({
                    data: parametros,
                    url:   'controllers/question_controllers.php?e=delete',
                    type:  'post',
                    beforeSend: function () {
                        $("#message").html("<p class='text-center'><img src='themes/images/ajax-loader.gif'></p>");
                    },
                    success: function(data) {
                        $('#message').html(data);
                        if (typeof ajaxr != "undefined"){
                            if (ajaxr){
                                parent.fadeOut('slow');
                            }
                        }
                    }
                });
            }
            return false;
        });
    </script>
</body>
</html>
<?php
else:
    header("Location: session");
endif;
?>