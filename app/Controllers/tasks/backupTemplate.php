<?php

namespace tasks;

use app\classes\core\Config;
use app\classes\util\Date;
use app\classes\util\Dir;
use app\classes\util\File;
use Controllers\baseController;
use Models\ModuleParameter;
use Models\Site;
use Models\Template;
use Models\Theme;

class backupTemplate extends baseController
{
    const SMARTY_EXTENSION = '.tpl';

    public function __construct()
    {
    }

    public function index()
    {
        $targetModuleModel = new ModuleParameter();
        $targetModules = $targetModuleModel->getNewUpdatedModuleParameter();
        foreach ($targetModules as $key => $val) {
            $this->saveModule(
                $val->expression,
                $val->module->name . '_PC',
                Site::getSiteNameById($val->module->site_id)
            );
        }
        exit();

        $backupTemplateModel = new Template();

        //todo Templateをgetして
        //モジュールパラメータ todo
        $targetTemplates = $backupTemplateModel->getNewUpdatedTemplates();

        foreach ($targetTemplates as $template) {
            $this->save($template['pc_body'], $template['template_name'] . '_PC');
            $this->save($template['sp_body'], $template['template_name'] . '_SP');
        }

        //todo モジュール
        $targetTemplates = $backupTemplateModel->getNewUpdatedTheme();

        $templateModel = new Theme();
        $themes = $templateModel->getNewUpdatedTheme();
        foreach ($themes as $template) {
            $this->save($template['pc_body'], $template['name'] . '_PC');
            $this->save($template['sp_body'], $template['name'] . '_SP');
        }

        //


        //保存期間を超えたものに関しては削除する
        if (Dir::isExist(Date::getDateAgo(Config::get('storePeriod')))) {
            Dir::removeDir(
                Config::get('backupsDirTemplate') . '/' . Date::getDateAgo('storePeriod')
            );
        }
    }

    /**
     * @param $contents
     * @param $dir
     * @param $fileName
     * @return bool
     */
    private function save($contents, $dir, $fileName)
    {
        return File::outputToFile(
            $contents,
            $dir,
            $fileName . self::SMARTY_EXTENSION
        );
    }

    /**
     * @param $contents
     * @param $moduleName
     * @param $site
     */
    private function saveModule($contents, $moduleName, $site)
    {
        $moduleDir = "module";
        $this->save($contents, $moduleDir, $moduleName);
    }

    /**
     * @param $contents
     * @param $moduleName
     * @param $site
     */
    private function saveTemplate($contents, $moduleName, $site)
    {

        $this->save($contents, $moduleDir, $moduleName);
        Config::get('backupsDirTemplate') . Date::getToday();

    }

    /**
     * @param $contents
     * @param $moduleName
     * @param $site
     */
    private function saveTheme($contents, $moduleName, $site)
    {

    }

}