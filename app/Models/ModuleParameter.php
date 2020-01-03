<?php

namespace Models;

use app\classes\core\Config;
use app\classes\util\Date;
use Illuminate\Database\Eloquent\Model;

class ModuleParameter extends Model
{
    protected $table = 'module_parameters';

    /**
     * @return array
     */
    public function getNewUpdatedModuleParameter()
    {
        //todo join
        $moduleParameter = self::where('updated_at', '>=',
            Date::getDateAgo(Config::get('target_updated'))
        )->get();

        return $moduleParameter;
    }

    /**
     * リレーションの設定
     */
    public function module()
    {
        return $this->belongsTo('Models\Module');
    }

}