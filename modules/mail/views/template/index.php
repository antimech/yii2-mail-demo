<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var yii\web\View $this */
/* @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Template', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'text:ntext',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
