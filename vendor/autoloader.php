<?php

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {
        $parts = preg_split('#\\\#', $class);
        $class_name = array_pop($parts);

        $path = implode(DS, $parts);
        $file = $class_name.'.php';

        $filepath = ROOT.strtolower($path).DS.$file;

        require $filepath;
    }
}