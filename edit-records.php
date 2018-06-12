<?php
session_start();
require_once('config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(MODULES."/table_pagination/table_pagination.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$tbl_pages = new TablePagination();

if (isset($_SESSION['user_game']) && !empty($_SESSION['user_game'])) {
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
                            Resultados
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                            <?php
                            $e=null;
                            $time="";
                            if (isset($_GET['e'])){
                                  $e=$validate->xss_injet($_GET['e'],"int");
                                if($validate->var_validations($e)){
                                    $data = $sql_q->selects($conn, "SELECT id AS 'ID',start_date AS 'Fecha inicio',final_date AS 'Fecha final', timestampdiff(MINUTE, start_date,final_date) AS 'Tiempo',all_questions AS 'questions',all_answers AS 'answers' FROM mec_records WHERE id = ".$e.";");
                                    if ($data) {
                                        $valor=$data[0];
                                        $time=$valor['Tiempo'];
                                        if (empty($valor['questions']) && empty($valor['answers'])) {
                                            $questions = array();
                                            $answers = array();
                                        }else{
                                            $questions = explode(",", $valor['questions']);
                                            $answers = explode(",", $valor['answers']);
                                        }
                                        $ans=0;
                                        $total_corret=0;
                                        $total_incorrect=0;
                                        foreach ($questions as $ques) {
                                            $sql_questions="SELECT mq.id,mq.description AS 'Pregunta', cc.description AS 'Categoría', ll.description AS 'Nivel' FROM mec_questions AS mq INNER JOIN mec_categories AS cc ON mq.id_category=cc.id INNER JOIN mec_levels AS ll ON mq.id_levels=ll.id WHERE mq.id = ".$ques.";";
                                            $data = $sql_q->selects($conn, $sql_questions);
                                            $sql_answers="SELECT * FROM mec_answers WHERE id_questions = ".$data[0]['id'].";";
                                            $data1 = $sql_q->selects($conn, $sql_answers);
                                            echo "<p>".$data[0]['Pregunta']."</p>";
                                            echo "<ol class=\"breadcrumb\">";
                                            echo "<li><a href=\"#\">".$data[0]['Categoría']."</a></li>";
                                            echo "<li><a href=\"#\">".$data[0]['Nivel']."</a></li>";
                                            echo "</ol>";
                                            foreach ($data1 as $val) {
                                                echo "<div class=\"form-group\">";
                                                echo "<div class=\"radio\">";
                                                echo "<label>";
                                                if ($val['correct']==1) {
                                                    if ($val['id']==$answers[$ans]) {
                                                        echo "<input type=\"radio\" required name=\"\" checked value=\"".$val['id']."\">".$val['description']." <span class=\"fa fa-check\"></span><span class=\"fa fa-check\"></span>";
                                                        $total_corret=$total_corret+1;
                                                    }else{
                                                        echo "<input type=\"radio\" required name=\"\" value=\"".$val['id']."\">".$val['description']." <span class=\"fa fa-check\"></span><span class=\"fa fa-times\"></span>";
                                                        $total_incorrect=$total_incorrect+1;
                                                    }
                                                }else{
                                                    if ($val['id']==$answers[$ans]) {
                                                        echo "<input type=\"radio\" checked required name=\"\" value=\"".$val['id']."\">".$val['description'];
                                                    }else{
                                                        echo "<input type=\"radio\" required name=\"\" value=\"".$val['id']."\">".$val['description'];
                                                    }
                                                }
                                                echo "</label>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            $ans++;
                                        }
                                    }else{
                                        print($GLOBALS['gene']->message_all(0,"","Los datos no pudieron ser consultados."));
                                    }
                                }else{
                                    print($GLOBALS['gene']->message_all(0,"","Se produjo un error en el sistema!"));
                                }
                            }else{
                                print($GLOBALS['gene']->message_all(0,"","Se produjo un error en el sistema!!"));
                            }
                            ?>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Correctas: </th>
                                    <td style="font-weight: bold; font-size: 22px;"><?php echo $total_corret; ?></td>
                                </tr>
                                <tr>
                                    <th>Incorrectas: </th>
                                    <td style="font-weight: bold; font-size: 22px;"><?php echo $total_incorrect; ?></td>
                                </tr>
                                <tr>
                                    <th>Tiempo transcurrido: </th>
                                    <td style="font-weight: bold; font-size: 22px;"><?php echo $time; ?> min</td>
                                </tr>
                                <tr>
                                    <th>Nota final: </th>
                                    <td style="font-weight: bold; font-size: 22px;"><?php echo round($total_corret*0.5, 2); ?></td>
                                </tr>
                            </table>
                            <a href="my-scores" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                            <a href="action?e=logoutgame" class="btn btn-primary">Juega de nuevo <i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </form>
                <div style="height: 34px;" id="message"></div>
            </div>
        </div>
        <!-- Site footer -->
        <footer class="footer">
            <p>&copy; 2018 Trivia-MEC.</p>
        </footer>
    </div>
    <?php
    require_once(THEMES."/includes/footer-link.php");
    ?>
</body>
</html>
<?php }else{
    header("Location: index.php");
} ?>