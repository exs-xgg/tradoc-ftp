<?php 

//STATUS: READY
class User { 
    public $user_id = 'a'; 
    public $user_name = 'a';
    public $user_sn = 'a'; 
    public $user_pw = 'a';
    public $user_fname = 'asd';
    public $user_lname = 'dsa';
    public $user_role = 'dsa';
    public $user_office = 'a';
    
    function logout() { 
    $this->user_id = ''; 
    $this->user_name = ''; 
    $this->user_fname = '';
    $this->user_lname = '';
    $this->user_role = '';
    $this->user_office = '';
    $this->user_pw = '';
    $this->user_sn = '';
    } 
    function callAll(){
  	echo $this->user_id; 
   	echo $this->user_name ; 
	echo $this->user_fname ;
 	echo $this->user_lname ;
 	echo $this->user_role ;
    echo $this->user_office;
   }
} 

?> 