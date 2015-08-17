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
					$this->deleteMomory();
					break;
				case 'q':
					$this->continue = false;
					break;
				
				default:
					printf("Invalide input!\n");
					break;
			}

			$this->again();
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
		$result = $this->shape->getArea()
		printf("Area of Circle: %f \n", $result);


		// save operation
		$typeOp = 'circle';
		$inputs = [
			'radius' => $radius,
		];
		$this->save($typeOp, $inputs, $result);
	}

	protected function calculateTriangle()
	{
		$shape = new Circle;
		$radius = input();
		$shape->setRadius($radius);
		printf("Area of Circle: %f \n", $shape->getArea());
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
		$shape = new Circle;
		$radius = input();
		$shape->setRadius($radius);
		printf("Area of Circle: %f \n", $shape->getArea());
	}

	protected function deleteMomory()
	{
		$shape = new Circle;
		$radius = input();
		$shape->setRadius($radius);
		printf("Area of Circle: %f \n", $shape->getArea());
	}

	protected function saveMemory( $typeOp, $inputs, $result )
	{
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
