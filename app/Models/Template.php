<?php

namespace Models;

use app\classes\core\Config;
use app\classes\util\Date;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'templates';

    /**
     * @return array
     */
    public function getNewUpdatedTemplates()
    {
        //todo join
        $templates = self::where('updated_at', '>=',
            Date::getDateAgo(Config::get('target_updated'))
        )->get();

        return $templates;
    }
}