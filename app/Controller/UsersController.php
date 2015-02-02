<?php
    App::uses('AppController', 'Controller');

    class UsersController extends AppController {	
    public $components = array(
    'Protect'
    );


    public function beforeFilter() {
    $this->Auth->allow('login'); 
    if($this->Auth->loggedIn()){
         
    }
    }
	
    public function index() {
		
    }
    /**
    *works with the authentication (Auth->login compares with the data)
    */
    public function login(){
    if (!empty ($this->request->data)) {
    if ($this->Auth->login()) {
    $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
    $this->redirect($this->Auth->redirect());
    }else {
    //if user wrongs, this checks the numbers of errors
    $action =  $this->request->data['User']['username']; 
    //if  attempts is less than 3 times (2, because we start from 0)
    if ($this->Protect->access($action,2)) {
    if(!$this->Auth->login($user['User'])) {
    $this->Protect->fail($action,"5m");
    }else {
    $this->redirect($this->Auth->redirect()); 
    }
    }else{ 
    $this->Session->setFlash("Wrong login 3 times. Try again in 5 minutes!",'default',array(),'lock'); 
    }  
    $this->Session->setFlash('Invalid username or password', 'default', array(), 'invalid');
					
    }
			
    } 
    }
    public function logout() {
    $this->redirect($this->Auth->logout());
    }
    /**
    *this function is used only once, create my user by default
    *
    *public function addMyUser(){
    *	$user="angela";
    *	$pass="angela";
    *	//add the method of encrypth  by deault from Cakephp (salt and then hash)
    *	$pass= AuthComponent::password($pass);
    *	if($this->User->save(array('username'=>$user,'password'=>$pass))){
    *		echo "create";
    *	}
    *}
    */


    }
?>