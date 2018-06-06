<?php
use \yii\helpers\Url;
$this->title = '用户关联文章或视频等类型';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="text-right"><a class="btn btn-primary mb-3" href="<?=Url::to(['add']);?>">添加</a></div>
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th>ID</th>
                <th>类型</th>
                <th>关联id</th>
                <th>用户id</th>
                <th>操作</th>
            </tr>
            </thead>
			<?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= yii::$app->params['relationType'][$item['type']] ?></td>
                    <td><?= $item['relation_id'] ?></td>
                    <td><?= $item['nickname'] ?></td>
                    <td>
                        <a class="btn btn-primary auto-form-btn" href="<?=Url::to(['edit','id'=>$item['id']]);?>">编辑</a>
                        <a class="btn btn-primary auto-form-btn" href="<?=Url::to(['del','id'=>$item['id']]);?>">删除</a>
                    </td>

                </tr>
			<?php endforeach; ?>
        </table>
        <div class="text-center">
			<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
            <div class="text-muted"><?= count($data); ?>条数据</div>
        </div>
    </div>
</div>



