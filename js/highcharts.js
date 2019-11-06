// Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
var categories = [
    'Perlu belajar lebih dulu', 'Dapat menggunakan sendiri', 'Membingungkan', 'User friendly', 'Tidak konsisten',
    'Befungsi', 'Membutuhkan bantuan', 'Mudah digunakan', 'Rumit Dipahami',
    'Akan menggunakan secara rutin' ];
function chart(dt) {
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
            min: -100,
            max: 100,
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
        name: 'Sentimen Negatif',
        data: [ dt.data[0].q1, 0, 50, 0, 100, 0, 25, 0, 75, 0, 100]
    }, {
        name: 'Sentimen Positif',
        data: [ dt.data[0].q1, -75, 0 ,-25, 0, -100, 0, -50, 0, dt.data[0].q1 ]
    }]
});
}

function fetchAPIGET() {
    url = 'api.php/surveikepuasan';
    fetch(url, {
            method: 'GET'
            })
        .then((resp) => resp.json())
        .then(function (data) {
            tampilkanData(data);
        chart(data);
        })
        .catch(function (error) {
            console.log(JSON.stringify(error));
        });
}

// Fungsi untuk menampilkan data
function tampilkanData(dataRAW) {
    console.log("Status: " + dataRAW.status + "<br/>");
    console.log(dataRAW.data);
    console.log(dataRAW.data[0].q1);
}

fetchAPIGET();