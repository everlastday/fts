<?php

namespace common\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;

class CustomMenu extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        return $this->render('test', [
            'message' => Html::encode($this->message),
        ]);

    }
}