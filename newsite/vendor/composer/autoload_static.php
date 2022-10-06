<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d80f78fdab63b0ae82cdd15519d17ee
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3d80f78fdab63b0ae82cdd15519d17ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3d80f78fdab63b0ae82cdd15519d17ee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3d80f78fdab63b0ae82cdd15519d17ee::$classMap;

        }, null, ClassLoader::class);
    }
}
