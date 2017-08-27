<?php
namespace yuncms\notifcation;


use Yii;

/**
 * Class Module
 * @package yuncms\notifcation
 */
class Module extends \yii\base\Module
{
    /**
     * 初始化
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    /**
     * 注册语言包
     * @return void
     */
    public function registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['notifcation*'])) {
            Yii::$app->i18n->translations['notifcation*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => __DIR__ . '/messages',
            ];
        }
    }
}
