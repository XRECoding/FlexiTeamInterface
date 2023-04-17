<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                fontSize: 22,
                text: "Zeitübersicht <?php echo $statisticsHeader ?>"
            },
            axisY: {
                title: "Zeit in Stunden",
                includeZero: true,
                prefix: "",
                suffix:  "h"
            },
            data: [{
                type: "bar",
                yValueFormatString: "",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>