<?php

namespace app\modules\administrator;

use Yii;
use yii\helpers\Url;


/**
 * administrator module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\administrator\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
	    Yii::$app->user->loginUrl =  Yii::getAlias('@web/administrator/cp/login');
        // custom initialization code goes here
    }
}
