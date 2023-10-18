<?php

namespace app\modules\mail;

use yii\base\BootstrapInterface;
use yii\console\Application;

/**
 * mail module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\mail\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Controller namespace override for console application.
     *
     * @param $app
     * @return void
     */
    public function bootstrap($app)
    {
        if ($app instanceof Application) {
            $this->controllerNamespace = 'app\modules\mail\commands';
        }
    }
}
