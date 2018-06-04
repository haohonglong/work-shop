<?php
use \yii\helpers\Url;
$this->title = '眼睛信息';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="text-right"><a class="btn btn-primary mb-3" href="<?=Url::to(['add']);?>">添加</a></div>
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th>ID</th>
                <th>右眼度数</th>
                <th>左眼度数</th>
                <th>右眼散光</th>
                <th>左眼散光</th>
                <th>眼镜度数</th>
                <th>创建日期</th>
                <th>最近更新日期</th>
                <th>操作</th>
            </tr>
            </thead>
			<?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['num_R'] ?></td>
                    <td><?= $item['num_L'] ?></td>
                    <td><?= $item['num_RS'] ?></td>
                    <td><?= $item['num_LS'] ?></td>
                    <td><?= $item['degrees'] ?></td>
                    <td><?= $item['date'] ?></td>
                    <td><?= $item['m_date'] ?></td>
                    <td><a class="btn btn-primary auto-form-btn" href="<?=Url::to(['edit','id'=>$item['id']]);?>">编辑</a></td>

                </tr>
			<?php endforeach; ?>
        </table>
        <div class="text-center">
			<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
            <div class="text-muted"><?= count($data); ?>条数据</div>
        </div>
    </div>
</div>



