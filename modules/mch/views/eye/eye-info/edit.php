<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = '添加眼睛信息';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'num_R') ?>
        <?= $form->field($model, 'num_L') ?>
        <?= $form->field($model, 'num_RS') ?>
        <?= $form->field($model, 'num_LS') ?>
        <?= $form->field($model, 'degrees') ?>
        <?= $form->field($model, 'advice')->textarea() ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('修改信息', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>



