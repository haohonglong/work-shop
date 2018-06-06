<?php
use \yii\helpers\Url;
$this->title = '世界卫生组织眼镜度数及人口的数据';

?>


<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div id="main" style="height:400px"></div>
    </div>
</div>
<script src="/statics/echarts/echarts-all.js"></script>

<script type="text/javascript">

    var myChart;
    jQuery(function($){
        var option = {
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['眼镜度数','人口数']
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
                    data:[]
                }
            ],
            series : [
                {
                    name:'眼镜度数',
                    type:'line',
                    data:[]
                },
                {
                    name:'人口数',
                    type:'line',
                    data:[]
                }
            ]
        };


        function getData(){
            myChart = echarts.init(document.getElementById('main'));
            $.getJSON("<?=Url::to(['/api/eye/eye-info/world-count']);?>",function(D){
                if(1 == D.code){
                    option.series[0].data = D['data']['degrees'];
                    option.series[1].data = D['data']['population'];
                    option.xAxis[0].data = option.series[0].data;
                    option.yAxis[0].data = option.series[1].data;
                    myChart.setOption(option);
                }
            });
        }


        getData();

        $(window).resize(function () {
            myChart.resize();
        });
    });





</script>


