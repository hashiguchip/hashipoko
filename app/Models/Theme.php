<?php

namespace Models;

use app\classes\core\Config;
use app\classes\util\Date;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'themes';

    /**
     * @return array
     */
    public function getNewUpdatedTheme()
    {
        $templates = self::where('updated_at', '>=',
            Date::getDateAgo(Config::get('target_updated'))
        )->get();

        return $templates;
    }

}