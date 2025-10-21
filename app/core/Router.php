<?php
class Router
{
    private $routes = [];
    private $currentRoute = '';

    public function addRoute($route, $controller, $method)
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch()
    {
        $uri = $this->getUri();
        $this->currentRoute = $uri;

        // Check for dynamic routes (with parameters)
        foreach ($this->routes as $route => $config) {
            // Convert route pattern to regex
            $pattern = str_replace(':language', '([a-z]+)', $route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $uri, $matches)) {
                $controllerName = $config['controller'];
                $methodName = $config['method'];

                // Require controller file
                $controllerFile = '../app/controllers/' . $controllerName . '.php';
                if (!file_exists($controllerFile)) {
                    $this->notFound();
                    return;
                }

                require_once $controllerFile;

                // Instantiate controller
                $controller = new $controllerName();

                // Pass parameters to method
                array_shift($matches); // Remove full match
                if (method_exists($controller, $methodName)) {
                    call_user_func_array([$controller, $methodName], $matches);
                    return;
                } else {
                    $this->notFound();
                    return;
                }
            }
        }

        // Check if direct route exists
        if (isset($this->routes[$uri])) {
            $controllerName = $this->routes[$uri]['controller'];
            $methodName = $this->routes[$uri]['method'];

            // Require controller file
            $controllerFile = '../app/controllers/' . $controllerName . '.php';
            if (!file_exists($controllerFile)) {
                $this->notFound();
                return;
            }

            require_once $controllerFile;

            // Instantiate controller
            $controller = new $controllerName();

            // Call method
            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }

    private function getUri()
    {
        // $uri = trim($_SERVER['REQUEST_URI'], '/');
        // $uri = parse_url($uri, PHP_URL_PATH);
        // -------------- old -----------------------------

        // Get the request URI without query string
        $uri = $_SERVER['REQUEST_URI'];

        // Remove query string
        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        // Remove leading/trailing slashes
        $uri = trim($uri, '/');

        // Remove project directory from URI if exists
        $projectDir = str_replace($_SERVER['DOCUMENT_ROOT'], '', APP_ROOT);
        $uri = str_replace($projectDir, '', $uri);
        $uri = trim($uri, '/');

        return $uri ?: 'home';
    }

    private function notFound()
    {
        http_response_code(404);

        // Check if 404 view exists
        $viewFile = '../app/views/errors/404.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo '<h1>404 - Page Not Found</h1>';
            echo '<p>The page you are looking for does not exist.</p>';
        }
        exit;
    }
}