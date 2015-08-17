<?php

// base class
class Polygone {

	protected $side;

	public function getArea()
	{
		// override this
	}

	public function setSide( $s )
	{
		$this->side = $s;
	}
}