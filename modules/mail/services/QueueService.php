<?php

namespace app\modules\mail\services;

use app\modules\mail\models\Queue;
use Yii;

class QueueService
{
    public function send(Queue $queue)
    {
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
    }
}