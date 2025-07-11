<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf544f8613ff99dc4ab4bdf9fadc070fc
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf544f8613ff99dc4ab4bdf9fadc070fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf544f8613ff99dc4ab4bdf9fadc070fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf544f8613ff99dc4ab4bdf9fadc070fc::$classMap;

        }, null, ClassLoader::class);
    }
}
