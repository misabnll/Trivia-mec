<?php
session_start();
require_once('config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_tables/generate_tables.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
$conn = new connection();
$sql_q = new queries_db();
$table_g = new generate_tables();
if (isset($_SESSION['user_game']) && !empty($_SESSION['user_game'])) {
    $cat=$_SESSION['category_game'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trivia-mec, Toda mis partidas">
    <meta name="author" content="Cíborg">
    <link rel="icon" href="themes/images/trivia.ico">
    <title>Todas mis partidas - Trivia-mec</title>
    <?php require_once(THEMES.'/includes/header-link.php'); ?>
    <link href="themes/default-core/dist/css/justified-nav.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .logos{width: 25px;margin-top:-3PX;}
        body{background:#ddd;}
        .conta div{display:table;font-size:12px; float: right; margin-top: 13px;margin-right:4px;}
        .font{
            font-size:9px;
        }
        tfoot input{
            width: 100%;
            padding: 2px;
            box-sizing: border-box;
        }
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
               <?php
               if (isset($_SESSION['user_game'])) {
                $sql = "SELECT mc.id AS 'ID',mc.start_date AS 'Fecha inicio',mc.final_date AS 'Fecha final', timestampdiff(MINUTE, mc.start_date,mc.final_date) AS 'Tiempo' FROM mec_records AS mc INNER JOIN mec_session AS ss ON mc.id_users=ss.id  WHERE ss.username = '".$_SESSION['user_game']."';";
                    $data = $sql_q->selects($conn, $sql);
                    print $table_g->print_table($data,"records","table table-striped table-bordered table-hover",2,"dataTable1","success font");
               }else{
                    print($GLOBALS['gene']->message_all(0,"","Usted no tiene registros."));
               }
               ?>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable1 tfoot th').each(function(){
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar: '+title+'"/>');
            });
            // DataTable
            var table = $('#dataTable1').DataTable({responsive: true,"order": [[ 0, "desc" ]]});
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
    </script>
</body>
</html>
<?php }else{
    header("Location: index.php");
} ?>