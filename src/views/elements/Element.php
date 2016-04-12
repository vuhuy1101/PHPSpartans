<?php
//Elements
namespace PHPSpartans\hw3\views\elements;

abstract class Element
{
	public $view;
	/**
	 * This method should be overriden to draw a web page to the browser
	 */
	 
	public function __construct ($view)
	{
		$this->$view = $view;
	}
	 
	public abstract function render($data);
}