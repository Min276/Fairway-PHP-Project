<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <?php
    include("vendor/autoload.php");

    use Libs\Database\MySQL ;
    use Libs\Database\UsersTable ;
    use Helpers\Auth ;

    $table = new UsersTable(new MySQL);
    $result = $table->getAll();
    $auth = Auth::check();
    ?>
    <div class="container">
        <h1 class="py-4">
            Manage Users
            <span class="badge bg-primary text-white">
                <?= count($result) ?>
            </span>
        </h1>
        <table class="table table-dark table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <tr>
              <?php foreach ($result as $user) : ?>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->phone ?></td>
                <td>
                    <?php if($user->id !== $auth->id): ?>
                    <a href="_actions/delete.php?id=<?= $user->id ?>"
                    class="btn btn-danger"
                    onClick="return confirm('Are you sure?')">Delete</a>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    
</body>
</html>