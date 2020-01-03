<?php
/**
 * Created by PhpStorm.
 * User: hashiguchip
 * Date: 2018/12/20
 * Time: 14:28
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    /**
     * @param $id
     * @return bool|string
     */
    public static function getSiteNameById($id)
    {
        $tmp = self::find($id);
        if (empty($tmp)) return false;
        return $tmp->name;
    }
}