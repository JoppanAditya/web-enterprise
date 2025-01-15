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
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3><?= $totalMahasiswa; ?></h3>
                        <p>Mahasiswa</p>
                    </div>
                    <i class="bi bi-person-badge small-box-icon"></i>
                    <a href="<?= base_url('mahasiswa'); ?>" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div> <!--end::Small Box Widget 1-->
            </div> <!--end::Col-->
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3><?= $totalDosen; ?></h3>
                        <p>Dosen</p>
                    </div>
                    <i class="bi bi-mortarboard small-box-icon"></i>
                    <a href="<?= base_url('dosen'); ?>" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div> <!--end::Small Box Widget 2-->
            </div> <!--end::Col-->
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3><?= $totalMatkul; ?></h3>
                        <p>Mata Kuliah</p>
                    </div>
                    <i class="bi bi-book small-box-icon"></i>
                    <a href="<?= base_url('matkul'); ?>" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div> <!--end::Small Box Widget 3-->
            </div> <!--end::Col-->
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
                <div class="small-box text-bg-danger">
                    <div class="inner">
                        <h3><?= $totalPerkuliahan; ?></h3>
                        <p>Perkuliahan</p>
                    </div>
                    <i class="bi bi-easel2 small-box-icon"></i>
                    <a href="<?= base_url('perkuliahan'); ?>" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i> </a>
                </div> <!--end::Small Box Widget 4-->
            </div> <!--end::Col-->
        </div>
        <div class="row">
            <!-- /.Start col --> <!-- Start col -->
        </div> <!-- /.row (main row) -->
        <div class="row">
            <div class="col-lg-12 connectedSortable">
                <div class="col-lg-12 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Grafik Data Perkuliahan</h3>
                            <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button></div>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPerkuliahan"></canvas>
                            <?php
                            $nama_perkuliahan = '';
                            $jumlah_perkuliahan = null;
                            foreach ($perkuliahanData as $item) {
                                $kuliah = $item->nama_mata_kuliah;
                                $nama_perkuliahan .= "'$kuliah'" . ", ";
                                $jum = $item->total;
                                $jumlah_perkuliahan .= "$jum" . ", ";
                            }
                            ?>
                        </div>
                    </div> <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="row"> <!-- Start col -->
            <div class="col-lg-7 connectedSortable">
                <div class="col-lg-12 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Grafik Data Dosen</h3>
                            <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button></div>
                        </div>
                        <div class="card-body">
                            <canvas id="chartDosen"></canvas>
                            <?php
                            $nama_prodi = '';
                            $jumlah_dosen = null;
                            foreach ($dosenData as $item) {
                                $dosen = $item->prodi;
                                $nama_prodi .= "'$dosen'" . ", ";
                                $jum = $item->total;
                                $jumlah_dosen .= "$jum" . ", ";
                            }
                            ?>
                        </div>
                    </div> <!-- /.card -->
                </div>
            </div> <!-- /.Start col --> <!-- Start col -->
            <div class="col-lg-5 connectedSortable"><!-- /.info-box -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Jurusan Mahasiswa</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button></div>
                    </div> <!-- /.card-header -->
                    <div class="card-body"> <!--begin::Row-->
                        <div class="row">
                            <div class="col-12">
                                <div id="data-jurusan"></div>
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
                            </div> <!-- /.col -->
                        </div> <!--end::Row-->
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::App Content-->
</main> <!--end::App Main-->

<script>
    var ctx = document.getElementById('chartPerkuliahan').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?= $nama_perkuliahan; ?>],
            datasets: [{
                label: 'Data Perkuliahan',
                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                data: [<?= $jumlah_perkuliahan; ?>]
            }]
        },
    });
</script>

<script>
    const pie_chart_options = {
        series: [<?= $jumlah; ?>],
        chart: {
            type: "donut",
        },
        labels: [<?= $nama_jurusan; ?>],
        dataLabels: {
            enabled: false,
        },
        colors: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(56, 86, 255, 0.8)',
            'rgba(60, 179, 113, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)'
        ],
    };

    const pie_chart = new ApexCharts(
        document.querySelector("#data-jurusan"),
        pie_chart_options,
    );
    pie_chart.render();
</script>

<script>
    var ctxDosen = document.getElementById('chartDosen').getContext('2d');
    var chartDosen = new Chart(ctxDosen, {
        type: 'bar',
        data: {
            labels: [<?php echo $nama_prodi; ?>],
            datasets: [{
                label: 'Jumlah Dosen',
                data: [<?php echo $jumlah_dosen; ?>],
                backgroundColor: 'rgba(56, 86, 255, 0.8)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
