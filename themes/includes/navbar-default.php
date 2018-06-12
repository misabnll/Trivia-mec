<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home">Trivia MEC <i class="fa fa-question-circle"></i></a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <?php
        if (isset($option)) {
            print $option;
        }
        ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown">
               </li>
                    <li><a href="action?e=logout"><i class="fa fa-sign-out fa-fw"></i> Log out</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-play fa-fw"></i> Jugar</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-plus fa-fw"></i> Agregar<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="add-question">Preguntas</a>
                            <a href="view-categories">Categorías</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="view-gamers"><i class="fa fa-users fa-fw"></i> Jugadores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>