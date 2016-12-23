<?php

	use App\Calculator\Division as Division;
	use App\Calculator\Exception\NoOperandsException as NoOperandsException;

	class DivisionTest extends \PHPUnit_Framework_TestCase {

		/** @test */
		public function can_divide_operands() {
			$division = new Division();
			$division->setOperands([100, 2]);

			$this->assertEquals(50, $division->calculate());
		}

		/** @test */
		public function no_operands_given_throws_exception_when_calculating() {

			$this->expectException(NoOperandsException::class);

			$division = new Division();
			$division->calculate();
		}

		/** @test */
		public function ignores_division_by_zero_operands() {
			$division = new Division();
			$division->setOperands([100, 0, 10, 0, 5]);			// we are going to ignore 0 here

			$this->assertEquals(2, $division->calculate());
		}

	}

?>