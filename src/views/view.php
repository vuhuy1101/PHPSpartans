<?php
/**
 * View.php
 * (C) 2016 Chris Pollett
 */
namespace cs174\email_validator\views;

/**
 * Base class for all views used in the Email Validator Web App
 */
abstract class View
{
    /**
     * This method should be overriden to draw a web page to the browser
     */
    public abstract function render($data);
}
