<?php 

// include all the library files
include "lib/circle.php";
include "lib/polygone.php";
include "lib/square.php";
include "lib/triangle.php";
include "lib/rectangle.php";
include "lib/parallelogram.php";


/**
 * function for getting input
 *
 * @return string user input value
 */
function input()
{
	return trim( fgets( STDIN ) );
}

/**
 * clear current terminal screen
 */
function clearScreen($value='')
{
	system("clear");
}

/**
 * makes the main screen
 */
function mainScreen()
{
	printf("==================\n");
	printf(" Shape Calculator \n");
	printf("==================\n");
	printf("[c] Circle\n");
	printf("[t] Triangle\n");
	printf("[r] Rectangle\n");
	printf("[s] Square\n");
	printf("[p] Parallelogram\n");
	printf("[a] Show Memory\n");
	printf("[d] Delete Memory\n");
	printf("[q] Exit\n");
}

/**
 * makes the input line
 */
function inputScreen()
{
	printf("\nchoice:: ");
}

/**
 * verifies and returns a number input
 */
function inputNumber()
{
	$valid = false;
	
	while( ! $valid ) {
		$number = input();
		if( is_numeric( $number ) && 0 <= $number ) {
			$valid = true;
		} else {
			printf("Input should be a valid number:: ");
		}
	}

	return $number;
}