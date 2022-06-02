<div class="row">
    <div class="col-md-6">
        <?=print_error()?>
        <form method="post">
            <?php foreach($rows as $row): ?>                    
            <div class="form-group">
                <label><?=$row->nama_kriteria?> <span class="text-danger">*</span></label>
                <select class="form-control" name="nilai[<?=$row->ID?>]">
                    <option></option>
                    <?=get_nilai_option( set_value("nilai[$row->ID]", $row->nilai))?>
                </select>
            </div>
            <?php endforeach?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url("relasi?kode_aspek=$kode_aspek")?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>