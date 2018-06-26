<?php
use \yii\helpers\Url;
$this->title = '眼睛信息';
?>

<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="text-right"><a class="btn btn-primary mb-3" href="<?=Url::to(['edit']);?>">添加</a></div>
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th>ID</th>
                <th>镜眼距,单位mm</th>
                <th>左球面镜</th>
                <th>右球面镜</th>
                <th>左圆柱镜</th>
                <th>右圆柱镜</th>
                <th>左瞳距,单位mm</th>
                <th>右瞳距,单位mm</th>
                <th>左裸眼视力</th>
                <th>右裸眼视力</th>
                <th>左矫正视力</th>
                <th>右矫正视力</th>
                <th>左眼轴向</th>
                <th>右眼轴向</th>
                <th>左眼镜的度数</th>
                <th>右眼镜的度数</th>
                <th>备注</th>
                <th>创建日期</th>
                <th>更新日期</th>
                <th>操作</th>
            </tr>
            </thead>
			<?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['VD'] ?></td>
                    <td><?= $item['DSL'] ?></td>
                    <td><?= $item['DSR'] ?></td>
                    <td><?= $item['DCL'] ?></td>
                    <td><?= $item['DCR'] ?></td>
                    <td><?= $item['PDL'] ?></td>
                    <td><?= $item['PDR'] ?></td>
                    <td><?= $item['VAL'] ?></td>
                    <td><?= $item['VAR'] ?></td>
                    <td><?= $item['CVAL'] ?></td>
                    <td><?= $item['CVAR'] ?></td>
                    <td><?= $item['AL'] ?></td>
                    <td><?= $item['AR'] ?></td>
                    <td><?= $item['DL'] ?></td>
                    <td><?= $item['DR'] ?></td>
                    <td><?= $item['remak'] ?></td>
                    <td><?= $item['create_at'] ?></td>
                    <td><?= $item['modify_at'] ?></td>
                    <td><a class="btn btn-primary auto-form-btn" href="<?=Url::to(['edit','id'=>$item['id']]);?>">编辑</a></td>

                </tr>
			<?php endforeach; ?>
        </table>
        <div class="text-center">
			<?= \yii\widgets\LinkPager::widget([
			        'pagination' => $pagination,
			        'firstPageLabel' => '首页',
			        'lastPageLabel' => '尾页',
            ]) ?>
            <div class="text-muted"><?= count($data); ?>条数据</div>
        </div>
    </div>
</div>



