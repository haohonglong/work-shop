<?php
use yii\helpers\Url;
$this->title = '眼睛卡片';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="text-right"><a class="btn btn-primary mb-3" href="<?=Url::to(['add']);?>">添加</a></div>
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <td>操作</td>
            </tr>
            </thead>
			<?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['title'] ?></td>
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



