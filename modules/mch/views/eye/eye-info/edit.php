<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = '验光单';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'user_id')->dropdownList($user_list,['prompt'=>'请选择用户']) ?>
        <?= $form->field($model, 'VD') ?>
        <?= $form->field($model, 'DSL') ?>
        <?= $form->field($model, 'DSR') ?>
        <?= $form->field($model, 'DCL') ?>
        <?= $form->field($model, 'DCR') ?>
        <?= $form->field($model, 'PDL') ?>
        <?= $form->field($model, 'PDR') ?>
        <?= $form->field($model, 'VAL') ?>
        <?= $form->field($model, 'VAR') ?>
        <?= $form->field($model, 'CVAL') ?>
        <?= $form->field($model, 'CVAR') ?>
        <?= $form->field($model, 'AL') ?>
        <?= $form->field($model, 'AR') ?>
        <?= $form->field($model, 'DL') ?>
        <?= $form->field($model, 'DR') ?>
        <?= $form->field($model, 'remak')->textarea() ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>



