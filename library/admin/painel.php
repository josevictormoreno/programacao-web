<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else { ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>ATIVIDADE PRÁTICA (ATP): Projeto Coisas Emprestadas | PAINEL DO ADMINISTRADOR</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  </head>

  <body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">PAINEL DO ADMINISTRADOR</h4>

          </div>

        </div>

        <div class="row">
          <a href="manage-books.php">
            <div class="col-md-3 col-sm-3 col-xs-6">
              <div class="alert alert-success back-widget-set text-center">
                <i class="fa fa-book fa-5x"></i>
                <?php
                $sql = "SELECT id from tblbooks ";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $listdbooks = $query->rowCount();
                ?>
                <h3>
                  <?php echo htmlentities($listdbooks); ?>
                </h3>
                Lista de Livros
              </div>
            </div>
          </a>



          <a href="manage-issued-books.php">
            <div class="col-md-3 col-sm-3 col-xs-6">
              <div class="alert alert-warning back-widget-set text-center">
                <i class="fa fa-recycle fa-5x"></i>
                <?php
                $sql2 = "SELECT id from tblissuedbookdetails where (RetrunStatus='' || RetrunStatus is null)";
                $query2 = $dbh->prepare($sql2);
                $query2->execute();
                $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                $returnedbooks = $query2->rowCount();
                ?>

                <h3>
                  <?php echo htmlentities($returnedbooks); ?>
                </h3>
                Livros ainda não devolvidos
              </div>
            </div>
          </a>

          <a href="reg-students.php">
            <div class="col-md-3 col-sm-3 col-xs-6">
              <div class="alert alert-danger back-widget-set text-center">
                <i class="fa fa-users fa-5x"></i>
                <?php
                $sql3 = "SELECT id from tblstudents ";
                $query3 = $dbh->prepare($sql3);
                $query3->execute();
                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                $regstds = $query3->rowCount();
                ?>
                <h3>
                  <?php echo htmlentities($regstds); ?>
                </h3>
                Usuários Registrados
              </div>
            </div>
          </a>
        </div>

        <div class="row">

        </div>

      </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
  </body>

  </html>
<?php } ?>