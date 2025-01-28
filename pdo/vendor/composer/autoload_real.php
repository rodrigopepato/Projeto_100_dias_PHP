<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitafb26d41d8ff00ee21494338fce25a5c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitafb26d41d8ff00ee21494338fce25a5c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitafb26d41d8ff00ee21494338fce25a5c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitafb26d41d8ff00ee21494338fce25a5c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
