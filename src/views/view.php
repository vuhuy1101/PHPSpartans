<?php

namespace PHPSpartans\hw3\views;

/**
 * Base class for all views used in the Image Rating website
 */
abstract class View
{w
    /**
     * This method should be overriden to draw a web page to the browser
     */
    public abstract function render($data);
}
