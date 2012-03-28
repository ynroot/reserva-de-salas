<?php
App::uses('User', 'Model');

class UsersControllerTest extends ControllerTestCase {
	public $fixtures = array('app.user', 'app.student', 'app.professor',
			'app.employee');

	public function setUp() {
		parent::setUp();

		$this->User = ClassRegistry::init('User');
	}

	public function testGetCreateAccount() {
		$this->testAction('/Users/createAccount', array('method' => 'get'));
	}

	public function testCreateAccount() {
		$data = array(
				'User' => array('name' => 'User Test', 'nusp' => '1234567',
						'email' => 'test@ime.usp.br', 'password' => '12345',
						'passwordConfirmation' => '12345',
						'userType' => 'Student'));

		$data['Student']['course'] = 'BCC';
		$this
				->testAction('Users/createAccount',
						array('method' => 'post', 'data' => $data));

		$this->User->order = 'User.id DESC';
		$user = $this->User->find('first');

		$this->assertEqual($user['User']['name'], $data['User']['name']);
		$this->assertEqual($user['User']['email'], $data['User']['email']);
		$this->assertEqual($user['User']['nusp'], $data['User']['nusp']);
		$this
				->assertEqual($user['User']['password'],
						AuthComponent::password($data['User']['password']));
	}

	public function testConfirmEmail() {

		$user_id = 2;
		$user = $this->User->findById($user_id);

		$this->testAction('Users/confirmEmail/' . $user['User']['hash']);

		$result = $this->User->findById($user_id);

		$this
				->assertEqual($result['User']['activation_status'],
						'waiting_activation');
	}
}
