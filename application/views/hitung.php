<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Perhitungan</h1>
    <a class="btn btn-primary btn-primary" href="<?= site_url('hitung/cetak') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span><i class="fas fa-print"></i> Cetak </a>
</div>
<?php
if (!$ALTERNATIF || !$ASPEK || !$KRITERIA) :
    echo "Tampaknya anda belum mengatur alternatif, aspek, atau kriteria. Silahkan tambahkan minimal 3 alternatif, 3 aspek, dan 3 kriteria.";
elseif ($this->db->query("SELECT * FROM tb_aspek WHERE kode_aspek NOT IN(SELECT kode_aspek FROM tb_kriteria)")->result()) :
    print_msg('Ada aspek yang belum diatur kriterianya.');
else :
?>

    <div class="panel panel-primary">
        <div class="panel-heading">

        </div>
        <div id="c1" class="panel-body ">
            <?php foreach ($ASPEK as $ASP) : ?>
                <div class="panel panel-default">

                    <div class="panel-heading  "><strong><?= $ASP->nama_aspek ?></strong></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Kode</th>
                                <?php foreach ($KRITERIA[$ASP->kode_aspek] as $key => $val) : ?>
                                    <th><?= $key ?></th>
                                <?php endforeach ?>
                            </tr>
                            <?php
                            $m_awal = $this->relasi_model->tampil($ASP->kode_aspek);
                            foreach ((array) $m_awal as $key => $value) : ?>
                                <tr>
                                    <th><?= $key ?></th>
                                    <?php foreach ($value as $k => $v) : ?>
                                        <td><?= round($v, 3) ?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>Nilai Kriteria</th>
                                    <?php foreach ($KRITERIA[$ASP->kode_aspek] as $key => $val) : ?>
                                        <td class="text-primary"><?= $val->nilai_kriteria ?></td>
                                    <?php endforeach ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body">Perhitungan pemetaan gap <strong><?= $ASP->nama_aspek ?></strong>:</div>
                    <div class="table-responsive ">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <?php foreach ($KRITERIA[$ASP->kode_aspek] as $key => $val) : ?>
                                        <th><?= $val->kode_kriteria ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <?php
                            get_peta_gap($m_awal, $KRITERIA[$ASP->kode_aspek]);
                            foreach ((array)$m_awal as $key => $value) : ?>
                                <tr>
                                    <th><?= $key ?></th>
                                    <?php foreach ($value as $k => $v) : ?>
                                        <td><?= round($v, 2) ?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>

                    <div class="panel-body">Pembobotan nilai gap <strong><?= $ASP->nama_aspek ?></strong>:</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <?php foreach ($KRITERIA[$ASP->kode_aspek] as $key => $val) : ?>
                                        <th><?= $val->kode_kriteria ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <?php
                            get_bobot_nilai_gap($m_awal);
                            foreach ((array)$m_awal as $key => $value) : ?>
                                <tr>
                                    <th><?= $key ?></th>
                                    <?php foreach ($value as $k => $v) : ?>
                                        <td><?= round($v, 2) ?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <div class="panel-body">Perhitungan factor <strong><?= $ASP->nama_aspek ?></strong>:</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <tr>
                                <th></th>
                                <?php foreach ($KRITERIA[$ASP->kode_aspek] as $key => $val) : ?>
                                    <th><?= $val->kode_kriteria ?></th>
                                <?php endforeach ?>
                                <th>NCF</th>
                                <th>NSF</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td></td>
                                <?php
                                foreach ($KRITERIA[$ASP->kode_aspek] as $key => $val) : ?>
                                    <td class="text-primary"><?= $val->factor ?></td>
                                <?php endforeach ?>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php foreach ((array)$m_awal as $key => $value) : ?>
                                <tr>
                                    <th><?= $key ?></th>
                                    <?php
                                    $nc = array();
                                    $ns = array();
                                    foreach ($value as $k => $v) :
                                        if ($KRITERIA[$ASP->kode_aspek][$k]->factor == 'Core')
                                            $nc[] = $v;
                                        else
                                            $ns[] = $v; ?>
                                        <td><?= round($v, 2) ?></td>
                                    <?php endforeach;
                                    $ncf = count($nc) == 0 ? 0 : array_sum($nc) / count($nc);
                                    $nsf = count($ns) == 0 ? 0 : array_sum($ns) / count($ns);
                                    $total = (60 / 100 * $ncf) + (40 / 100 * $nsf);
                                    $profile[$key][$ASP->kode_aspek] = $total; ?>
                                    <td><?= number_format($ncf, 2) ?></td>
                                    <td><?= number_format($nsf, 2) ?></td>
                                    <td class='text-primary'><?= number_format($total, 2) ?></td>
                                <?php endforeach ?>

                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

   
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Ranking Naik Jabatan</strong></div>
        <div class="panel-body">
            <div class="panel panel-default">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Alternatif</th>
                            <?php foreach ($ASPEK as $ASP) : ?>
                                <th><?= $ASP->nama_aspek ?></th>
                            <?php endforeach ?>
                            <th>Total</th>
                            <th>Rank</th>
                        </tr>
                        <tr>
                            <td>Presentase</td>
                            <?php foreach ($ASPEK as $ASP) : ?>
                                <td><?= $ASP->persen ?> %</td>
                            <?php endforeach ?>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                        $this->db->query('truncate table tb_hasil');
                        //print_r($profile);
                        $nilai = get_total($profile, $ASPEK);
                        function get_rank($array)
                        {
                            $m_awal = $array;
                            arsort($m_awal);
                            $no = 1;
                            $new = array();
                            foreach ($m_awal as $key => $value) {
                                $new[$key] = $no++;
                            }
                            return $new;
                        }
                        $rank = get_rank($nilai);
                        foreach ($profile as $key => $value) : ?>
                            <tr>
                                <td><?= $key ?> - <?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                                <?php foreach ($value as $k => $v) : ?>
                                    <td><?= round($v, 2) ?></td>
                                <?php endforeach ?>
                                <td class="text-primary"><?php $tot= round($nilai[$key], 2);
                                echo $tot ?>
                            </td>
                                <td class="text-primary"><?php $ranking= $rank[$key]; 
                                echo $ranking ?></td>
                            </tr>
                            <?php
                            $this->db->query("insert into tb_hasil (kode_alternatif, total, ranking) 
                                                        values('" . $key . "','" . $tot . "','" . $ranking . "')");
                                                        ?>
                        <?php endforeach ?>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- <div class="box-footer">
                    <button type="submit" class="btn btn-secondary btn-success"><i class="fa fa-print"></i> Print</button>
                </div> -->
           
        </div>
    </div>
   





<?php endif ?>