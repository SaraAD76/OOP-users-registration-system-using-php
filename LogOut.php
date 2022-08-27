<?php
require "session.php";
require "UserRepository.php";
  session::startSession(); 

    session::logOut();
    header("location:MainPage");

    
