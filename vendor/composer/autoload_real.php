<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit329e7d50a5b444d74ee800b2610d011c
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

        spl_autoload_register(array('ComposerAutoloaderInit329e7d50a5b444d74ee800b2610d011c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit329e7d50a5b444d74ee800b2610d011c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit329e7d50a5b444d74ee800b2610d011c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
