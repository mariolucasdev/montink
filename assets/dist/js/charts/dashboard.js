 // @formatter:off
 document.addEventListener("DOMContentLoaded", function() {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-9'), {
        chart: {
            type: "bar",
            fontFamily: 'inherit',
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
                show: false,
            },
            animations: {
                enabled: true
            },
            stacked: true,
        },
        plotOptions: {
            bar: {
                columnWidth: '30%',
            }
        },
        dataLabels: {
            enabled: false,
        },
        fill: {
            opacity: 1,
        },
        series: [{
            name: "Receitas R$",
            data: [155, 65, 465, 265, 225, 325, 80, 10]
        }, {
            name: "Despesas R$",
            data: [113, 42, 65, 54, 76, 65, 35, 10]
        }],
        tooltip: {
            theme: 'dark'
        },
        grid: {
            padding: {
                top: -20,
                right: 0,
                left: -4,
                bottom: -4
            },
            strokeDashArray: 4,
        },
        xaxis: {
            labels: {
                padding: 0,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            type: 'money',
        },
        yaxis: {
            labels: {
                padding: 4
            },
        },
        labels: [
            'Hiper Online', 'Host', 'TEF Express', 'Hiper Legado', 'SGBR', 'MX', 'Fusion', 'Cummins'
        ],
        colors: ['#0ba1c2', '#d63939'],
        legend: {
            show: true,
        },
    })).render();
});
// @formatter:on