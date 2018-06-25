<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/6/19
 * Time: 16:52
 * @var \yii\web\View $this
 */
$urlManager = Yii::$app->urlManager;
$this->title = '政府返现';
$this->params['active_nav_group'] = 1;
?>

<div class="panel mb-3">
    <div class="panel-header">
        <span><?= $this->title ?></span>
    </div>
    <div class="panel-body">
        <div class="mb-4">
            <ul class="nav nav-tabs status">
                <li class="nav-item">
                    <a class="status-item nav-link <?= 0 == $status ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/cashback/index','status'=>0]) ?>">未审核</a>
                </li>
                <li class="nav-item">
                    <a class="status-item nav-link <?= 1 == $status ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/cashback/index','status'=>1]) ?>">审核中</a>
                </li>
                <li class="nav-item">
                    <a class="status-item nav-link <?= 2 == $status ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/cashback/index','status'=>2]) ?>">审核失败</a>
                </li>
                <li class="nav-item">
                    <a class="status-item nav-link <?= 3 == $status ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/cashback/index','status'=>3]) ?>">已审核</a>
                </li>
                <li class="nav-item">
                    <a class="status-item nav-link <?= 4 == $status ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/cashback/index','status'=>4]) ?>">已经返现</a>
                </li>


            </ul>
        </div>
        <table class="table table-bordered bg-white">
            <tr>
                <td width="50px">ID</td>
                <td width="200px">申请人</td>
                <?php if($status != 0):?>
                <td>申请时间</td>
                <?php endif;?>
                <td>操作</td>
            </tr>
            <?php foreach ($list as $index => $value): ?>
                <tr>
                    <td><?= $value['uid'] ?></td>
                    <td><?= $value['nickname'] ?></td>
                    <?php if($status != 0):?>
                    <td><?= $value['create_at'] ?></td>
                    <?php endif;?>
                    <td>
                        <?php if(0 == $status):?>
                        <a href="<?= $urlManager->createUrl(['mch/cashback/apply','userid'=>$value['uid']]) ?>" class="btn btn-secondary add-pic">申请</a>
                       <?php endif;?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
