<?php
session_start();
require_once('config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/table_pagination/table_pagination.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
$conn = new connection();
$sql_q = new queries_db();
$tbl_pages = new TablePagination();

if (isset($_SESSION['user_game']) && !empty($_SESSION['user_game'])) {
    $cat=$_SESSION['category_game'];
    $user_id = $_SESSION['iduser'];
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
        .logos{width: 25px;margin-top:-3PX;}
        body{background:#ddd;}
        .conta div{display:table;font-size:12px; float: right; margin-top: 13px;margin-right:4px;}
    </style>
</head>
<body>
    <div class="container">
        <div class="masthead">
            <h3 class="text-muted"><a href="game"> Trivia-MEC <img class="logos" src="themes/images/trivia.ico"></a></h3>
            <nav>
              <ul class="nav nav-justified">
                <li><a href="#">APK</a></li>
                <li><a data-toggle="modal" data-target=".bs-example-modal-lg" href="#">Acerca de</a></li>
                <li><a href="action?e=logoutgame">Cerrar</a></li>
              </ul>
            </nav>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Acerca de">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Acerca de</h4>
                </div>
                <div class="modal-body">
                    <center><img width="150" src="themes/images/trivia.ico"></center>
                    <p>Trivia-MEC V1(Universidad Luterana Salvadoreña)</p>
                    <li>Enma Ivania Zepeda</li>
                    <li>María Carolina Hernández</li>
                    <li>Misael Antonio Mejía</li>
                    <p><strong>by algoritmo II</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
          </div>
        </div>
        <div class="jumbotron">
            <div class="row">
               <form role="form" action="controllers/game_controllers.php?e=finish" method="post" id="formFinish" novalidate>
                    <div class="panel panel-success">
                        <div class="panel-heading numbr">
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                            <?php
                            $num=1;
                            foreach ($_SESSION['data_query'] as $value) {
                                $sql_answers="SELECT * FROM mec_answers WHERE id_questions = ".$value['id'].";";
                                $data = $sql_q->selects($conn, $sql_answers);
                                if ($num==1) {
                                    echo "<div class=\"tab-pane fade active in\" id=\"$num\">";
                                    echo "<ol class=\"breadcrumb\">";
                                    echo "<li><a href=\"#\">".$value['Categoría']."</a></li>";
                                    echo "<li><a href=\"#\">".$value['Nivel']."</a></li>";
                                    echo "</ol>";
                                    echo "<input name=\"questions".$num."\" type=\"hidden\" value=\"".$value['id']."\">";
                                    echo "<p>".$value['Pregunta']."</p>";
                                    foreach ($data as $val) {
                                        echo "<div class=\"form-group\">";
                                        echo "<div class=\"radio\">";
                                        echo "<label>";
                                        echo "<input type=\"radio\" required name=\"answers".$num."\" value=\"".$val['id']."\">".$val['description'];
                                        echo "</label>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                }else{
                                    echo "<div class=\"tab-pane fade\" id=\"$num\">";
                                    echo "<ol class=\"breadcrumb\">";
                                    echo "<li><a href=\"#\">".$value['Categoría']."</a></li>";
                                    echo "<li><a href=\"#\">".$value['Nivel']."</a></li>";
                                    echo "</ol>";
                                    echo "<p>".$value['Pregunta']."</p>";
                                    echo "<input name=\"questions".$num."\" type=\"hidden\" value=\"".$value['id']."\">";
                                    foreach ($data as $val) {
                                        echo "<div class=\"form-group\">";
                                        echo "<div class=\"radio\">";
                                        echo "<label>";
                                        echo "<input type=\"radio\" required name=\"answers".$num."\" value=\"".$val['id']."\">".$val['description'];
                                        echo "</label>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                }
                                $num++;
                            }
                            ?>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <nav aria-label="...">
                                <ul class="pager">
                                    <li class="previous" id="previous"><a href="#"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                    <li class="next" id="next"><a href="#">Siguiente <span aria-hidden="true">&rarr;</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </form>
                <div style="height: 34px;" id="message"></div>
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-gear"></i>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="my-scores">Puntajes</a></li>
            </ul>
        </div>
        <!-- Site footer -->
        <footer class="footer">
            <p>&copy; 2018 Trivia-MEC.</p>
        </footer>
        <ul class="nav nav-tabs invisible" id="mytabs">
           <?php
            $num=1;
            foreach ($_SESSION['data_query'] as $value) {
                if ($num==1) {
                    echo "<li class=\"active\"><a href=\"#$num\" data-toggle=\"tab\">Pregunta $num</a></li>";
                }else{
                    echo "<li><a href=\"#$num\" data-toggle=\"tab\">Pregunta $num</a></li>";
                }
                $num++;
            }
            ?>
        </ul>
    </div>
    <?php
    require_once(THEMES."/includes/footer-link.php");
    ?>   
    <script type="text/javascript">
        $(document).ready(function(){
            $('.numbr').text('Pregunta 1');
            $('#mytabs').hide();
            $('#next').click(function(){
                var actual = $('div.active').attr('id')
                su = parseInt(actual)+1;
                $('.numbr').text('Pregunta '+su);
                if (parseInt(actual)>=20) {
                    t=su-1;
                    $('.numbr').text('Pregunta '+t);
                    $("#next").addClass("disabled");
                }else{
                    $("#previous").removeClass("disabled");
                    var sum=parseInt(actual)+1;
                    $('#mytabs a[href="#'+sum+'"]').tab('show');
                }
            });
            $('#previous').click(function(){
                var actual = $('div.active').attr('id')
                su = parseInt(actual)-1;
                $('.numbr').text('Pregunta '+su);
                if (parseInt(actual)<=1) {
                    t=su+1;
                    $('.numbr').text('Pregunta '+t);
                    $("#previous").addClass("disabled");
                }else{
                    $("#next").removeClass("disabled");
                    var res=parseInt(actual)-1;
                    $('#mytabs a[href="#'+res+'"]').tab('show')
                }
            });
            "use strict";
            $('#formFinish').submit(function() {
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
<?php }else{
    header("Location: index.php");
} ?>