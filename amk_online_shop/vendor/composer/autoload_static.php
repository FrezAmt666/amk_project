<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5c71d07bf840d1e013a9bae50bf28e13
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'H' => 
        array (
            'Helpers\\' => 8,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
        'A' => 
        array (
            'App\\AmkOnlineShop\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Helpers',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
        'App\\AmkOnlineShop\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Libs',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5c71d07bf840d1e013a9bae50bf28e13::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5c71d07bf840d1e013a9bae50bf28e13::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5c71d07bf840d1e013a9bae50bf28e13::$classMap;

        }, null, ClassLoader::class);
    }
}