<?php
/**
 *  Controller.php
 *  (C) 2016 Chris Pollett
 */
namespace PHPSpartans\hw3\controllers;

use PHPSpartans\hw3 as B;

/**
 * Base class for all controllers used in the Email Validator Web App
 */
abstract class Controller
{
    /**
     * This method should be overriden to handle requests to a controller
     * from the web app
     */
    public abstract function processRequest($name);
    /**
     * Used to remove bad input from either a GET'd or POST'd form variable
     *
     * @param string $request_field name of form variable to sanitize
     * @param string $type how to sanitize it. For now can be either
     *      string or email.
     * @return $_REQUEST['$request_field'] after sanitization
     */
    public function sanitize($request_field, $type)
    {
        switch($type) {
            case "email":
                //filter_input = take a request and sanitize to only those characters involved in the email address
                $out = filter_input(INPUT_GET,
                    $request_field, FILTER_SANITIZE_EMAIL);
                if ($out === false) {
                    $out = filter_input(INPUT_POST,
                        $request_field, FILTER_SANITIZE_EMAIL);
                }
                break;
            case "string":
                $out = filter_input(INPUT_GET,
                    $request_field, FILTER_SANITIZE_STRING);
                if ($out === false) {
                    $out = filter_input(INPUT_POST,
                        $request_field, FILTER_SANITIZE_STRING);
                }
                break;
            default:
                $out = "";
        }
        return $out;
    }
    /**
     * Used to check if the provided $variable is of $type.
     *
     * @param string $variable to check the type of 
     * @param string $type for now can be one of email, in which case checks
     *  if $variable is a valid email address, or url, in which case checks
     *  if a valid url.
     * @return bool whether $variable was of $type
     */
    public function validate($variable, $type)
    {
        switch($type) {
            case "email":
                $valid = filter_var($variable, FILTER_VALIDATE_EMAIL);
                break;
            case "url":
                $valid = filter_var($variable, FILTER_VALIDATE_URL);
                break;
            default:
                $valid = false;
                break;
        }
        return $valid;
    }
    /**
     * Used to get a singleton instance of the given view.
     *
     * @param string $name name of view class desired. foo
     *  would return an instance of FooView.
     * @return object instance of desired view.
     */
    public function view($name)
    {
        static $loaded_views = [];
        if (!empty($loaded_views[$name])) {
            return $loaded_views[$name];
        }
        $class_name = ucfirst($name) . "View";
        $full_name = B\NS_VIEWS . $class_name;
        $view_folder = __DIR__ . "/../views/";
        $path_name = $view_folder . $class_name . ".php";
        if (file_exists($path_name)) {
            require_once $path_name;
            $loaded_views[$name] = new $full_name();
            return $loaded_views[$name];
        }
        return false;
    }
}
