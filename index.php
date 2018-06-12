<?php
require_once('config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_tables/generate_tables.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
$conn = new connection();
$sql_q = new queries_db();
$table_g = new generate_tables();
$sql1 = $sql_q->selects($conn, "SELECT DISTINCT qs.id_category AS IDc,cc.description AS category FROM mec_questions AS qs INNER JOIN mec_categories AS cc ON qs.id_category=cc.id WHERE id_status=1 GROUP BY IDc,cc.description");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trivia-mec, divertido juego de preguntas y respuestas para todo público">
    <meta name="author" content="Cíborg">
    <link rel="icon" href="themes/images/trivia.ico">
    <title>Jugar Trivia-mec</title>
    <?php require_once(THEMES.'/includes/header-link.php'); ?>
    <link href="themes/default-core/dist/css/justified-nav.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body{background:#ddd;}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">SELECCIONE 5 CATEGORÍAS</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="controllers/game_controllers.php?e=start" method="post" id="formSelect">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="txtemail" id="txtemail" type="email" autofocus placeholder="Tu correo electrónico" required>
                                </div>
                                <div class="form-group">
                                    <select multiple class="form-control" name="slcC[]" id="slcCa" required>
                                        <?php
                                            foreach ($sql1 as $value) {
                                                echo "<option value=\"".$value['IDc']."\">".$value['category']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" id="submit" class="btn btn-lg btn-success btn-block" value="JUGAR">
                            </fieldset>
                            <div id="message"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once(THEMES."/includes/footer-link.php");
    ?>
    <link href="themes/default-core/vendor/select2/css/select2.min.css" rel="stylesheet"/>
    <script src="themes/default-core/vendor/select2/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#slcCa").select2();
            "use strict";
            $('#formSelect').submit(function() {
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