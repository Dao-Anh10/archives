<?php

namespace Kernel;

class Core
{
    public static $app;

    public $module;

    public $controller;

    public $action;

    public $config;

    public $baseUrl;

    public $staticUrl;

    public function __construct($config)
    {
        $routers = explode('/', trim($_SERVER['SCRIPT_NAME'], '\\/'));

        $blacklistModule = ['kernel', 'model'];

        $module = 'frontend';

        $controller = 'Index';

        $action = 'index';

        if (isset($routers[0]) && is_dir($routers[0]) && !in_array($routers[0], $blacklistModule)) {
            $module = $routers[0];

            array_shift($routers);
        }

        $controllerClass = '\\' . ucfirst($module) . '\\Controller\\Index';

        if (isset($routers[0])) {
            $controller = str_replace('-', '', ucwords($routers[0], '-'));

            if (file_exists($module . '/controller/' . $controller . '.php')) {
                $controllerClass = '\\' . ucfirst($module) . '\\Controller\\' . $controller;

                array_shift($routers);
            }
        }

        if (isset($routers[0])) {
            $action = str_replace('-', '', $routers[0]);

            if (method_exists($controllerClass, $action)) {
                array_shift($routers);
            } else {
                $action = 'index';
            }
        }

        $this->module = $module;
        $this->controller = $controller;
        $this->action = $action;
        $this->config = $config;

        $this->baseUrl = $this->getBaseUrl();

        $this->staticUrl = $this->baseUrl . '/public';

        self::$app = $this;

        $controllerInstance = new $controllerClass;

        $controllerInstance->init();

        $controllerInstance->$action($routers);
    }

    public function isHttps()
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on';
    }

    public function getBaseUrl()
    {
        return rtrim(($this->isHttps() ? 'https' : 'http') . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''), '/\\');
    }
}
