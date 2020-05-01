<script>
    var ctx = document.getElementById('myChartMobile');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['{!!$firstReport->getFormattedReportDate()!!}', '{!!$midwayReport->getFormattedReportDate()!!}', '{!!$lastReport->getFormattedReportDate()!!}'],
            datasets: [
                {
                    label: 'Descartados',
                    fill: false,
                    data: [{!!$firstReport->discarded!!}, {!!$midwayReport->discarded!!}, {!!$lastReport->discarded!!}],
                    borderWidth: 2,
                    borderColor: '#38c172',
                    backgroundColor: '#38c172',
                },
                {
                    label: 'Confirmados',
                    fill: false,
                    data: [{!!$firstReport->confirmed!!}, {!!$midwayReport->confirmed!!}, {!!$lastReport->confirmed!!}],
                    borderWidth: 3,
                    borderColor: '#e3342f',
                    backgroundColor: '#e3342f',
                },
                {
                    label: 'Em Investigação',
                    fill: false,
                    data: [{!!$firstReport->under_investigation!!}, {!!$midwayReport->under_investigation!!}, {!!$lastReport->under_investigation!!}],
                    borderWidth: 2,
                    borderColor: '#ffed4a',
                    backgroundColor: '#ffed4a',
                },
                {
                    label: 'Curados',
                    fill: false,
                    data: [{!!$firstReport->cured!!}, {!!$midwayReport->cured!!}, {!!$lastReport->cured!!}],
                    borderWidth: 2,
                    borderColor: '#6cb2eb',
                    backgroundColor: '#6cb2eb',
                },
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Progressão dos Casos'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Casos',
                        fontSize: 20
                    }
                }]
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });

</script>
