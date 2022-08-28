<?php

include ("User.php");
include ("Post.php");

Class User_Professional extends User{
    
    private $followers;
    private $posts;
    
    public function __construct($pseudo, $email, $password) {
        parent::__construct($pseudo, $email, $password);
        $this->posts=array();
    }
    
    public function addPost($unpost){       
        $this->posts[]=$unpost;
        
    }
    public function getFollowers(){
        return $this->followers;
    }
    
    public function setFollowers($FOLLOWERS){
        $this->followers=$FOLLOWERS;
    }
    
    public function getPosts(){
        return $this->posts;
    }
    
    public function setPosts($POSTS){
        $this->posts=$POSTS;
    }
    
}