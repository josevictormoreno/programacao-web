<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}
if (isset($_POST['login'])) {

    $email = $_POST['emailid'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['stdid'] = $result->StudentId;
            if ($result->Status == 1) {
                $_SESSION['login'] = $_POST['emailid'];
                echo "<script type='text/javascript'> document.location ='painel.php'; </script>";
            } else {
                echo "<script>alert('Sua conta foi bloqueada, Contate o Admin');</script>";

            }
        }

    } else {
        echo "<script>alert('Detalhes inválidos!');</script>";
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ATIVIDADE PRÁTICA (ATP): Projeto Coisas Emprestadas | </title>
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

    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">LOGIN USÚARIO</h4>
        </div>
    </div>
    <a name="ulogin"></a>
    <!--LOGIN PANEL START-->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Formulário de Login
                </div>
                <div class="panel-body">
                    <form role="form" method="post">

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="emailid" required autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input class="form-control" type="password" name="password" required autocomplete="off" />
                        </div>



                        <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a
                            href="signup.php">Ainda não tenho conta</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---LOGIN PABNEL END-->


    </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>

</html>