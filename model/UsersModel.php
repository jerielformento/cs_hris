<?php 
namespace REJ\Model;

class UsersModel {
	
	public $fields = array(
        'id' => array(
            'field'=>'', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'user_id' => array(
            'field'=>'', 
            'validate'=>'int', 
            'min'=>0, 
            'max'=>0
        ),
        'first_name' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>2, 
            'max'=>30
        ),
        'middle_name' => array(
            'field'=>'', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>30
        ),
        'last_name' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>2, 
            'max'=>30
        ),
        'username' => array(
            'field'=>'require', 
            'validate'=>'username', 
            'min'=>6, 
            'max'=>100
        ),
        'password' => array(
            'field'=>'require', 
            'validate'=>'password', 
            'min'=>8, 
            'max'=>30
        ),
        'confirm_password' => array(
            'field'=>'require', 
            'validate'=>'password', 
            'min'=>8, 
            'max'=>30
        ),
        'email_address' => array(
            'field'=>'', 
            'validate'=>'email', 
            'min'=>0, 
            'max'=>45
        ),
        'privilege' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        )
    );
	
}