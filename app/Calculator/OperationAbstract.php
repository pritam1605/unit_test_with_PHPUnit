<?php

	namespace App\Calculator;

	abstract class OperationAbstract {

		protected $operands = [];

		public function setOperands(Array $operands) {
			$this->operands = $operands;
		}
	}

?>