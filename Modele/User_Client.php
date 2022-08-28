<?php

include ("User.php");

class User_Client extends User{
    
    private $following;
    
    public function __construct($pseudo,$email,$password){
        parent::__construct($pseudo,$email,$password);
    }
    public function getFollowing(){
        return $this->following;
    }
    
    public function setFollowing($FOLLOWING){
        $this->following=$FOLLOWING;
    }
}
