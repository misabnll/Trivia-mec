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
    <title>Ver todos los jugadores</title>
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
    $option="";
    ?>
</head>
<body>
    <div id="wrapper">
       <?php require_once('../includes/navbar-default.php');?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div style="float:right;height:30px;position:static;" id="result"></div>
                    <h2 class="page-header">Jugadores</h2>
                </div>
            </div>
            <div class="row">
               <?php
                $sql = "SELECT username AS 'Email',datatime AS 'Fecha de registro' FROM mec_session WHERE id_type=2";
                $data = $sql_q->selects($conn, $sql);
                print $table_g->print_table($data,"categories","table table-striped table-bordered table-hover",0,"dataTable1","info font");
               ?>
            </div>
        </div>
    </div>
    <?php
    require_once('../includes/footer-link.php');
    ?>
    <script type="text/javascript">
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
    </script>
</body>
</html>
<?php
else:
    header("Location: session");
endif;
?>