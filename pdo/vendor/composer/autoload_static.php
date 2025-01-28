<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitafb26d41d8ff00ee21494338fce25a5c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pdo\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pdo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitafb26d41d8ff00ee21494338fce25a5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitafb26d41d8ff00ee21494338fce25a5c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitafb26d41d8ff00ee21494338fce25a5c::$classMap;

        }, null, ClassLoader::class);
    }
}
