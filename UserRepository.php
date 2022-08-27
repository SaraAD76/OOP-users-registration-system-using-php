<?php
require "database/DBconnection.php";

class UsersRepository {
private $db= new DBconnection();

public function AddNewUser($Name,$username,$email,$phone,$password){
    $sql="INSERT INTO users ( name, username,email,phone,password) VALUES (?,?,?,?,?)";
    $stmt = $this->db->connect()->prepare($sql);
    //WE NEED HASHING FOR THE PASSWORD
    $encryptedPass= password_hash($password,PASSWORD_DEFAULT);
    $stmt->execute([$Name,$username,$email,$phone,$encryptedPass]);

    return true;
}
public function checkIfUserExist($username){

    $sql="SELECT * FROM users WHERE username = ?";
    $statement= $this->db->connect()->prepare($sql);
    $statement->execute([$username]);
    $userExist = $statement->rowCount();

    if($userExist>1){
        return true ;
    }
    return false;
}
public function checkIfEmailExist($email){

    $sql="SELECT * FROM users WHERE email = ?";
    $statement= $this->db->connect()->prepare($sql);
    $statement->execute([$email]);
    $userExist = $statement->rowCount();

    if($userExist>1){
        return true ;
    }
    return false;
}

public function matchWithPassword($username,$password){

        $sql="SELECT * FROM users WHERE username = ?";
        $statement= $this->db->connect()->prepare($sql);
        $statement->execute([$username]);
        $encryptedPass= password_hash($password,PASSWORD_DEFAULT);
        $user = $statement->fetchAll();
            if($user[0]['password']==$encryptedPass){
                return true;
            }
            else 
                return false;
        
    
}
}


