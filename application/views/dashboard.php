<!--begin::App Main-->
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item active" aria-current="page">
                            Home
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content h-100"> <!--begin::Container-->
        <!--begin::Row-->
        <div class="row"> <!-- Start col -->
            <div class="col-lg-12 connectedSortable">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Data Mahasiswa</h3>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.Start col --> <!-- Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::App Content-->
</main> <!--end::App Main-->

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
