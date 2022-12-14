<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcebf8e294ac4d857b4839e444b3ffb32
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BTCPayServer\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BTCPayServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/btcpayserver/btcpayserver-greenfield-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcebf8e294ac4d857b4839e444b3ffb32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcebf8e294ac4d857b4839e444b3ffb32::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcebf8e294ac4d857b4839e444b3ffb32::$classMap;

        }, null, ClassLoader::class);
    }
}
