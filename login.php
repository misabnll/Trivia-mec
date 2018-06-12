<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login">
    <meta name="author" content="Cíborg">
    <link rel="icon" href="themes/images/favicon.ico">
    <title>Inicio de sesión</title>
    <?php require_once(THEMES.'/includes/header-link.php'); ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            include_once(MODULES."/generate_session/view/index.php");
            ?>
        </div>
    </div>
    <?php
    require_once(THEMES."/includes/footer-link.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            $('#FormLogin').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#message').html(data);
                        if (ajaxr){
                            setTimeout("location.href = 'home';", 1000);
                        }
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