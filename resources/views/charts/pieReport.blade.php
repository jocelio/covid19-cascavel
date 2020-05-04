<script>
    var myPieChart = new Chart(document.getElementById('myPieChart'), {
        type: 'pie',
        data: {
            datasets: [{
                data: [{!!$lastReport->confirmed - $lastReport->cured - $lastReport->death!!}, {!!$lastReport->cured!!}, {!!$lastReport->deaths!!}],
                backgroundColor: ["#ffed4a", "#6cb2eb", "#141e30"],
            }],
            labels: ['Ativos','Curados','Mortes'
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Divisão do cenário atual'
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        display: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: '',
                        fontSize: 20
                    }
                }]
            },

        }
    });
</script>
