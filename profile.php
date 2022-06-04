<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<style>
    .wrap {
        max-width: 400px;
        margin: 0 auto;
    }
    .center {
        text-align: center;
    }
    img {
        width: 200px!important;
        height: 200px!important;
    }
</style>
    <?php 
       include("vendor/autoload.php");
       use Helpers\Auth;

       $auth = Auth::check();
    ?>
<body>
    <div class="container wrap">
    <div class="center">
    <h1 class="mt-4 h2 mb-3">Profile</h1>

    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-warning">
            Cannot Upload File
        </div>
    <?php endif ?>

    <?php if(file_exists('_actions/photos/profile.jpg')) :?>
        <img src="_actions/photos/profile.jpg" 
             alt="Profile Photo" class="img-thumbnail mb-3"
             width="200px" >
    <?php endif ?>
    </div>
    <!-- <div class="row">
    <div class="col-8 col-md-8 col-lg-6"> -->
    <form action="_actions/upload.php" method="post"
          enctype="multipart/form-data">
          <div class="input-group mb-3">
              <input type="file" name="photo" class="form-control">
              <button class="btn btn-secondary">Upload</button>
          </div>
    </form>
    <ul class="list-group mt-4">
        <li class="list-group-item"><strong>Name:</strong> <?= $auth->name ?></li>
        <li class="list-group-item"><strong>Position:</strong> Executive Director</li>
        <li class="list-group-item"><strong>Email:</strong><?= $auth->email ?></li>
    </ul>
    <!-- </div> -->
    <!-- </div> -->

    </div>
</body>
</html>