// Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
var categories = [
    'Perlu belajar lebih dulu', 'Dapat menggunakan sendiri', 'Membingungkan', 'User friendly', 'Tidak konsisten',
    'Befungsi', 'Membutuhkan bantuan', 'Mudah digunakna', 'Rumit Dipahami',
    'Akan menggunakan secara rutin' ];

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Survei Kioska'
    },
    subtitle: {
        text: 'UPT. Perpustakaan Universitas Lampung'
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
            75, 0, 50, 0,
            100, 0, 25, 0,
            75, 0
        ]
    }, {
        name: 'Ganjil',
        data: [
           0.0, -75, 0 ,-25, 0,
            -100, 0, -50, 0 , -75,
            
        ]
    }]
});
