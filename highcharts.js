// Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
var categories = [
    'Perlu belajar lebih dulu',
    'Dapat menggunakan sendiri',
    'Membingungkan',
    'User friendly',
    'Tidak konsisten',
    'Befungsi',
    'Membutuhkan bantuan',
    'Mudah digunakan',
    'Rumit Dipahami',
    'Akan menggunakan secara rutin'
];

function chart(dt) {
    console.log(dt);
    console.log(dt.data[0].q1);
    console.log(dt.data[0].q2);
    console.log(dt.data[0].q3);
    console.log(dt.data[0].q4);
    console.log(dt.data[0].q5);
    console.log(dt.data[0].q6);
    console.log(dt.data[0].q7);
    console.log(dt.data[0].q8);
    console.log(dt.data[0].q9);
    console.log(dt.data[0].q10);
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
                return '<b>' + this.series.name + ', kategori ' + this.point.category + '</b><br/>' +
                    'Nilai: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0) + "%";
            }
        },

        series: [{
            name: 'Sentimen Positif',
            // hanya indeks gen
            data: [0, Math.round(dt.data[0].q2), 0, Math.round(dt.data[0].q4), 0, Math.round(dt.data[0].q6), 0, Math.round(dt.data[0].q8), 0, Math.round(dt.data[0].q10)]
        }, {
            name: 'Sentimen Negatif',
            // hanya indeks gan
            data: [Math.round(-dt.data[0].q1), 0, Math.round(-dt.data[0].q3), 0, Math.round(-dt.data[0].q5), 0, Math.round(-dt.data[0].q7), 0, Math.round(-dt.data[0].q9), 0]
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
            // tampilkanData(data);

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