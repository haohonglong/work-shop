<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = '修改用户关联文章或视频等类型';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'user_id')->dropdownList($user_list,['prompt'=>'请选择用户']) ?>
        <?= $form->field($model, 'type')->dropDownList(yii::$app->params['relationType'],['prompt'=>'请选择类型']) ?>
        <?= $form->field($model, 'relation_id') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('添加信息', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>



