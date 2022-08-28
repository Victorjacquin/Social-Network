<?php

Class like_{
    
   private $id;
   private $date;
   private $client; 
   private $post;
   
   public function __construct($id, $date, $client,$post) {
       $this->id=$id;
       $this->date=$date;
       $this->client=$client;
       $this->post=$post;
   }
   
    public function getId(){
        return $this->id;
    }
    
    public function setId($ID){
        $this->id=$ID;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setDate($DATE){
        $this->date=$DATE;
    }
    
    public function getClient(){
        return $this->client;
    }
    
    public function setClient($CLIENT){
        $this->client=$CLIENT;
    }
    
    public function getPost(){
        return $this->id;
    }
    
    public function setPost($POST){
        $this->post=$POST;
    }
}