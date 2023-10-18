<?php

use app\models\Queue;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Queues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="queue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Queue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'template_id',
            'text:ntext',
            'email:email',
            'send_at',
            //'sent_at',
            //'status',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'visibleButtons' => [
                    'update' => function ($model, $key, $index) {
                        return $model->sent_at === null;
                    },
                    'delete' => function ($model, $key, $index) {
                        return $model->sent_at === null;
                    }
                ],
                'urlCreator' => function ($action, Queue $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
