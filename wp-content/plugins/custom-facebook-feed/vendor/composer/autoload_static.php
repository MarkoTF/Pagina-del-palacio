<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb685de336030b19caf83b6afa44bd681
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CustomFacebookFeed\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CustomFacebookFeed\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb685de336030b19caf83b6afa44bd681::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb685de336030b19caf83b6afa44bd681::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
