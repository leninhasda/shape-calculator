<?php
class Circle 
{
	private $radius;
	private $pi;

	function __construct()
	{
		$this->pi = acos(-1);
		$this->radius;
	}

	function getArea() 
	{ 
		return ( $this->pi * $this->radius * $this->radius );
	}

	function setRadius($r) 
	{
		$this->radius = $r;
	}
}