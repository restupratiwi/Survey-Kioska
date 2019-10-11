// Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
var categories = [
    'Q10', 'Q9', 'Q8', 'Q7',
    'Q6', 'Q5', 'Q4', 'Q3', 'Q2',
    'Q1' ];

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Survei Kioska'
    },
    subtitle: {
        text: ''
    },
    xAxis: [{
        categories: categories,
        reversed: false,
        labels: {
            step: 1
        }
    }, { // mirror axis on right side
        opposite: true,
        reversed: false,
        categories: categories,
        linkedTo: 0,
        labels: {
            step: 1
        }
    }],
    yAxis: {
        title: {
            text: null
        },
        labels: {
            formatter: function () {
                return Math.abs(this.value) + '%';
            }
        }
    },

    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + ', age ' + this.point.category + '</b><br/>' +
                'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
        }
    },

    series: [{
        name: 'Genap',
        data: [
            -2.2, 0, -2.2, 0,
            -2.7, 0, -3.3, 0,
            -2.9, 0
        ]
    }, {
        name: 'Ganjil',
        data: [
           0.0, 2.1, 0 ,2.4, 0,
            2.9, 0, 3.1, 0 , 3.4,
            
        ]
    }]
});
