<div class="row">
    <div class="col-sm-6">
        <?=print_error()?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_aspek" value="<?=set_value('kode_aspek', kode_oto('kode_aspek', 'tb_aspek', 'A', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama aspek <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_aspek" value="<?=set_value('nama_aspek')?>"/>
            </div>
            <div class="form-group">
                <label>Persentase <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="persen" value="<?=set_value('persen')?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('aspek')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>            
        </form>
    </div>
</div>