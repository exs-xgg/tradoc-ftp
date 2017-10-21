<?php 
class User { 
    public $user_id = 'a'; 
    public $user_name = 'a'; 
    public $user_fname = 'asd';
    public $user_lname = 'dsa';
    public $user_role = 'dsa';
    
    function logout() { 
    $this->userid = ''; 
    $this->user_name = ''; 
    $this->user_fname = '';
    $this->user_lname = '';
    $this->user_role = '';
    } 
    function callAll(){
  	echo $this->user_id; 
   	echo $this->user_name ; 
	echo $this->user_fname ;
 	echo $this->user_lname ;
 	echo $this->user_role ;
   }
} 

?> 