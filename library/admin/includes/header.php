<div style="background-color: #912536;" class="navbar navbar-inverse set-radius-zero">
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

        <div class="right-div">
            <a href="logout.php" class="btn btn-danger pull-right">Sair</a>
        </div>
    </div>
</div>

<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="painel.php" class="menu-top-active">PAINEL</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Livros <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="addLivro.php">Adicionar
                                Livro</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="gerenciarLivros.php">Modificar
                                Livros</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Livros Emprestados <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="emprestarLivro.php">Emprestar Novo Livro</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="gerenciarEmprestimos.php">Modificar Livros Emprestados</a></li>
                            </ul>
                        </li>
                        <li><a href="registrarEstudante.php">Estudantes Registrados</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>