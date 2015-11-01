<?php

namespace Peon;

class Router
{
    /**
     * The Current URI
     *
     * @var string
     */
    private $uri;

    /**
     * The URI Segments
     *
     * @var array
     */
    private $segments;

    /**
     * The Controller
     *
     * @var string
     */
    private $controller;

    /**
     * The Controller's Method
     *
     * @var string
     */
    private $method;

    /**
     * The Route Parameters
     *
     * @var array
     */
    private $parameters;

    /**
     * Create a new router
     *
     * @return void
     */
    public function __construct()
    {
        $this->prepareUri();
        $this->extractSegments();
    }

    /**
     * Dispatch The Route
     *
     * @return void
     */
    public function dispatch()
    {
        $this->validateRoute();

        return $this->callControllerMethod();
    }

    /**
     * Get A URI Segment By Position
     *
     * @param  integer  $position
     * @param  string  $default
     * @return string
     */
    public function getSegment($position, $default = '')
    {
        if (isset($this->segments[$position - 1])) {
            return $this->segments[$position - 1];
        }

        return $default;
    }

    /**
     * Prepare the URI
     *
     * @return void
     */
    private function prepareUri()
    {
        $uri = str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
        $uri = preg_replace('~/+~', '/', $uri);

        $this->uri = trim($uri, '/') ?: 'page/welcome';
    }

    /**
     * Extract URI Segments to Class Properties
     *
     * @return void
     */
    private function extractSegments()
    {
        $segments = explode('/', $this->uri);
        $this->segments = $segments;

        $this->controller = $this->formatController(array_shift($segments));
        $this->method = $this->formatMethod(array_shift($segments));
        $this->parameters = empty($segments) ? array() : $segments;
    }

    /**
     * Format The Controller Segment
     *
     * @param  string  $controller
     * @return void
     */
    private function formatController($controller)
    {
        $controller = array_map(function ($segment) {
            return ucfirst(strtolower($segment));
        }, explode('-', $controller));

        return "App\\Controllers\\" . implode('\\', $controller) . 'Controller';
    }

    /**
     * Format The Controller Method Segment
     *
     * @param  string  $method
     * @return void
     */
    private function formatMethod($method)
    {
        $segments = array_map(function ($segment) {
            return ucfirst(strtolower($segment));
        }, explode('-', $method));

        return lcfirst(implode('', $segments));
    }

    /**
     * Validate The Route
     *
     * @return void
     */
    private function validateRoute()
    {
        // Send a 404 if the controller method doesn't exist
        if (!method_exists($this->controller, $this->method)) {
            header("HTTP/1.0 404 Not Found");
            include path('/views/errors/404.tpl');
            die;
        }
    }

    /**
     * Call The Controller Method
     *
     * @return void
     */
    private function callControllerMethod()
    {
        call_user_func_array(array(
            $this->controller,
            $this->method,
        ), $this->parameters);
    }

    /**
     * Magic Getter
     *
     * @param  string  $property
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}
