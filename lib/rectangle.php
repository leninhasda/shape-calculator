<?php 

//rectangle class
class Rectangle extends Polygone {

	protected $width;

	public function setWidth( $w )
	{
		$this->width = $w;
	}

	public function getArea()
	{
		return ( $this->side * $this->width );
	}
}