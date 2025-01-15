<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Detail Dosen</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dosen'); ?>">Dosen</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $dosen->nama; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridDay,timeGridWeek'
            },
            events: [
                <?php foreach ($jadwal as $row) : ?> {
                        title: '<?= $row->nama_mata_kuliah . " - " . $row->kelas; ?>',
                        daysOfWeek: [<?= date('w', strtotime($row->hari)); ?>],
                        startTime: '<?= date('H:i:s', strtotime($row->waktu)); ?>',
                        endTime: '<?= date('H:i:s', strtotime($row->waktu . ' +1 hour')); ?>',
                        className: 'bg-primary'
                    },
                <?php endforeach; ?>
            ]
        });
        calendar.render();
    });
</script>
