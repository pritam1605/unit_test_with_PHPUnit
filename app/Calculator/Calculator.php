<?php

	namespace App\Calculator;

	class Calculator {

		protected $operations = [];

		public function setOperation(OperationInterface $operation) {
			$this->operations[] = $operation;
		}


		public function getOperations() {
			return $this->operations;
		}

		public function calculate() {
			if (count($this->operations) > 1) {
				$result = NULL;

				// foreach ($this->operations as $operation) {
				// 	$result[] = $operation->calculate();
				// }

				// return $result;
				return array_map(function($operation) {
					return $operation->calculate();
				}, $this->operations);
			}

			return $this->operations[0]->calculate();
		}


		public function setOperations(array $operations) {

			// foreach ($operations as $index => $operation) {
			// 	if (!$operation instanceof OperationInterface) {
			// 		unset($operations[$index]);
			// 	}
			// }
			$filtered_operations = array_filter($operations, function ($operation) {
				return $operation instanceof OperationInterface;
			});

			$this->operations = array_merge($this->operations, $filtered_operations);
		}
	}

?>