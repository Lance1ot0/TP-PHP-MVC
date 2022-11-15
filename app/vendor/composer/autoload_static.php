<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0997371786d40f96cbc5a02e6a80e345
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rocca\\App\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rocca\\App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0997371786d40f96cbc5a02e6a80e345::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0997371786d40f96cbc5a02e6a80e345::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0997371786d40f96cbc5a02e6a80e345::$classMap;

        }, null, ClassLoader::class);
    }
}
