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
    <title>Editar pregunta</title>
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
    $e=null;
    $id=$validate->xss_injet($_GET['e'],"int");
    $sql1 = $sql_q->selects($conn, "SELECT id_status AS status FROM mec_questions WHERE id=".$id.";");
    $check="";
    if ($sql1) {
        $valor=$sql1[0];
        if ($valor['status']==1) {
            $check="<input type=\"checkbox\" name=\"chkEstates\" id=\"chkEstates\" data-off-text=\"Inactivo\" data-on-text=\"Activo\" data-off-color=\"warning\" checked>";
        }else{
            $check="<input type=\"checkbox\" name=\"chkEstates\" id=\"chkEstates\" data-off-text=\"Inactivo\" data-on-text=\"Activo\" data-off-color=\"warning\">";
        }
    }
    require_once('../includes/header-link.php');
    $option=$check."<li><a title=\"Página principal\" href=\"home\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></a></li>";
    ?>
    <link href="themes/default-core/vendor/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
       <?php require_once('../includes/navbar-default.php');?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div style="float:right;height:30px;position:static;" id="message"></div>
                    <h2 class="page-header">Editar pregunta</h2>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($_GET['e'])){
                    $e=$validate->xss_injet($_GET['e'],"int");
                    if($validate->var_validations($e)){
                        $data = $sql_q->selects($conn, "SELECT qs.id AS 'ID',qs.description AS 'Pregunta',ca.description AS 'Categoría',qs.id_category,lv.description AS 'Nivel',qs.id_levels,st.description AS 'Estatus',qs.id_status FROM mec_questions AS qs INNER JOIN mec_categories AS ca ON qs.id_category=ca.id INNER JOIN mec_levels AS lv ON qs.id_levels=lv.id INNER JOIN mec_status AS st ON qs.id_status=st.id WHERE qs.id = ".$e.";");
                        if ($data) {
                            $valor=$data[0];
                ?>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#editar" data-toggle="tab">Editar</a></li>
                    <li><a href="#respuestas" data-toggle="tab">Tus respuestas</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="editar">
                        <form role="form" action="controllers/question_controllers.php?e=edit" method="post" id="formQuestion">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Categoría</label>
                                    <?php
                                    print $table_g->form_input("hidden","txtId","form-control","txtId","","",$valor['ID'],11,"");
                                    $data = $sql_q->selects($conn, "SELECT id, description FROM mec_categories WHERE id <> ".$valor['id_category'].";");
                                    print $table_g->form_input("select","slcCategory","form-control","slcCategory","required","",$data,"","<option value=\"".$valor['id_category']."\">".$valor['Categoría']."</option>");
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>¿Cuál es tu pregunta?</label>
                                    <?php print $table_g->form_input("textarea","txtDescription","form-control","txtDescription","","Describe tu pregunta",$valor['Pregunta'],500,"");
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Niveles</label>
                                    <?php
                                    $data = $sql_q->selects($conn, "SELECT id, description FROM mec_levels WHERE id <> ".$valor['id_levels'].";");
                                    print $table_g->form_input("select","slcNivel","form-control","slcNivel","required","",$data,"","<option value=\"".$valor['id_levels']."\">".$valor['Nivel']."</option>");
                                    ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Actualizar <i class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="respuestas">
                        <?php
                        $sql = "SELECT id,id_questions,description AS 'Opciones',correct AS 'Correcto' FROM mec_answers WHERE id_questions=".$valor['ID'].";";
                        $data = $sql_q->selects($conn, $sql);
                       ?>
                        <form role="form" action="controllers/answers_controllers.php?e=save" method="post" id="formAnswers">
                            <label>Agregar opciones de respuesta:</label>
                            <?php
                            print $table_g->form_input("hidden","txtId","form-control","txtId","","",$valor['ID'],11,"")
                            ?>
                            <div class="form-group input-group">
                                <input type="text" class="form-control" name="txtAddAns" placeholder="Escriba aquí">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center; text-transform: uppercase;" colspan="3"><?php echo $valor['Pregunta']; ?></th>
                                </tr>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Correcto</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $value) {
                                    echo "<tr>";
                                    echo "<td>".$value['Opciones']."</td>";
                                    if ($value['Correcto']==0) {
                                        echo "<td><input type=\"radio\" name=\"rdC\" class=\"rdcR\" value=".$value['id']."></td>";
                                    }else{
                                        echo "<td><input type=\"radio\" name=\"rdC\" class=\"rdcR\" value=".$value['id']." checked></td>";
                                    }
                                    echo "<td><a href=\"#\" id=".$value['id']." class=\"delete-link\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
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
    <script src="themes/default-core/vendor/bootstrap-switch/dist/js/bootstrap-switch.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("[name='chkEstates']").bootstrapSwitch();
            "use strict";
            $('#formQuestion').submit(function() {
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
            $('#formAnswers').submit(function() {
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
            //Radio
            $(".rdcR").change(function() {
                var checkeds = new Array();
                $("input[name='rdC']:checked").each(function() {
                    checkeds.push($(this).val());
                });
                if (Object.entries(checkeds).length === 0) {
                    alert("No has seleccionado nada!!");
                }else{
                    var est=checkeds.pop();
                    var parametros = {est : est};
                    $.ajax({
                        data: parametros,
                        url:   'controllers/answers_controllers.php?e=correct&&i=<?php echo $id; ?>',
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
            });
            //switch
            $('input[name="chkEstates"]').on('switchChange.bootstrapSwitch', function(event, state) {
                var est="";
                if (state) {
                    est = 1;
                }else{
                    est = 2;
                }
                var parametros = {est : est};
                $.ajax({
                    data: parametros,
                    url:   'controllers/question_controllers.php?e=states&id=<?php echo $_GET['e']; ?>',
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
            });
            //delete
            $(".delete-link").click(function(){
                var del_id = $(this).attr("id");
                var parent = $(this).parent("td").parent("tr");
                if(confirm('Eliminar permanentemente el registro: '+del_id+' ?')){
                    var parametros = {
                        del_id : del_id
                    };
                    $.ajax({
                        data: parametros,
                        url:   'controllers/answers_controllers.php?e=delete',
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
        });
    </script>
</body>
</html>
<?php
else:
    header("Location: session");
endif;
?>