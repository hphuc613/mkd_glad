<?php

namespace Modules\Setting\Models;

/**
 * Class Website
 * @package Modules\Setting\Model
 */
class Website extends Setting
{

    const LOGO = 'LOGO';
    const LOGO_NORMAL = 'LOGO_NORMAL';
    const BACKGROUND = 'BACKGROUND';
    const FAVICON = 'FAVICON';
    const PHONE_NUMBER = 'PHONE_NUMBER';
    const EMAIL = 'EMAIL';

    const WEBSITE_CONFIG = [
        self::LOGO,
        self::LOGO_NORMAL,
        self::BACKGROUND,
        self::FAVICON,
        self::PHONE_NUMBER,
        self::EMAIL
    ];

    /**
     * @return array
     */
    public static function getWebsiteConfig()
    {
        $web_config = [];
        foreach (self::WEBSITE_CONFIG as $item) {
            $web_config[$item] = self::getValueByKey($item);
        }

        return $web_config;
    }
}
