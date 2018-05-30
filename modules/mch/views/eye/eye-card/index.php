<?php

$this->title = '眼睛卡片';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>天数</th>
                <th>状态</th>
            </tr>
            </thead>
			<?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['title'] ?></td>
                    <td><?= $item['day'] ?></td>
                    <td><?= 1 == $item['status'] ? '已选' : '未选' ?></td>
                    
                </tr>
			<?php endforeach; ?>
        </table>
        <div class="text-center">
			<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
            <div class="text-muted"><?= count($data); ?>条数据</div>
        </div>
    </div>
</div>



