<?php
require_once('../../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_tables/generate_tables.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
require_once('../../settings.php'); //Modulos cargan antes que setting, ya que setting puede utilizar a los modulos
if($is_session_log):
$conn = new connection();
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
    <title>Agregar preguntas</title>
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
    $option="<li><a title=\"Página principal\" href=\"home\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></a></li>";
    ?>
</head>
<body>
    <div id="wrapper">
       <?php require_once('../includes/navbar-default.php');?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div style="float:right;height:30px;position:static;" id="message"></div>
                    <h2 class="page-header">Agregar preguntas</h2>
                </div>

            </div>
            <div class="row">
                <form role="form" action="controllers/question_controllers.php?e=save" method="post" id="formQuestion">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Categoría</label>
                            <?php
                            $data = $sql_q->selects($conn, "SELECT id, description FROM mec_categories");
                            print $table_g->form_input("select","slcCategory","form-control","slcCategory","required","",$data,"","");
                            ?>
                        </div>
                        <div class="form-group">
                            <label>¿Cuál es tu pregunta?</label>
                            <?php print $table_g->form_input("textarea","txtDescription","form-control","txtDescription","","Describe tu pregunta","...",500,"");
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Niveles</label>
                            <?php
                            $data = $sql_q->selects($conn, "SELECT id, description FROM mec_levels");
                            print $table_g->form_input("select","slcNivel","form-control","slcNivel","required","",$data,"","");
                            ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Ingresar <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once('../includes/footer-link.php');
    ?>
    <link href="themes/default-core/vendor/select2/css/select2.min.css" rel="stylesheet"/>
    <script src="themes/default-core/vendor/select2/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#slcCategory").select2();
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
        });
    </script>
</body>
</html>
<?php
else:
    header("Location: session");
endif;
?>