<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik dengan Chart.js</title>
    <script src="<?= base_url('assets/js/Chart.js'); ?>"></script>
</head>

<body>
    <br>
    <h4>Grafik Data Mahasiswa</h4>
    <canvas id="myChart"></canvas>
    <?php
    $nama_jurusan = '';
    $jumlah = null;
    foreach ($hasil as $item) {
        $jur = $item->jurusan;
        $nama_jurusan .= "'$jur'" . ", ";
        $jum = $item->total;
        $jumlah .= "$jum" . ", ";
    }
    ?>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: [<?= $nama_jurusan; ?>],
                datasets: [{
                    label: 'Data Jurusan Mahasiswa',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(56, 86, 255, 0.8)',
                        'rgba(60, 179, 113, 0.8)',
                        'rgba(175, 238, 239, 0.8)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(56, 86, 255)',
                        'rgb(60, 179, 113)',
                        'rgb(175, 238, 239)'
                    ],
                    data: [<?= $jumlah; ?>]
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
