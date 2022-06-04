<?php 
   session_start();
   $login = isset($_SESSION['login']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<style>
    .wrap {
        margin: 0 auto;
        max-width: 800px;
    }
    .f-wrap {
        max-width: 400px;
        margin: 0 auto;
    }
</style>
<body>
    <div class="container mt-5">
   
    <?php if(isset($_GET['incorrect'])): ?>
        <div class="alert alert-warning">
            Incorrect User Credentails
        </div>
    <?php endif ?>

    <?php if(isset($_GET['registered'])): ?>
        <div class="alert alert-success">
            User Account Created, Please Login !
        </div>
    <?php endif ?>

    <?php if (isset($_GET['suspended'])): ?>
        <div class="alert alert-danger">
           Your account is suspended.
        </div>
    <?php endif ?>

    <?php if($login): ?>
    <div class="wrap">
    <h1>Home Page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, perferendis? Et aspernatur ea illo quaerat ducimus quos est doloribus, suscipit blanditiis magni architecto voluptatum quisquam fugiat fuga amet aut iste.</p>
    <a href="_actions/logout.php">Logout</a>
    </div>


    <?php else: ?>
    <div class="f-wrap">
    <h1 class="h2 mb-4">Login</h1>
    <form action="_actions/login.php" method="POST">
       <label for="email" class="form-label">Email</label>
       <input type="text" name="email" class="form-control mb-2" onfocus>

       <label for="password" class="form-label">Password</label>
       <input type="password" name="password"  class="form-control">

       <input type="submit" value="Login" class="btn btn-primary mt-4">
       <a href="register.php" class="btn btn-outline-primary ms-2 mt-4">Register</a>
    </form>
    </div>
    <?php endif ?>
    </div>
</body>
</html>