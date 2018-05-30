<?php

$this->title = '眼睛信息';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th>ID</th>
                <th>右眼度数</th>
                <th>左眼度数</th>
                <th>右眼散光度数</th>
                <th>左眼散光度数</th>
                <th>医生建议</th>
                <th>日期</th>
            </tr>
            </thead>
			<?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['num_R'] ?></td>
                    <td><?= $item['num_L'] ?></td>
                    <td><?= $item['num_RS'] ?></td>
                    <td><?= $item['num_LS'] ?></td>
                    <td><?= $item['advice'] ?></td>
                    <td><?= $item['date'] ?></td>
                    
                </tr>
			<?php endforeach; ?>
        </table>
        <div class="text-center">
			<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
            <div class="text-muted"><?= count($data); ?>条数据</div>
        </div>
    </div>
</div>



