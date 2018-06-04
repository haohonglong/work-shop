<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = '修改眼睛卡';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'day') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>



