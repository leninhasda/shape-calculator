<?php 

// class parallelogram
class Parallelogram extends Polygone {

	protected $base;

	function setBase( $b ) 
	{
		$this->base = $b;
	}

	function setHeight( $h ) 
	{
		$this->setSide( $h );
	}

	public function getArea()
	{
		return ( $this->side * $this->base );
	}
}