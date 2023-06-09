<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcac430917c25abc5ae38432b8babe806
{
    public static $files = array (
        '841780ea2e1d6545ea3a253239d59c05' => __DIR__ . '/..' . '/qiniu/php-sdk/src/Qiniu/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workerman\\' => 10,
            'Wechat\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Component\\OptionsResolver\\' => 34,
        ),
        'Q' => 
        array (
            'Qiniu\\' => 6,
        ),
        'P' => 
        array (
            'Pay\\' => 4,
        ),
        'O' => 
        array (
            'Overtrue\\Pinyin\\' => 16,
            'OSS\\' => 4,
        ),
        'G' => 
        array (
            'GatewayWorker\\' => 14,
            'GatewayClient\\' => 14,
        ),
        'F' => 
        array (
            'Flc\\Dysms\\' => 10,
            'Flc\\Alidayu\\' => 12,
        ),
        'E' => 
        array (
            'Endroid\\QrCode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workerman\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/workerman',
            1 => __DIR__ . '/..' . '/workerman/workerman-for-win',
        ),
        'Wechat\\' => 
        array (
            0 => __DIR__ . '/..' . '/zoujingli/wechat-php-sdk/Wechat',
        ),
        'Symfony\\Component\\OptionsResolver\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/options-resolver',
        ),
        'Qiniu\\' => 
        array (
            0 => __DIR__ . '/..' . '/qiniu/php-sdk/src/Qiniu',
        ),
        'Pay\\' => 
        array (
            0 => __DIR__ . '/..' . '/zoujingli/pay-php-sdk/src',
        ),
        'Overtrue\\Pinyin\\' => 
        array (
            0 => __DIR__ . '/..' . '/overtrue/pinyin/src',
        ),
        'OSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/aliyuncs/oss-sdk-php/src/OSS',
        ),
        'GatewayWorker\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/gateway-worker/src',
            1 => __DIR__ . '/..' . '/workerman/gateway-worker-for-win/src',
        ),
        'GatewayClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/gatewayclient',
        ),
        'Flc\\Dysms\\' => 
        array (
            0 => __DIR__ . '/..' . '/flc/dysms/src',
        ),
        'Flc\\Alidayu\\' => 
        array (
            0 => __DIR__ . '/..' . '/flc/alidayu/src/Alidayu',
        ),
        'Endroid\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/endroid/qrcode/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcac430917c25abc5ae38432b8babe806::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcac430917c25abc5ae38432b8babe806::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitcac430917c25abc5ae38432b8babe806::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitcac430917c25abc5ae38432b8babe806::$classMap;

        }, null, ClassLoader::class);
    }
}
