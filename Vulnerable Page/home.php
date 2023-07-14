<?php
	session_start();

	require_once 'conn.php';

	if (isset($_SESSION['user'])) {
		$id = $_SESSION['user'];
		$sql = "SELECT * FROM `clientes` WHERE `mem_id`='$id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			$fetch = mysqli_fetch_assoc($result);
			$userType = $fetch['userType'];
		}
	} else {
		header('location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Bankzys - O banco das Startups</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico.png" />
	<!-- Bootstrap icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />
</head>
<body>
	<!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container px-5">
			<a class="navbar-brand" href="#!">Bankzys</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<?php
						if ($userType === "admin") {
							echo '<li class="nav-item"><a class="nav-link" href="admin-page.php">Pagina Admin</a></li>';
						}
					?>
					<li class="nav-item"><a class="nav-link active" href="home.php">Perfil</a></li>
					<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<header class="bg-dark py-5">
		<div class="container px-5">
			<div class="row gx-5 justify-content-center">
				<div class="col-lg-6">
					<div class="text-center my-5">
          <h1 class="display-5 fw-bolder text-white mb-2">Bem-Vindo</h1>
						<h1 class="display-5 fw-bolder text-white mb-2"><?php echo $fetch['firstname']." ". $fetch['lastname']." "?></h1>
						<header class="bg-dark py-5">
						<div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
							<span class="btn-primary btn-lg px-4 me-sm-3"><?php echo $fetch['balance']?>€</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<footer class="py-5 bg-dark">
		<div class="container px-5"><p class="m-0 text-center text-white">&copy; Leonel Costa 2022</p></div>
	</footer>
</body>
</html>
