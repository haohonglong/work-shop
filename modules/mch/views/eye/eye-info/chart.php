<?php
use \yii\helpers\Url;
$this->title = '眼睛信息图表';

?>


<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="text-right"><a class="btn btn-primary mb-3" href="<?=Url::to(['add']);?>">添加</a></div>
        <div class="p-4 bg-shaixuan">
            <div flex="dir:left">
                <div class="mr-4">
                    <div class="form-group row">
                        <div>
                            <div class="input-group">
                                <input id="date" placeholder="" name="keyword" autocomplete="off" value="" class="form-control">
                                <span id="search" class="input-group-btn"><button class="btn btn-primary">查看</button></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="main" style="height:400px"></div>
    </div>
</div>
<script src="/statics/echarts/echarts-all.js"></script>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts图表
    var myChart;
    jQuery(function($){


        var option = {
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['左眼度数','右眼度数']
            },

            calculable : true,
            dataZoom : {
                show : true,
                realtime : true,
                start : 20,
                end : 80
            },
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data : []
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    data:[333,42342,341341]
                }
            ],
            series : [
                {
                    name:'左眼度数',
                    type:'line',
                    data:[]
                },
                {
                    name:'右眼度数',
                    type:'line',
                    data:[]
                }
            ]
        };


        function getData(obj){
            myChart = echarts.init(document.getElementById('main'));
            obj = obj || {};
            console.log(obj);
            $.getJSON("<?=Url::to(['/api/eye/eye-info/count']);?>",obj,function(D){
                if(1 == D.code){
                    option.series[0].data = D['data']['degrees']['num_L'];
                    option.series[1].data = D['data']['degrees']['num_R'];
                    option.xAxis[0].data = option.series[0].data;
                    myChart.setOption(option);
                }
            });
        }

        $(document).on('click','#search',function(){
            var date = $(this).closest('.input-group').find('input').val();
            if(date.length > 8){
                getData({
                    'date':date
                });
            }

        });
        getData();

        $(window).resize(function () {
            myChart.resize();
        });
    });

    //日期控件
    (function ($) {
        $.datetimepicker.setLocale('zh');
        $('#date').datetimepicker({
            datepicker: true,
            timepicker: false,
            format: 'Y-m-d',
            dayOfWeekStart: 1,
            scrollMonth: false,
            scrollTime: false,
            scrollInput: false
        });

    })(jQuery);



</script>


