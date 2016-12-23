<?php
	use App\Models\User as User;
	class UserTest extends \PHPUnit_Framework_TestCase {

		protected $user;

		public function setUp() {
			// built-in function that will get called before each test starts
			$this->user = new User();									// Arrange
		}

		public function tearDown() {
			// built-in function that will get called after each test ends
		}

		/** @test */
		public function GetFirstName() {
			// since we have a doc section we don't need to prepend the function name with 'test'
			$this->user->setFirstName('David');							// Act

			$this->assertEquals($this->user->getFirstName(), 'David');	// Assert
		}

		public function testGetLastName() {

			$this->user->setLastName('Jones');							// Act

			$this->assertEquals($this->user->getLastName(), 'Jones');	// Assert
		}

		public function testFullName() {

			$this->user->setFirstName('Pratso');
			$this->user->setLastName('Carseldine');

			$this->assertEquals($this->user->getFullName(), 'Pratso Carseldine');
		}

		public function testFirstNameAndLastNameAreTrimmed() {

			$this->user->setFirstName('          Pratso    ');
			$this->user->setLastName('  Carseldine         ');

			$this->assertEquals($this->user->getFirstName(), 'Pratso');
			$this->assertEquals($this->user->getLastName(), 'Carseldine');
		}

		public function testCheckEmail() {

			$this->user->setEmail('prit1605@gmail.com');

			$this->assertEquals($this->user->getEmail(), 'prit1605@gmail.com');
		}

		public function testCheckEmailVariables() {

			$this->user->setFirstName('Pratso');
			$this->user->setLastName('Carseldine');
			$this->user->setEmail('pratsocarseldine@gmail.com');

			$emailVariables = $this->user->getEmailVariables();

			$this->assertArrayHasKey('fullname', $emailVariables);
			$this->assertArrayHasKey('email', $emailVariables);

			$this->assertEquals($emailVariables['fullname'], 'Pratso Carseldine');
			$this->assertEquals($emailVariables['email'], 'pratsocarseldine@gmail.com');
		}
	}

?>