<?php

	use App\Support\Collection as Collection;
	class CollectionTest extends \PHPUnit_Framework_TestCase {

		/** @test */
		public function empty_initiation_returns_no_items() {
			$collection = new Collection();
			$this->assertEmpty($collection->get());
		}

		/** @test */
		public function count_is_correct_for_items_passed_in() {
			$collection = new Collection([
				'one', 'two', 'three',
			]);

			$this->assertEquals($collection->count(), 3);
		}

		/** @test */
		public function items_returned_matches_items_passed_in() {
			$collection = new Collection([
				'one', 'two', 'three', 'four',
			]);

			$this->assertCount(4, $collection->get());
			$this->assertEquals($collection->get()[0], 'one');
			$this->assertEquals($collection->get()[1], 'two');
		}

		/** @test */
		public function collection_is_instance_of_iterator_aggregate() {
			$collection = new Collection();

			$this->assertInstanceOf(IteratorAggregate::class, $collection);
		}

		/** @test */
		public function collection_can_be_iterated() {

			$collection = new Collection([
				'one', 'two', 'three', 'four',
			]);

			$items = [];

			foreach ($collection as $item) {
				$items[] = $item;
			}

			$this->assertCount(4, $items);
			$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
		}

		/** @test */
		public function collection_can_be_mearged_with_other_collection() {
			$collection1 = new Collection([
				'one', 'two',
			]);

			$collection2 = new Collection([
				'three', 'four', 'five',
			]);

			$collection1->merge($collection2);

			$this->assertCount(5, $collection1->get());
			$this->assertEquals(5, $collection1->count());

		}

		/** @test */
		public function items_can_be_added_to_the_collection() {
			$collection = new Collection([
				'one', 'two',
			]);

			$collection->add(['three']);

			$this->assertCount(3, $collection->get());
			$this->assertEquals(3, $collection->count());
		}

		/** @test */
		public function returns_jason_encoded_items() {
			$collection = new Collection([
				['username' => 'david'],
				['username' => 'mike'],
			]);

			$this->assertInternalType('string', $collection->toJson());
			$this->assertEquals('[{"username":"david"},{"username":"mike"}]', $collection->toJson());
		}

		/** @test */
		public function json_encoding_collection_returns_json() {
			$collection = new Collection([
				['username' => 'david'],
				['username' =>'mike'],
			]);

			$encoded_collection = json_encode($collection);

			$this->assertInternalType('string', $encoded_collection);
			$this->assertEquals('[{"username":"david"},{"username":"mike"}]', $encoded_collection);
		}

	}

?>