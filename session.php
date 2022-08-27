<?php
    
    abstract class Session{

        public static function setSessionKey($key,$value){
            $_SESSION[$key]=$value;
        }
        public static function isLoggedIn(){
            if(isset( $_SESSION['username'])){
                return true;
            }
            else{
                return false;
            }
        }
        public static function logIn($user,$password){
            $_SESSION['username']=$user;
            $_SESSION['password']=$password;
            
        }
        public static function logOut(){
            unset($_SESSION['username']);
            unset($_SESSION['password']);
        }

        public static function startSession(){
            if (empty($_SESSION)){
                session_start();
            }
        }
        
    }

        