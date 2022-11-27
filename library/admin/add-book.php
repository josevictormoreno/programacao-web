<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['add'])) {
		$bookname = $_POST['bookname'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$isbn = $_POST['isbn'];
		$price = $_POST['price'];
		$bookimg = $_FILES["bookpic"]["name"];
		// get the image extension
		$extension = substr($bookimg, strlen($bookimg) - 4, strlen($bookimg));
		// allowed extensions
		$allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
		// Validation for allowed extensions .in_array() function searches an array for a specific value.
		//rename the image file
		$imgnewname = md5($bookimg . time()) . $extension;
		// Code for move image into directory

		if (!in_array($extension, $allowed_extensions)) {
			echo "<script>alert('Formato inválido. Somente jpg / jpeg/ png /gif são permitidos!');</script>";
		} else {
			move_uploaded_file($_FILES["bookpic"]["tmp_name"], "bookimg/" . $imgnewname);
			$sql = "INSERT INTO  tblbooks(BookName,Category,Author,ISBNNumber,bookImage) VALUES(:bookname,:category,:author,:isbn,:imgnewname)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
			$query->bindParam(':category', $category, PDO::PARAM_STR);
			$query->bindParam(':author', $author, PDO::PARAM_STR);
			$query->bindParam(':isbn', $isbn, PDO::PARAM_STR);
			$query->bindParam(':imgnewname', $imgnewname, PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			if ($lastInsertId) {
				echo "<script>alert('Livro adicionado com sucesso!');</script>";
				echo "<script>window.location.href='manage-books.php'</script>";
			} else {
				echo "<script>alert('Erro! Não foi possivel adicionar o livro!');</script>";
				echo "<script>window.location.href='manage-books.php'</script>";
			}
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
		<title>ATIVIDADE PRÁTICA (ATP): Projeto Coisas Emprestadas | Adicionar Livro</title>
		<!-- BOOTSTRAP CORE STYLE  -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONT AWESOME STYLE  -->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLE  -->
		<link href="assets/css/style.css" rel="stylesheet" />
		<!-- GOOGLE FONT -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<script type="text/javascript">
			function checkisbnAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'isbn=' + $("#isbn").val(),
					type: "POST",
					success: function(data) {
						$("#isbn-availability-status").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>
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
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Informação do Livro
							</div>
							<div class="panel-body">
								<form role="form" method="post" enctype="multipart/form-data">

									<div class="col-md-6">
										<div class="form-group">
											<label>Nome do Livro<span style="color:red;">*</span></label>
											<input class="form-control" type="text" name="bookname" autocomplete="off" required />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label> Categoria<span style="color:red;">*</span></label>
											<input class="form-control" name="category" required="required">
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label> Autor<span style="color:red;">*</span></label>
											<input class="form-control" name="author" required="required">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Número do ISBN<span style="color:red;">*</span></label>
											<input class="form-control" type="text" name="isbn" id="isbn" required="required" autocomplete="off" onBlur="checkisbnAvailability()" />
											<p class="help-block">ISBN é um sistema internacional de identificação de livros, deve ser único.</p>
											<span id="isbn-availability-status" style="font-size:12px;"></span>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Foto do Livro<span style="color:red;">*</span></label>
											<input class="form-control" type="file" name="bookpic" autocomplete="off" required="required" />
										</div>
									</div>
									<button type="submit" name="add" id="add" class="btn btn-info">Enviar </button>
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