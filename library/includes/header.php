<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img style="width:40%" src="assets/cliente-puc.png" />
                <h3 style="color:white">Sistema de Biblioteca</h3>

        </div>
        <?php if ($_SESSION['login']) {
        ?>
        <div class="right-div">
            <a href="logout.php" class="btn btn-danger pull-right">Sair</a>
        </div>
        <?php } ?>
    </div>
</div>
<!-- LOGO HEADER END-->
<?php if ($_SESSION['login']) {
?>
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="painel.php" class="menu-top-active">PAINEL</a></li>
                        <li><a href="emprestimos.php">Livros Emprestados</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Conta <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="perfil.php">Meu Perfil</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<?php } else { ?>
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">

                        <li><a href="index.php">Login</a></li>
                        <li><a href="signup.php">Cadastro de Usu??rio</a></li>
                        <li><a href="adminlogin.php">Login do Administrador</a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<?php } ?>