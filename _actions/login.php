<?php

   include("../vendor/autoload.php");
   session_start();

   use Libs\Database\MySQL;
   use Libs\Database\UsersTable;
   use Helpers\HTTP;

   $email = $_POST['email'];
   $password = $_POST['password'];

   $table = new UsersTable(new MySQL());

   $user = $table->findByEmailAndPassword($email, $password);

   if($user){ //or and
        if($table->suspended($user->id)) {
            HTTP::redirect("/index.php", "suspended=1");
        }
        $_SESSION['user'] = $user;
        HTTP::redirect("/profile.php");
   }else {
        HTTP::redirect("/index.php", "incorrect=1");
   }