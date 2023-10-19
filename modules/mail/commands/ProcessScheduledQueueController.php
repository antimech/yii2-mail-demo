<?php

namespace app\modules\mail\commands;

use app\modules\mail\models\Queue;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class ProcessScheduledQueueController extends Controller
{
    public function actionIndex()
    {
        $queues = Queue::find()
            ->where(['status' => Queue::STATUS_CREATED])
            ->andWhere(['<=', 'send_at', time()])
            ->all();

        /** @var Queue $queue */
        foreach ($queues as $queue) {
            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['senderEmail'])
                ->setTo($queue->email)
                ->setTextBody($queue->text)
                ->send();

            $queue->load([
                'Queue' => [
                    'sent_at' => time(),
                    'status' => Queue::STATUS_SENT
                ]
            ]);
            $queue->save();

            echo 'Queue ' . $queue->id . ' is sent!' . PHP_EOL;
        }

        echo 'Done!' . PHP_EOL;

        return ExitCode::OK;
    }
}
