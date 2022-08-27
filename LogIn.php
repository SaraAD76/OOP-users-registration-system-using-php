<?php
require "session.php";
require "UserRepository.php";
  session::startSession(); 

    $username= $_POST["username"];
    $password= $_POST["password"];
 

    $UP= new UsersRepository();
    $key1= $UP->checkIfUserExist($username);
    $key2= $UP->matchWithPassword($username,$password);

    if(!$key1){
      //display error message 
      header("location:MainPage");
    }
    else if (!$key2){
      //display error message
      header("location:MainPage");
    }
    else{
      session::logIn($username,$password);
      header("location:MainPage");
    }

    
