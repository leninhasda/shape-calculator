<?php 

/**
 * main file
 *
 * @author Lenin Hasda
 * @email leninhasda@gmail.com
 * @version 1.0
 */

// include library
require 'lib.php';

/**
 * memory block for this program
 * keeps the program operation and results
 * as mixed array
 * @var array $memory
 */
$memory = [];

// main app class
class App {
	/**
	 * keeps user choice input
	 * @var string $choice
	 */
	protected $choice;

	/**
	 * determine if program should continue running
	 * @var bool $continue
	 */
	protected $continue;

	/**
	 * main shape object to create new shapes
	 * @var object $shape
	 */
	protected $shape;

	
	function __construct()
	{
		// initialize vars
		$this->choice = '';
		$this->continue = true;
		$this->shape = null;

	}

	/**
	 * function that executes the application
	 */
	public function run()
	{
		clearScreen();
		mainScreen();
		

		while( $this->continue ) {

			inputScreen();

			$this->choice = input();
			//var_dump($this->choice);
			switch ($this->choice) {
				case 'c':
					$this->calculateCircle();
					break;
				case 't':
					$this->calculateTriangle();
					break;
				case 'r':
					$this->calculateRectangle();
					break;
				case 's':
					$this->calculateSquare();
					break;
				case 'p':
					$this->calculateParallelogram();
					break;
				case 'a':
					$this->showRecentMemory();
					break;
				case 'd':
					$this->delete();
					break;
				case 'q':
					$this->continue = false;
					break;
				
				default:
					printf("Invalide input!\n");
					break;
			}

		}
	}

	/**
	 * function for calculating circle area
	 */
	protected function calculateCircle()
	{
		$this->shape = new Circle;

		printf("Enter radius:: ");
		$radius = input();

		$this->shape->setRadius($radius);
		$result = $this->shape->getArea();

		printf("Area of Circle: %f \n", $result);


		// save operation
		$typeOp = 'circle';
		$inputs = [
			'radius' => $radius,
		];
		$this->save($typeOp, $inputs, $result);
	}

	/**
	 * function for calculating triangle area
	 */
	protected function calculateTriangle()
	{
		$this->shape = new Triangle;

		printf("Enter base:: ");
		$base = input();
		printf("Enter height:: ");
		$height = input();

		$this->shape->setBase( $base );
		$this->shape->setHeight( $height );
		$result = $this->shape->getArea();

		printf("Area of Triangle: %f \n", $result);


		// save operation
		$typeOp = 'triangle';
		$inputs = [
			'base' => $base,
			'height' => $height,
		];
		$this->save($typeOp, $inputs, $result);
	}

	protected function calculateRectangle()
	{
		$shape = new Circle;
		$radius = input();
		$shape->setRadius($radius);
		printf("Area of Circle: %f \n", $shape->getArea());
	}

	protected function calculateSquare()
	{
		$shape = new Circle;
		$radius = input();
		$shape->setRadius($radius);
		printf("Area of Circle: %f \n", $shape->getArea());
	}

	protected function calculateParallelogram()
	{
		$shape = new Circle;
		$radius = input();
		$shape->setRadius($radius);
		printf("Area of Circle: %f \n", $shape->getArea());
	}

	protected function showRecentMemory()
	{
		global $memory;

		$size = count( $memory );

		if( 3 <= $size  ) {
			$range = range(1,3);
		} else if( 2 == $size ) {
			$range = range(1,2);
		} else if( 1 == $size ) {
			$range = [1];
		}

		if( ! $size ) {
			printf("Nothing in memory!\n");
			return;
		}

		foreach( $range as $index ) {

			$memblock = $memory[ $size - $index ];

			printf("Area of %s: %f\n", $memblock['type'], $memblock['result']);
			foreach ($memblock['inputs'] as $key => $value) {
				printf("%s = %f\n", $key, $value);
			}

			printf("\n");
		}
	}

	protected function delete()
	{
		global $memory;

		if( ! count( $memory ) ) {
			printf("Nothing to delete!\n");
		} else {
			array_pop($memory);

			printf("Last memory deleted.\n");	
		}
		
	}

	protected function save( $typeOp, $inputs, $result )
	{
		global $memory;

		// make the format
		$data = [
			'type' 		=> $typeOp,
			'inputs' 	=> $inputs,
			'result' 	=> $result,
		];

		// save in memory
		$memory[] = $data;
	}
}

// initialize and run the app
(new App)->run();

// loop until quit
/*while( $run ) {

	$choice = input();

	switch ($choice) {
		case 'c':
			$shape = new Circle;
			$radius = input();
			$shape->setRadius($radius);
			printf("Area of Circle: %f \n", $shape->getArea());
			break;
		case 'c':
			# code...
			break;
		case 'c':
			# code...
			break;
		case 'c':
			# code...
			break;
		case 'c':
			# code...
			break;
		case 'c':
			# code...
			break;
		case 'q':
			$run = false;
			break;
		
		default:
			printf("Invalide input!\n");
			break;
	}

}*/

//$shape = new Circle;
// $shape->setRadius(2);
// var_dump($shape->getArea());

// $shape = new Triangle;
// $shape->setSide(10);
// $shape->setBase(20);
// var_dump($shape->getArea());

// $shape = new Square;
// $shape->setSide(5);
// var_dump($shape->getArea());

// $shape = new Rectangle;
// $shape->setSide(10);
// $shape->setWidth(20);
// var_dump($shape->getArea());

// $shape = new Parallelogram;
// $shape->setSide(10);
// $shape->setWidth(202);
// var_dump($shape->getArea());
