<?php

	use App\Calculator\Calculator as Calculator;
	use App\Calculator\Addition as Addition;
	use App\Calculator\Division as Division;

	class CalculatorTest extends \PHPUnit_Framework_TestCase {

		/** @test */
		public function can_set_single_operation() {

			$addition = new Addition();
			$addition->setOperands([10, 20]);

			$calculator = new Calculator();
			$calculator->setOperation($addition);

			$this->assertCount(1, $calculator->getOperations());
			$this->assertInstanceOf(Addition::class, $calculator->getOperations()[0]);
		}

		/** @test */
		public function can_set_multiple_opertations() {

			$addition1 = new Addition();
			$addition1->setOperands([10, 15]);

			$addition2 = new Addition();
			$addition2->setOperands([20, 25]);

			$calculator = new Calculator();
			$calculator->setOperations([$addition1, $addition2]);

			$this->assertCount(2, $calculator->getOperations());
		}

		/** @test */
		public function operations_are_ignored_if_not_an_instance_of_operation_interface() {

			$addition = new Addition();
			$addition->setOperands([10, 20]);

			$calculator = new Calculator();
			$calculator->setOperations([$addition, 'cat', 'dog']);

			$this->assertCount(1, $calculator->getOperations());
		}

		/** @test */
		public function can_calculate_results() {

			$addition = new Addition();
			$addition->setOperands([10, 20]);

			$calculator = new Calculator();
			$calculator->setOperation($addition);

			$this->assertEquals(30, $calculator->calculate());
		}

		/** @test */
		public function calculate_method_returns_multiple_results() {

			$addition = new Addition();
			$addition->setOperands([10, 20]);

			$division = new Division();
			$division->setOperands([100, 2]);

			$calculator = new Calculator();
			$calculator->setOperations([$addition, $division]);

			$this->assertInternalType('array', $calculator->calculate());
			$this->assertEquals(30, $calculator->calculate()[0]);
			$this->assertEquals(50, $calculator->calculate()[1]);
		}
	}

?>