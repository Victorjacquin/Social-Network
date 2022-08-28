<?php

Class Post{
    private $id;
    private $libellé;
    private $picture;
    private $date;
    private $user;
    
    public function __construct($libellé) {
        $this->libellé=$libellé;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($ID){
        $this->id=$ID;
    }
    
    public function getLibelle(){
        return $this->libellé;
    }
    
    public function setLibelle($LIBELLE){
        $this->libellé=$LIBELLE;
    }
    
    public function getPicture(){
        return $this->picture;
    }
    
    public function setPicture($PICTURE){
        $this->picture=$PICTURE;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setDate($DATE){
        $this->date=$DATE;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function setUser($USER){
        $this->user=$USER;
    }
    
    
}

