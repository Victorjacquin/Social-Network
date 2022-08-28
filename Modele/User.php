<?php

class User{
    private $id;
    private $pseudo;
    private $email;
    private $password;
    
    
    public function __construct($pseudo, $email, $password){
        $this->pseudo=$pseudo;
        $this->email=$email;
        $this->password=$password;
    }
    public function getId(){
        return $this->id;
    }
    
    public function setId($ID){
        $this->id=$ID;
    }
    
    public function getPseudo(){
        return $this->pseudo;
    }
    
    public function setPseudo($PSEUDO){
        $this->pseudo=$PSEUDO;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($EMAIL){
        $this->email=$EMAIL;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($PASSWORD){
        $this->password=$PASSWORD;
    }
    
}
