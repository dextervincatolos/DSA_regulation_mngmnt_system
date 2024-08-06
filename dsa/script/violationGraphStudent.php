<script>
    document.addEventListener('DOMContentLoaded', function() {
        var studentViolationChartCanvas = document.getElementById('studentViolationChart');
        if (studentViolationChartCanvas) {
            var studentViolationChartContext = studentViolationChartCanvas.getContext('2d');
            fetchDataAndUpdateChart(studentViolationChartContext);
        } else {
            console.error('Canvas element with ID studentViolationChart not found.');
        }
    });

    var areaChart;
    var violationTitles = [];

    function drawNoDataMessage(ctx, message) {
        if (!ctx) {
            console.error('Canvas context is not defined.');
            return;
        }
        ctx.save();
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.font = '16px Arial';
        ctx.fillText(message, ctx.canvas.width / 2, ctx.canvas.height / 2);
        ctx.restore();
    }

    function initializeChart(data, context) {
        if (!context) {
            console.error('Canvas context is not defined.');
            return;
        }

        if (!data.violationIDs.length) {
            drawNoDataMessage(context, 'No Violations Found');
            return;
        }

        violationTitles = data.violationTitles;
        var areaChartData = {
            labels: data.violationIDs,
            datasets: [
                {
                    label: 'Open',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: true,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: data.openCounts,
                    fill: false
                },
                {
                    label: 'Resolved',
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    pointRadius: true,
                    pointColor: '#ff6384',
                    pointStrokeColor: 'rgba(255,99,132,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(255,99,132,1)',
                    data: data.resolvedCounts,
                    fill: false
                }
            ]
        };

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true
            },
            scales: {
                xAxes: [
                    {
                        gridLines: {
                            display: true,
                        },
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0,
                            minRotation: 0
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Policy IDs'
                        }
                    }
                ],
                yAxes: [
                    {
                        gridLines: {
                            display: true,
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                            callback: function(value) { if (Number.isInteger(value)) { return value; } }
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Number of Violations'
                        }
                    }
                ]
            },
            tooltips: {
                callbacks: {
                    title: function(tooltipItems, data) {
                        return violationTitles[tooltipItems[0].index];
                    },
                    label: function(tooltipItem, data) {
                        return `${data.datasets[tooltipItem.datasetIndex].label}: ${tooltipItem.yLabel}`;
                    }
                }
            }
        };

        areaChart = new Chart(context, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        });
    }

    function updateChart(data) {
        var ctx = document.getElementById('studentViolationChart').getContext('2d');
        if (!ctx) {
            console.error('Canvas context is not defined for updating chart.');
            return;
        }

        if (!data.violationIDs.length) {
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height); 
            drawNoDataMessage(ctx, 'No Violations Found');
            return;
        }

        violationTitles = data.violationTitles;
        areaChart.data.labels = data.violationIDs;
        areaChart.data.datasets[0].data = data.openCounts;
        areaChart.data.datasets[1].data = data.resolvedCounts;
        areaChart.update();
    }

    function fetchDataAndUpdateChart(context) {
        const studentId = document.getElementById('studentid').dataset.studentId;
        console.log('Student ID:', studentId);
        fetch(`script/fetchStudentViolation.php?id=${studentId}`)
        .then(response => response.json())
        .then(data => {
            if (!data.violations) {
                console.error('No violations data returned.');
                initializeChart({ violationIDs: [], violationTitles: [], openCounts: [], resolvedCounts: [] }, context);
                return;
            }

            const violationIDs = [...new Set(data.violations.map(v => v.spID))];
            const titles = [...new Set(data.violations.map(v => v.policy_title))];
            const openCounts = violationIDs.map(id => {
                const violation = data.violations.find(v => v.spID === id && v.violation_status === 'Open');
                return violation ? violation.count : 0;
            });
            const resolvedCounts = violationIDs.map(id => {
                const violation = data.violations.find(v => v.spID === id && v.violation_status === 'resolved');
                return violation ? violation.count : 0;
            });

            const chartData = {
                violationIDs: violationIDs,
                violationTitles: titles,
                openCounts: openCounts,
                resolvedCounts: resolvedCounts
            };

            if (!areaChart) {
                initializeChart(chartData, context);
            } else {
                updateChart(chartData);
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            initializeChart({ violationIDs: [], violationTitles: [], openCounts: [], resolvedCounts: [] }, context);
        });
    }

    setInterval(function() {
        fetchDataAndUpdateChart(document.getElementById('studentViolationChart').getContext('2d'));
    }, 10000);
</script>
