<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Alternatif</h1>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <!-- <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?= $this->input->get('search') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div> -->
            <div class="form-group">
                <a class="btn btn-primary" href="<?= site_url('alternatif/tambah') ?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
           
        </form>
    </div>
    <div class="table-responsive mt-3">
        <table class="display" id="table_id">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Alternatif</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_alternatif ?></td>
                    <td><?= $row->nama_alternatif ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td>
                        <a class="btn btn-circle btn-warning btn-sm" href="<?= site_url("alternatif/ubah/$row->kode_alternatif") ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-circle btn-danger btn-sm" href="<?= site_url("alternatif/hapus/$row->kode_alternatif") ?>" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>