<script>
    //areaChart------------------------------------------------
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
        var areaChart;
        var violationTitles = [];

        function initializeChart(data) {
            violationTitles = data.violationTitles; // Assign violation titles globally
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
                                labelString: 'Policy IDs' // Title for the x-axis
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
                            return `${data.datasets[tooltipItem.datasetIndex].label}: ${tooltipItem.yLabel}`; // Display 'Open' or 'Resolved' label in the tooltip
                        }
                    }
                }
            };

            areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            });
        }

        function updateChart(data) {
            violationTitles = data.violationTitles;
            areaChart.data.labels = data.violationIDs;
            areaChart.data.datasets[0].data = data.openCounts;
            areaChart.data.datasets[1].data = data.resolvedCounts;
            areaChart.update();
        }

        function fetchDataAndUpdateChart() {
            fetch('script/fetchViolation.php')
            .then(response => response.json())
            .then(data => {
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
                    initializeChart(chartData);
                } else {
                    updateChart(chartData);
                }
            })
            .catch(error => console.error('Error fetching data:', error));
        }

        fetchDataAndUpdateChart();

        setInterval(fetchDataAndUpdateChart, 10000);

    //areaChart------------------------------------------------
    //bar Chart------------------------------------------------

        var groupedBarChartCanvas = document.getElementById('groupedBarChart').getContext('2d');
        var groupedBarChart;

        const colors = [
            'rgba(60,141,188,0.9)',
            'rgba(255,99,132,0.8)',
            'rgba(75,192,192,0.8)',
            'rgba(153,102,255,0.8)',
            'rgba(255,159,64,0.8)',
            'rgba(201,203,207,0.8)',
            'rgba(255,205,86,0.8)',
            'rgba(54,162,235,0.8)',
            'rgba(104,132,245,0.8)',
            'rgba(150,210,130,0.8)',
            'rgba(100,100,255,0.8)',
            'rgba(200,100,150,0.8)',
            'rgba(210,180,140,0.8)',
            'rgba(127,255,0,0.8)',
            'rgba(218,112,214,0.8)'
        ];

        function fetchDataAndInitializeGroupedBarChart() {
            fetch('script/fetchViolation.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    const departments = [...new Set(data.departmentViolations.map(d => d.dept_name))];
                    const policies = [...new Set(data.departmentViolations.map(d => d.policy_title))];
                    const datasets = policies.map((policy, index) => {
                        return {
                            label: policy,
                            backgroundColor: colors[index % colors.length],
                            borderColor: colors[index % colors.length],
                            data: departments.map(department => {
                                const violation = data.departmentViolations.find(v => v.dept_name === department && v.policy_title === policy);
                                return violation ? violation.count : 0;
                            })
                        };
                    });

                    const groupedBarChartData = {
                        labels: departments,
                        datasets: datasets
                    };

                    var groupedBarChartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: true
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Departments'
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: true
                                },
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    callback: function(value) {
                                        if (Number.isInteger(value)) {
                                            return value;
                                        }
                                    }
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Number of Violations'
                                }
                            }]
                        },
                        tooltips: {
                            mode: 'nearest',
                            intersect: true,
                            callbacks: {
                                title: function(tooltipItems, data) {
                                    const departmentIndex = tooltipItems[0].index;
                                    return data.labels[departmentIndex];
                                },
                                label: function(tooltipItem, data) {
                                    const datasetIndex = tooltipItem.datasetIndex;
                                    const policy = data.datasets[datasetIndex].label;
                                    const count = tooltipItem.yLabel;
                                    return `${policy}: ${count}`;
                                }
                            }
                        }
                    };

                    if (!groupedBarChart) {
                        groupedBarChart = new Chart(groupedBarChartCanvas, {
                            type: 'bar',
                            data: groupedBarChartData,
                            options: groupedBarChartOptions
                        });
                    } else {
                        groupedBarChart.data = groupedBarChartData;
                        groupedBarChart.update();
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
            }

            fetchDataAndInitializeGroupedBarChart();
            setInterval(fetchDataAndInitializeGroupedBarChart, 10000);
</script>