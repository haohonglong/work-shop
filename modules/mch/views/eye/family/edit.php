<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = '修改家庭';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'name') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>



