<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = '添加人员卡包信息';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'type')->dropdownList(yii::$app->params['personCardType'],['prompt'=>'请选择卡类型']) ?>
        <?= $form->field($model, 'tip')->textarea() ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>



