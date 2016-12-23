<?php

	namespace App\Models;

	class User {

		protected $firstname;
		protected $lastname;
		protected $email;

		public function setFirstName($firstname) {
			$this->firstname = trim($firstname);
		}

		public function getFirstName() {
			return $this->firstname;
		}

		public function setLastName($lastname) {
			$this->lastname = trim($lastname);
		}

		public function getLastName() {
			return $this->lastname;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getFullName() {
			return $this->firstname . ' ' . $this->lastname;
		}

		public function getEmailVariables() {
			return [
				'fullname' => $this->getFullName(),
				'email' => $this->getEmail(),
			];
		}
	}

?>