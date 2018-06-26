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

<div class="panel mb-3" id="app">
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
                <td width="50px">UID</td>
                <td width="200px">申请人</td>
                <td v-if="status != 0">申请时间</td>
                <td>操作</td>
            </tr>
                <tr v-for="item in list" :data-id="item.id">
                    <td> {{ item.uid }}</td>
                    <td>{{ item.nickname }}</td>
                    <td v-if="status > 0">{{ item.create_at }}</td>
                    <td>
                        <template v-if="0 == status">
                            <a :href="'apply?userid='+item.uid" class="btn btn-secondary add-pic">申请</a>
                        </template>
                        <template v-else-if="1 == status">
                            <a :href="'check?status=3&id='+item.id" class="btn btn-secondary">通过</a>
                            <a :href="'check?status=2&id='+item.id" class="btn btn-secondary">不通过</a>
                        </template>

                        <a v-if="status != 0" href="javascript:void(0);" data-target="#pic_list_modal" v-on:click="detail(item.id)" data-toggle="modal"  class="btn btn-secondary">详情</a>
                    </td>
                </tr>
        </table>
    </div>

</div>
<!-- 审核的场景图片 Modal -->
<div class="modal fade" id="pic_list_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel">
            <div class="panel-header">
                <span>待审核图片</span>
                <a href="javascript:" class="panel-close" data-dismiss="modal">&times;</a>
            </div>
            <div class="panel-body">
                <div class="file-list">场景图片</div>
                <div v-for="item in pic_list" class="file-item text-center">
                    <img :src="item.pic_url" class="file-cover">
                </div>
                <div class="file-list">验光单图片</div>
                <div class="file-loading text-center" style="display: block">
                    <img :src="optometry">
                </div>
                <div class="text-center">
                    <a :href="'mch/cashback/check?status=3&id='+id" class="btn btn-secondary">通过</a>
                    <a :href="'mch/cashback/check?status=2&id='+id" class="btn btn-secondary">不通过</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var pic_list_modal = new Vue({
        el: "#pic_list_modal",
        data:{
            'id':'',
            'pic_list':[],
            'optometry':''
        }
    });
    var app = new Vue({
        el: "#app",
        data:{
            'list':<?=$list;?>,
            'status':'<?=$status?>'
        },
        methods:{
            detail:function (id) {
                $.ajax({
                    url: '/mch/cashback/get-pics-by-id?id='+id,
                    dataType: 'json',
                    success: function(D){
                        if(D.code){
                            pic_list_modal.id = id;
                            pic_list_modal.pic_list = D.data.pic_list;
                            pic_list_modal.optometry = D.data.optometry;
                        }
                    }
                });
            }
        }
    });
</script>
