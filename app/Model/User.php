<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
    
	 public $name = 'User';
    public $validate = array(
        'username' => array(
            array(
                'rule' => 'alphanumeric',
                'require' => true,
                'allowEmpty' => false
            ),
            array(
                'rule' => 'isUnique'
            )
        ),
        'password' => array(
             array(
                'rule' => 'email',
                'require' => true,
                'allowEmpty' => false
            )
        )
        );
}
