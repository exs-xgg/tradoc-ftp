<?php 

//STATUS: READY
class User { 
    public $user_id = '999999'; 
    public $user_name = 'I_AM_sUP3RuS3R';
    public $user_sn = '999999'; 
    public $user_pw = 'd41d8cd98f00b204e9800998ecf8427e';
    public $user_fname = 'SUPER';
    public $user_lname = 'USER';
    public $user_role = '3';
    public $user_office = 'G6 C4S';
    
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