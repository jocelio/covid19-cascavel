<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! $labels !!},
            datasets: [
                {
                    label: 'Descartados',
                    fill: false,
                    data: [@foreach($reports as $report) {!!$report->discarded!!},@endforeach],
                    borderWidth: 2,
                    borderColor: '#38c172',
                    backgroundColor: '#38c172',
                },
                {
                    label: 'Confirmados',
                    fill: false,
                    data: [@foreach($reports as $report) {!!$report->confirmed!!},@endforeach],
                    borderWidth: 3,
                    borderColor: '#e3342f',
                    backgroundColor: '#e3342f',
                },
                {
                    label: 'Em Investigação',
                    fill: false,
                    data: [@foreach($reports as $report) {!!$report->under_investigation!!},@endforeach],
                    borderWidth: 2,
                    borderColor: '#ffed4a',
                    backgroundColor: '#ffed4a',
                },
                {
                    label: 'Curados',
                    fill: false,
                    data: [@foreach($reports as $report) {!!$report->cured!!},@endforeach],
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
                        labelString: 'Quantidade De Casos',
                        fontSize: 20
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false,
                        maxRotation: 90,
                        minRotation: 90
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
