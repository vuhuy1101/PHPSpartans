<?php
//Helpers
namespace PHPSpartans\hw3\views\helpers;

abstract class Helper
{
	public $view;
	/**
	 * This method should be overriden to draw a web page to the browser
	 */
	public abstract function render($data);
}