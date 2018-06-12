<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Inicio de sesión</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="action?e=login" method="post" name="FormLogin" id="FormLogin">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="txtemail" id="txtemail" type="email" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="txtpassword" id="txtpassword" type="password">
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <input type="submit" id="submit" class="btn btn-lg btn-success btn-block" value="Entrar">
                </fieldset>
                <div id="message"></div>
            </form>
        </div>
    </div>
</div>