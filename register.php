<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<style>
     .wrap {
        margin: 0 auto;
        max-width: 400px;
    }
</style>
<body>
    <div class="container mt-5 wrap">
        <h1 class="h3 mb-4">Register</h1>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-warning">
            Cannot create account. Please try again.
            </div>
        <?php endif ?>
        <form action="_actions/create.php" method="post">
            <input type="text" name="name" placeholder="Name" required class="form-control mb-2">
            <input type="text" name="email" placeholder="Email" required class="form-control mb-2">
            <input type="text" name="phone" placeholder="Phone" required class="form-control mb-2">
            <textarea name="address" placeholder="Address" class="form-control mb-2" required></textarea>
            <input type="password" name="password" placeholder="Password" required class="form-control">
            <input type="submit" value="Register" class="btn btn-primary mt-4">
            <a href="index.php" class="btn btn-outline-primary ms-2 mt-4">Login</a>
        </form>
</body>
</html>