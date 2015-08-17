<?php 

//rectangle class
class Rectangle extends Polygone {

	protected $width;

	public function setWidth( $w )
	{
		$this->width = $w;
	}

	public function setLength( $l ) 
	{
		$this->setSide( $l );
	}

	public function getArea()
	{
		return ( $this->side * $this->width );
	}
}