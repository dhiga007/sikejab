<div class="row">
    <div class="col-md-6">
        <?=print_error()?>
        <form method="post">
            <div class="form-group">
                <label>Kode</label>
                <input class="form-control" name="kode_aspek" value="<?=set_value('kode_aspek', $row->kode_aspek)?>" readonly="" />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" name="nama_aspek" value="<?=set_value('nama_aspek', $row->nama_aspek)?>" />
            </div>
            <div class="form-group">
                <label>Persentase <span class="text-danger">*</span></label>
                <input class="form-control" name="persen" value="<?=set_value('persen', $row->persen)?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('aspek')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>