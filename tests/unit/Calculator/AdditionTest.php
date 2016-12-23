<?php

	use App\Calculator\Addition as Addition;
	use App\Calculator\Exception\NoOperandsException as NoOperandsException;

	class AdditionTest extends \PHPUnit_Framework_TestCase {

		/** @test */
		public function can_add_operands() {
			$addition = new Addition();
			$addition->setOperands([10, 15]);

			$this->assertEquals(25, $addition->calculate());
		}

		/** @test */
		public function no_operands_given_throws_exception_when_calculating() {

			$this->expectException(NoOperandsException::class);

			$addition = new Addition();
			$addition->calculate();
		}

	}

?>