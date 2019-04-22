<?php

namespace Namecho\Autoloader;

class ClassLoader
{
    private function findFile($class)
    {
        $class = \explode('\\', $class);
        if ($class[0] === 'Namecho') {
            $class[0] = 'system';
            return BASE_DIR . implode('/', $class) . '.php';
        }
        if ($class[0] === 'App') {
            $class[0] = 'app';
            return BASE_DIR . implode('/', $class) . '.php';
        }
    }

    public function loadClass($class)
    {
        $file = $this->findFile($class);
        if (\file_exists($file)) {
            \includeFile($file);
            return true;
        }
        return false;
    }

    public function register()
    {
        \spl_autoload_register([$this, 'loadClass'], true, true);
    }
}
