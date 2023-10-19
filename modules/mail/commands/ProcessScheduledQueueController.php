<?php

namespace app\modules\mail\commands;

use app\modules\mail\models\Queue;
use app\modules\mail\services\QueueService;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class ProcessScheduledQueueController extends Controller
{
    public QueueService $queueService;

    public function __construct($id, $module, $config = [], QueueService $queueService)
    {
        parent::__construct($id, $module, $config);
        $this->queueService = $queueService;
    }

    public function actionIndex()
    {
        $queues = Queue::find()
            ->where(['status' => Queue::STATUS_CREATED])
            ->andWhere(['<=', 'send_at', time()])
            ->all();

        /** @var Queue $queue */
        foreach ($queues as $queue) {
            $this->queueService->send($queue);

            echo 'Queue ' . $queue->id . ' is sent!' . PHP_EOL;
        }

        echo 'Done!' . PHP_EOL;

        return ExitCode::OK;
    }
}
