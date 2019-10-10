<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita76c2ea3f94acbd3667ea8fda6dbed58
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita76c2ea3f94acbd3667ea8fda6dbed58::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita76c2ea3f94acbd3667ea8fda6dbed58::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInita76c2ea3f94acbd3667ea8fda6dbed58::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}