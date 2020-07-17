$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: 'admin/get-data-chart',
        success: function (response) {
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.labels,
                    datasets: [{
                        label: response.label,
                        data: response.totals,
                        backgroundColor: 'blue',
                        borderWidth: 0.5
                    }]
                },
                options: {
                    title: {
                        display: true,
                        fontSize: 20,
                        padding: 20,
                        text: response.title,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function (value, index, values) {
                                    return '$' + value.toLocaleString('it-IT', {style: 'currency', currency: 'VND'});
                                }
                            },
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return tooltipItem.yLabel.toLocaleString('it-IT', {style: 'currency', currency: 'VND'});
                            }
                        }
                    }
                }
            });
        }
    });
});

