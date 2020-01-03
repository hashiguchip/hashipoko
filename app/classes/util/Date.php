<?php

namespace app\classes\util;

class Date
{
    /**
     * 何日前かの日付を$formatして返す
     *
     * @param $ago
     * @param $format
     * @return false|string
     */
    public static function getDateAgo($ago, $format = 'Y-m-d')
    {
        return date($format, strtotime("- " . $ago));
    }

    public static function getToday($format = 'Y-m-d')
    {
        return date($format);
    }
}