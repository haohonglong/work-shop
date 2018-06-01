<?php
use \yii\helpers\Url;
$this->title = '眼睛信息图表';

?>


<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="text-right"><a class="btn btn-primary mb-3" href="/mch/eye/eye-info/add">添加</a></div>
        <div id="main" style="height:400px"></div>


    </div>
</div>
<script src="/statics/echarts/echarts-all.js"></script>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts图表
    jQuery(function(){
        var myChart = echarts.init(document.getElementById('main'));

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
                    type : 'value'
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


        function getData(){
            $.getJSON("<?=Url::to(['/api/eye/eye-info/count',['date'=>'2018-06-01']]);?>",function(D){
                if(1 == D.code){
                    option.series[0].data = D['data']['degrees']['num_L'];
                    option.series[1].data = D['data']['degrees']['num_R'];
                    option.xAxis[0].data = option.series[0].data;
                    myChart.setOption(option);
                }
            });
        }
        getData();
    });



</script>


