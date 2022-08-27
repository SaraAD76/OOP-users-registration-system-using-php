<?php
require "session.php";
require "USerRepository.php";
  session::startSession(); 


        $Name=$_POST["name"];
        $username= $_POST["username"];
        $email= $_POST["email"];
        $phone= $_POST["phone"];
        $password= $_POST["password"];
  
    $UP= new UsersRepository();
    if ($UP->checkIfUserExist($username)||$UP->checkIfEmailExist($email)){
      echo "You already have an account, please go to log in";
    }
    else {
      $UP->AddNewUser($Name,$username,$email,$phone,$password);
      echo "You are signed up";

      session::logIn($username,$password);
      header("location:MainPage");
    }

    

      















 ?>
