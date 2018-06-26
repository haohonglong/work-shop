<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/6/19
 * Time: 16:52
 * @var \yii\web\View $this
 */
$urlManager = Yii::$app->urlManager;
$this->title = '申请政府返现';
$this->params['active_nav_group'] = 1;
?>

<div class="panel mb-3" id="app">
    <div class="panel-header">
        <span><?= $this->title ?></span>
    </div>
    <div class="panel-body">
        <form class="auto-form" method="post" return="<?= $urlManager->createUrl(['mch/cashback/apply','userid'=>$userid]) ?>">
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                    <label class="col-form-label">场景图片图片</label>
                </div>
                <div class="col-sm-8">
                    <div class="row mb-3" v-for="(item,i) in pic_list">
                        <div class="col-sm-5">

                            <div class="upload-group">
                                <div class="input-group">
                                    <input class="form-control file-input"
                                           v-bind:index="i"
                                           v-bind:name="'pic_list['+i+'][pic_url]'"
                                           v-model="item.pic_url">
                                    <span class="input-group-btn">
                                        <a class="btn btn-secondary upload-file" href="javascript:"
                                           data-toggle="tooltip"
                                           data-placement="bottom" title="上传文件">
                                            <span class="iconfont icon-cloudupload"></span>
                                        </a>
                                    </span>
                                    <span class="input-group-btn">
                                        <a class="btn btn-secondary delete-file" href="javascript:"
                                           data-toggle="tooltip"
                                           data-placement="bottom" title="删除文件">
                                            <span class="iconfont icon-close"></span>
                                        </a>
                                    </span>
                                </div>
                                <div class="upload-preview text-center upload-preview">
                                    <span class="upload-preview-tip">大小参考示例</span>
                                    <img class="upload-preview-img" v-bind:src="item.pic_url">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-2 text-right">
                            <a class="btn btn-danger pic-delete" v-bind:data-index="i" href="javascript:">删除</a>
                        </div>
                    </div>
                    <a class="btn btn-secondary add-pic" href="javascript:">添加</a>
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                    <label class="col-form-label">验光单图片</label>
                </div>
                <div class="col-sm-8">
                    <div class="row mb-3">
                        <div class="col-sm-5">

                            <div class="upload-group">
                                <div class="input-group">
                                    <input class="form-control file-input"
                                           v-bind:index="'pic_optometry'"
                                           v-bind:name="'pic_optometry'"
                                           v-model="pic_optometry.pic_url">
                                    <span class="input-group-btn">
                                        <a class="btn btn-secondary upload-file" href="javascript:"
                                           data-toggle="tooltip"
                                           data-placement="bottom" title="上传文件">
                                            <span class="iconfont icon-cloudupload"></span>
                                        </a>
                                    </span>
                                    <span class="input-group-btn">
                                        <a class="btn btn-secondary delete-file" href="javascript:"
                                           data-toggle="tooltip"
                                           data-placement="bottom" title="删除文件">
                                            <span class="iconfont icon-close"></span>
                                        </a>
                                    </span>
                                </div>
                                <div class="upload-preview text-center upload-preview">
                                    <span class="upload-preview-tip">大小参考示例</span>
                                    <img class="upload-preview-img" v-bind:src="pic_optometry.pic_url">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group row">
                <div class="form-group-label col-sm-2 text-right">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary auto-form-btn" href="javascript:">保存</a>
                </div>
            </div>
        </form>
    </div>
</div>


<script>


    var upload_url = "<?=$urlManager->createUrl(['upload/image'])?>";
    var app = new Vue({
        el: "#app",
        data: {
            pic_list: [{
                'pic_url':'',
                'url':''
            }],
            pic_optometry:{
                'pic_url':'',
                'url':''
            }
        }
    });

    $(document).on("click", ".pic-delete", function () {
        var i = $(this).attr("data-index");
        app.pic_list.splice(i, 1);
    });

    $(document).on("click", ".add-pic", function () {
        app.pic_list.push({
            pic_url: '',
            url: '',
        });
        setTimeout(function () {
            setPlUpload();
        }, 100);
    });

    $(document).on('change', '.file-input', function () {
        var index = $(this).attr('index');
        if('pic_optometry' == index){
            app.pic_optometry.pic_url = $(this).val();
        }else{
            app.pic_list[index].pic_url = $(this).val();
        }
    });

    $(document).on("change", ".link-input", function () {
        var index = $(this).attr("index");
        app.pic_list[index].url = $(this).val();
    });

    $(document).on("change", ".link-open-type", function () {
        var index = $(this).attr("index");
        app.pic_list[index].open_type = $(this).val();
    });

    function setPlUpload() {
        $(".pic-upload").plupload({
            url: upload_url,
            beforeUpload: function ($this, _this) {
                console.log($this);
                $($this).btnLoading("Loading");
            },
            success: function (res, _this, $this) {
                $($this).btnReset().text("上传");
                if (res.code == 0) {
                    var i = $(_this).attr("data-index");
                    app.pic_list[i].pic_url = res.data.url;
                }
            }
        });
    }

    setTimeout(function () {
        setPlUpload();
    }, 1);


</script>