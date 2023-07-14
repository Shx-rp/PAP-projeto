<?php
	require 'conn.php';
	session_start();
 
	if(!ISSET($_SESSION['user'])){
		$isLoggedIn = True;
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!"> Bankzys</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="admin-page.php">Pagina Admin</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="home.php">Perfil</a></li>
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
                        <form action="give-money.php" method="POST">	
                <h4 class="display-5 fw-bolder text-white mb-2">Admin Menu</h4>
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>First name</label>
					<input type="text" class="form-control" name="firstname" placeholder="First Name" />
				</div>
                <div class="form-group">
					<label>Last name</label>
					<input type="text" class="form-control" name="lastname" placeholder="Last Name" />
				</div>
				<div class="form-group">
					<label>Password</label>
                    <input type="text" class="form-control" name="balance" placeholder="Set Ammount"/>
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="give">Submit</button>
			</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="bg-dark py-5">
            <header class="bg-dark py-5">
        </header>
        <footer class="py-4 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">&copy; Leonel Costa 2023</p></div>
        </footer>
        <header class="bg-dark py-5">
        <header class="bg-dark py-5">
        <header class="bg-dark py-3">
  </body>
</html>