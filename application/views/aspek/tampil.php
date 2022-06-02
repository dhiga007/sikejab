<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Aspek</h1>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <strong>
                <i class="ace-icon fa fa-times"></i>
                Perhatian !!
            </strong>
            <h4 class="red smaller lighter"></h4>
            - Tentukan nilai prioritas aspek dalam bentuk persen (10, 20, 30, 40, 50)
            <h4 class="red smaller lighter"></h4>
            - Total nilai aspek tidak boleh kurang atau lebih dari 100%

        </div>
        <form class="form-inline">

            <div class="form-group">
                <a class="btn btn-primary" href="<?= site_url('aspek/tambah') ?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
            </div>
        </form>
    </div>
    <div class="table-responsive mt-3">
        <table class="display" id="table_id">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama aspek</th>
                    <th style="text-align: center">Persentase</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_aspek ?></td>
                    <td><?= $row->nama_aspek ?></td>
                    <td style="text-align: center"><?= $row->persen ?></td>
                    <td>
                        <a class="btn btn-circle btn-warning btn-sm" href="<?= site_url("aspek/ubah/$row->kode_aspek") ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-circle btn-danger btn-sm" href="<?= site_url("aspek/hapus/$row->kode_aspek") ?>" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

            <?php
                $nilai[] = (float)$row->persen;
            endforeach; ?>
        </table>
    </div>
    <br>
    <!-- <?= array_sum($nilai); ?> -->
    <?php
    if (array_sum($nilai) == 100) { ?>
        <div class="alert alert-success">
            <strong>
                Nilai Sudah Terpenuhi
            </strong>
            <h4 class="red smaller lighter"></h4>
            <?= array_sum($nilai); ?>%
        </div>
    <?php } else { ?>
        <div class="alert alert-danger">
            <strong>
                Nilai Belum Terpenuhi
            </strong>
            <h4 class="red smaller lighter"></h4>
            <?= array_sum($nilai); ?>%
        </div>
    <?php }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (array_sum($nilai) == 100) { ?>
                    <div class="alert alert-success">
                        <strong>
                            Nilai Sudah Terpenuhi
                        </strong>
                        <strong>
                            <h2 class="red smaller lighter"></h2>
                            <?= array_sum($nilai); ?>%
                        </strong>
                        <h5 class="red smaller lighter"></h5>
                        Silahkan Lanjutkan Perhitungan
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger">
                        <strong>
                            Nilai Belum Terpenuhi
                        </strong>
                        <strong>
                            <h2 class="red smaller lighter"></h2>
                            <?= array_sum($nilai); ?>%
                        </strong>
                        <h5 class="red smaller lighter"></h5>
                        Silahkan Mengubah Data
                    </div>
                <?php }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Dimengerti</button>

            </div>
        </div>
    </div>
</div>