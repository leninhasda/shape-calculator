<?php 

// square class
class Square extends Polygone {

	public function getArea()
	{
		return ($this->side * $this->side );
	}
}