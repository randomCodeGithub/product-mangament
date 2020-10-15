<?php
class Router
{
    private $routes;

    public function __construct()
    {
        // include routes array
        $routesPath = './config/routes.php';
        $this->routes = include($routesPath);
    }

    public function getURI()
    {
        //check if uri is not empty 
        if (!empty($_SERVER['REQUEST_URI'])) {
            $getUri = $_SERVER['REQUEST_URI'];

            //delete project name folder.
            $deleteProjectUrl = str_replace(HOME_ROOT, '', $getUri);

            return trim($deleteProjectUrl, '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();
        $result = null;

        //All existing  routes cycle 
        foreach ($this->routes as $uriPattern => $path) {

            //compare existing uri with user request
            if (preg_match("~^$uriPattern$~", $uri)) {

                //replace user request uri
                $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);

                //make array from $internalRoute
                $segments = explode('/', $internalRoute);

                //Get controller class name,by extracting first value $segments 
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                //controller function name
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                //full controller file name
                $controllerFile = './controllers/' . $controllerName . '.php';

                //check, if file exist
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                //return 1 or 0;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
        //if uri not match with existing routes, redirect user to the home page
        if ($result == null) {
            header('Location:' . HOME_ROOT);
        }
    }
}
