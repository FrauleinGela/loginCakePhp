<?php
/**
*Here write the component Auth, because all the conttrollers will use it
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
	'DebugKit.Toolbar',
	 'Session',
        'Auth' => array(
			'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User'
                )
            ),
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                 'action' => 'login'),
            'loginError' => 'Invalid Username/Password, please try again.' ,
            'authError' => 'You must be logged in to view this page.',
        ),
        
	);
	public function beforeFilter() {
        $this->Auth->allow('login');
    }
}
