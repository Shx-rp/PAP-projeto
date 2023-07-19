<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register page</title>
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
  <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
<script>
    (function() {
        // removing the message 5 seconds after the page load
        setTimeout(function(){
            document.querySelector('.msg').remove();
        },5000)
    })();
</script>
<?php 
    endif;
    // clearing the message
    unset($_SESSION['message']);
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!"> Bankzys</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" href="register.php">Registar</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contactar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <form action="register_query.php" method="POST">	
                                <h4 class="display-5 fw-bolder text-white mb-2">Inscrever-se</h4>
                                <hr style="border-top:1px groovy #000;">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <label></label>
                                    <input type="text" class="form-control" name="firstname" pattern="[A-Za-z]{3,50}" placeholder="First Name" />
                                </div>
                                <div class="form-group">
                                <label></label>
                                    <input type="text" class="form-control" name="lastname" pattern="[A-Za-z]{3,50}" placeholder="Last Name" />
                                </div>
                                <div class="form-group">
                                <label></label>
                                    <input type="text" class="form-control" name="username" pattern=".{4,}" placeholder="Username" />
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="password" class="form-control" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!@#$%^&*_=+\-]).{8,}$" placeholder="Password">
                                </div>
                                <br />
                                <div class="form-group">
                                    <button class="btn btn-primary form-control" name="register">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <header class="bg-dark py-5">
            <header class="bg-dark py-5">
        </header>
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">&copy; Leonel Costa 2022</p></div>
        </footer>
        <header class="bg-dark py-4">
  </body>
</html>