<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6571484e6d06151f70b8cefde3d60b51
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6571484e6d06151f70b8cefde3d60b51::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6571484e6d06151f70b8cefde3d60b51::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6571484e6d06151f70b8cefde3d60b51::$classMap;

        }, null, ClassLoader::class);
    }
}
