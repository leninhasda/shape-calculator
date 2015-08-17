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
		$radius = inputNumber();

		$this->shape->setRadius($radius);
		$result = $this->shape->getArea();

		$result = round($result, 2);

		printf("Area of Circle: %.2f \n", $result);


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
		$base = inputNumber();
		printf("Enter height:: ");
		$height = inputNumber();

		$this->shape->setBase( $base );
		$this->shape->setHeight( $height );
		$result = $this->shape->getArea();

		$result = round($result, 2);

		printf("Area of Triangle: %.2f \n", $result);


		// save operation
		$typeOp = 'triangle';
		$inputs = [
			'base' => $base,
			'height' => $height,
		];
		$this->save($typeOp, $inputs, $result);
	}

	/**
	 * function for calculating rectangle area
	 */
	protected function calculateRectangle()
	{
		$this->shape = new Rectangle;

		printf("Enter width:: ");
		$width = inputNumber();
		printf("Enter length:: ");
		$length = inputNumber();

		$this->shape->setWidth( $width );
		$this->shape->setLength( $length );
		$result = $this->shape->getArea();

		$result = round($result, 2);

		printf("Area of Rectangle: %.2f \n", $result);


		// save operation
		$typeOp = 'rectangle';
		$inputs = [
			'width' => $width,
			'length' => $length,
		];
		$this->save($typeOp, $inputs, $result);
	}

	/**
	 * function for calculating square area
	 */
	protected function calculateSquare()
	{
		$this->shape = new Square;

		printf("Enter side:: ");
		$side = inputNumber();

		$this->shape->setSide( $side );
		$result = $this->shape->getArea();

		$result = round($result, 2);

		printf("Area of Square: %.2f \n", $result);


		// save operation
		$typeOp = 'square';
		$inputs = [
			'side' => $side,
		];
		$this->save($typeOp, $inputs, $result);
	}

	/**
	 * function for calculating parallelogram area
	 */
	protected function calculateParallelogram()
	{
		$this->shape = new parallelogram;

		printf("Enter base:: ");
		$base = inputNumber();
		printf("Enter height:: ");
		$height = inputNumber();

		$this->shape->setBase( $base );
		$this->shape->setHeight( $height );
		$result = $this->shape->getArea();

		$result = round($result, 2);

		printf("Area of Parallelogram: %.2f \n", $result);


		// save operation
		$typeOp = 'parallelogram';
		$inputs = [
			'base' => $base,
			'height' => $height,
		];
		$this->save($typeOp, $inputs, $result);
	}

	/**
	 * function to show last (at most) 3 operation
	 */
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


		printf("=======================\n");
		printf("   Recent Operations   \n");
		printf("=======================\n");

		foreach( $range as $index ) {

			$memblock = $memory[ $size - $index ];

			printf("Area of %s: %.2f\n", $memblock['type'], $memblock['result']);
			foreach ($memblock['inputs'] as $key => $value) {
				printf("%s = %.2f\n", $key, $value);
			}

			printf("\n");
		}
	}

	/**
	 * function to delete the most recent operation
	 */
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

	/**
	 * function to save operation with their data
	 *
	 * @param string $typeOp type of operation
	 * @param array  $inputs operation data
	 * @param double $result result
	 */
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

