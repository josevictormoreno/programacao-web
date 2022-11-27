<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['update'])) {
		$bookname = $_POST['bookname'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$isbn = $_POST['isbn'];
		$bookid = intval($_GET['bookid']);
		$sql = "update tblbooks set BookName=:bookname,Category:category,Author=:author, where id=:bookid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
		$query->bindParam(':category', $category, PDO::PARAM_STR);
		$query->bindParam(':author', $author, PDO::PARAM_STR);
		$query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
		$query->execute();
		echo "<script>alert('Livro atualizado com sucesso!');</script>";
		echo "<script>window.location.href='manage-books.php'</script>";
	}
?>
	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>ATIVIDADE PRÁTICA (ATP): Projeto Coisas Emprestadas | Gerenciar Livro</title>
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
						<h4 class="header-line">Adicionar Livro</h4>

					</div>

				</div>
				<div class="row">
					<div class="col-md12 col-sm-12 col-xs-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Informação do Livro
							</div>
							<div class="panel-body">
								<form role="form" method="post">
									<?php
									$bookid = intval($_GET['bookid']);
									$sql = "SELECT tblbooks.BookName,tblbooks.Category, tblbooks.Author,tblbooks.ISBNNumber,tblbooks.id as bookid,tblbooks.bookImage from tblbooks where tblbooks.id=:bookid";
									$query = $dbh->prepare($sql);
									$query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $result) { ?>

											<div class="col-md-6">
												<div class="form-group">
													<label>Imagem do Livro</label>
													<img src="bookimg/<?php echo htmlentities($result->bookImage); ?>" width="100">
													<a href="change-bookimg.php?bookid=<?php echo htmlentities($result->bookid); ?>">Mudar
														Imagem do Livro</a>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Nome do Livro<span style="color:red;">*</span></label>
													<input class="form-control" type="text" name="bookname" value="<?php echo htmlentities($result->BookName); ?>" required />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label> Categoria<span style="color:red;">*</span></label>
													<input class="form-control" name="category" required="required" value="<?php echo htmlentities($result->Category); ?>" required />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label> Autor<span style="color:red;">*</span></label>
													<input class="form-control" name="author" required="required" value="<?php echo htmlentities($result->Author); ?>" required />
												</div>
											</div>


											<div class="col-md-6">
												<div class="form-group">
													<label>ISBN</label>
													<input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->ISBNNumber); ?>" readonly />
													<p class="help-block">ISBN é um sistema internacional de identificação de
														livros, deve ser único.</p>
												</div>
											</div>
									<?php }
									} ?>
									<div class="col-md-12">
										<button type="submit" name="update" class="btn btn-info">Atualizar </button>
									</div>

								</form>
							</div>
						</div>
					</div>

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