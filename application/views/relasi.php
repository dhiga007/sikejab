<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Nilai Alternatif</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <div class="form-group">
                <select class="form-control" name="kode_aspek" onchange="this.form.submit()">
                    <option value="">Pilih aspek</option>
                    <?= get_aspek_option($this->input->get('kode_aspek')) ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <input class="form-control" name="search" value="<?= $this->input->get('search') ?>" placeholder="Pencarian" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div> -->
        </form>
    </div>
    <?php if ($relasi) : ?>
        <div class="table-responsive mt-3">
            <table class="display" id="table_id">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <?php foreach ($kriteria[$kode_aspek] as $key => $val) : ?>
                            <th><?= $val->nama_kriteria ?></th>
                        <?php endforeach ?>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php foreach ($alternatif as $key => $val) : ?>
                    <tr>
                        <td style= "text-align: center"><?= $key ?></td>
                        <td style= "text-align: center"><?= $val->nama_alternatif ?></td>
                        <?php foreach ($relasi[$key] as $val) : ?>
                            <td style= "text-align: center"><?= $val ?></td>
                        <?php endforeach ?>
                        <td class="nw">
                            <a class="btn btn-circle btn-warning btn-sm" href="<?= site_url("relasi/ubah/$key?kode_aspek=$kode_aspek") ?>"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    <?php endif ?>
</div>