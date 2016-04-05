<?php
//Model
/*
 Need function to initialize data at beginning, get data, update data, connect with DB
*/
namespace  PHPSpartans\hw3\models;

abstract class Model
{
	public $data;
	
	function __construct(){
		$this->$data = array();
	}
	
	public abstract function connectDB();
}