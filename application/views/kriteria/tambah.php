<div class="row">
    <div class="col-sm-6">
        <?=print_error()?>
        <form method="post">
            <div class="form-group">
                <label>Aspek <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_aspek">
                    <option></option>
                    <?=get_aspek_option(set_value('kode_aspek'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_kriteria" value="<?=set_value('kode_kriteria', kode_oto('kode_kriteria', 'tb_kriteria', 'C', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kriteria" value="<?=set_value('nama_kriteria')?>"/>
            </div>
            <div class="form-group">
                <label>Factor <span class="text-danger">*</span></label>
                <select class="form-control" name="factor">
                    <option></option>
                    <?=get_factor_option(set_value('factor'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Nilai <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nilai_kriteria" value="<?=set_value('nilai_kriteria')?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('kriteria')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>            
        </form>
    </div>
</div>