<div class="row">
    <div class="col-sm-5">
        <?=validation_errors(); ?>
        <?=form_open('user/password'); ?>
        <div class="form-group">
            <label>Password Lama <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass1" value="<?=set_value('pass1')?>"/>
        </div>
        <div class="form-group">
            <label>Password Baru <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass2" value="<?=set_value('pass2')?>"/>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass3" value="<?=set_value('pass3')?>"/>
        </div>
        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
        <a class="btn btn-danger" href="<?=site_url("home")?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>