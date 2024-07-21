<?php
class Router
{
	private $routes;

	public function __construct()
	{
		$routes_path = ROOT . '/config/routes.php';
		$this->routes = include($routes_path);
	}
	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI']))
		{
			$request = $_SERVER['REQUEST_URI'];

			if(preg_match('#/id-article/([0-9]+)#', $request))
			{
				return trim($request, '/');
			}
			else
			{
				switch ($request) 
				{
					case '':
					case '/':
					case '/news':
						$request = '/news';
						return trim($request, '/');
						break;
					case '/register':
					case '/login':
					case '/logout':
						return trim($request, '/');
						break;
					default:
						$request = "/error404";
						return trim($request, '/');
						break;
				}
			}
		}
	}
	public function run()
	{
		$uri = $this->getURI();

		foreach ($this->routes as $uri_pattern => $path) 
		{
			if(preg_match("~$uri_pattern~", $uri))
			{
				$internalRoute = preg_replace("~$uri_pattern~", $path, $uri);
				
				$segments = explode('/', $internalRoute);
				
				$controller_name = array_shift($segments) . "Controller";
				$controller_name = ucfirst($controller_name);

				$action_name = "action" . ucfirst(array_shift($segments));
				$parameters = $segments;

				$controller_file = ROOT . '/controllers/' . $controller_name . '.php';

				if(file_exists($controller_file))
				{
					include_once ($controller_file);
				}

				$controller_object = new $controller_name();
				$result = call_user_func_array(array($controller_object, $action_name), $parameters);

				exit;
			}
		}
		
	}
}
?>