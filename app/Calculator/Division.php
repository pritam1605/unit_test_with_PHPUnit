<?php

	namespace App\Calculator;
	use App\Calculator\Exception\NoOperandsException as NoOperandsException;

	class Division extends OperationAbstract implements OperationInterface {

		public function calculate() {
			if (count($this->operands) === 0) {
				throw new NoOperandsException();
			}

			// $result = 0;

			// foreach (array_filter($this->operands) as $index => $operand) {
			// 	if ($index === 0) {
			// 		$result = $operand;
			// 		continue;
			// 	}

			// 	$result /= $operand;
			// }
			// return $result;

			return array_reduce(array_filter($this->operands), function($carry, $current) {
				if ($current != NULL && $carry != NULL) {
					return $carry/$current;
				}

				return $current;

			}, NULL);
		}

	}


?>