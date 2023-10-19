<?php

use app\modules\mail\models\Template;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\mail\models\Queue $model */
/** @var yii\widgets\ActiveForm $form */

$templates = ArrayHelper::map(Template::find()->all(), 'id', 'text');
?>

<div class="queue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'template_id')->dropDownList($templates, ['prompt' => '']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    const templateId = document.getElementById('queue-template_id');
    const queueText = document.getElementById('queue-text');

    templateId.onchange = () => {
        queueText.value = templateId.options[templateId.selectedIndex].text;
    };
</script>
