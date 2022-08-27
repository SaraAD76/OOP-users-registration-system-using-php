<?php

class DBconnection{
    private $host ='localhost';
    private $user ='root';
    private $password ='';
    private $DBname ='DB';

    public function connect(){

        try{
        $DSN = 'mysql:host=' . $this->host . ';dbname=' . $this->DBname;
        $pdo = new PDO($DSN,$this->user,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
        }
        catch (PDOException $exception){
            print "Error!:". $exception->getMessage()."<br>";
            die();
        }
    }

}