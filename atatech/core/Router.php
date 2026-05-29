<?php

class Router {
    private $routes = [];
    private $middlewares = [];

    public function get($path, $handler) {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler) {
        $this->addRoute('POST', $path, $handler);
    }

    public function put($path, $handler) {
        $this->addRoute('PUT', $path, $handler);
    }

    public function delete($path, $handler) {
        $this->addRoute('DELETE', $path, $handler);
    }

    private function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function middleware($name, $callback) {
        $this->middlewares[$name] = $callback;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Remove base path (/atatech/) from URI
        $basePath = '/atatech';
        if (strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchRoute($route['path'], $uri, $params)) {
                $handler = $route['handler'];
                
                if (is_array($handler) && isset($handler['middleware'])) {
                    foreach ($handler['middleware'] as $mw) {
                        if (isset($this->middlewares[$mw])) {
                            $this->middlewares[$mw]();
                        }
                    }
                }

                if (is_string($handler) && strpos($handler, '@') !== false) {
                    [$controller, $method] = explode('@', $handler);
                    
                    // Handle namespace (e.g., Admin\AuthController)
                    $parts = explode('\\', $controller);
                    $controllerName = end($parts);
                    
                    if (substr($controllerName, -10) !== 'Controller') {
                        $controllerClass = $controllerName . 'Controller';
                    } else {
                        $controllerClass = $controllerName;
                    }
                    
                    // Build file path
                    if (count($parts) > 1) {
                        // Has namespace
                        $namespace = implode('/', array_slice($parts, 0, -1));
                        $filePath = __DIR__ . "/../controllers/{$namespace}/{$controllerClass}.php";
                    } else {
                        $filePath = __DIR__ . "/../controllers/{$controllerClass}.php";
                    }
                    
                    require_once $filePath;
                    $controllerInstance = new $controller();
                    call_user_func_array([$controllerInstance, $method], $params);
                    return;
                }

                if (is_callable($handler)) {
                    call_user_func_array($handler, $params);
                    return;
                }
            }
        }

        // Route bulunamadı - 404
        http_response_code(404);
        $error404Path = __DIR__ . '/../views/errors/404.php';
        if (file_exists($error404Path)) {
            require_once $error404Path;
        } else {
            echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>404</title></head><body>";
            echo "<h1>404 - Sayfa Bulunamadı</h1>";
            echo "<p><a href='/atatech/'>Ana Sayfaya Dön</a></p>";
            echo "</body></html>";
        }
    }

    private function matchRoute($route, $uri, &$params) {
        $params = [];
        $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
        $routePattern = "#^{$routePattern}$#";

        if (preg_match($routePattern, $uri, $matches)) {
            array_shift($matches);
            preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $route, $paramNames);
            $params = array_combine($paramNames[1], $matches);
            return true;
        }

        return false;
    }
}
