<h1>Laporan Hasil Perhitungan</h1>

<?php foreach($ASPEK as $ASP): ?>
<div class="panel panel-default">
    <div class="panel-heading"><strong><?=$ASP->nama_aspek?></strong></div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Kode</th>
                <?php foreach($KRITERIA[$ASP->kode_aspek] as $key => $val):?>
                <th><?=$key?></th>
                <?php endforeach?>
            </tr>
            <?php 
            $m_awal = $this->relasi_model->tampil($ASP->kode_aspek);                        
            foreach((array) $m_awal as $key => $value):?>
            <tr>
                <th><?=$key?></th>
                <?php foreach($value as $k => $v):?>
                <td><?=round($v, 2)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach?>
            <tfoot><tr>
                <th>Nilai Kriteria</th>
                <?php foreach($KRITERIA[$ASP->kode_aspek] as $key=>$val):?>
                <td class="text-primary"><?=$val->nilai_kriteria?></td>        
                <?php endforeach?>
            </tr></tfoot>            
        </table>
    </div>    
    <div class="panel-body">Perhitungan pemetaan gap <strong><?=$ASP->nama_aspek?></strong>:</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead><tr>
                <th></th>
                <?php foreach($KRITERIA[$ASP->kode_aspek] as $key=>$val):?>
                <th><?=$val->kode_kriteria?></th>
                <?php endforeach?>                 
            </tr></thead>
            <?php             
            get_peta_gap($m_awal, $KRITERIA[$ASP->kode_aspek]);            
            foreach((array)$m_awal as $key => $value):?>
            <tr>
                <th><?=$key?></th>
                <?php foreach($value as $k => $v):?>
                <td><?=round($v, 2)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach?>            
        </table>
    </div>            
    <div class="panel-body">Pembobotan nilai gap <strong><?=$ASP->nama_aspek?></strong>:</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead><tr>
                <th></th>
                <?php foreach($KRITERIA[$ASP->kode_aspek] as $key=>$val):?>
                <th><?=$val->kode_kriteria?></th>
                <?php endforeach?>                
            </tr></thead>
            <?php             
            get_bobot_nilai_gap($m_awal);            
            foreach((array)$m_awal as $key => $value):?>
            <tr>
                <th><?=$key?></th>
                <?php foreach($value as $k => $v):?>
                <td><?=round($v, 2)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach?>            
        </table>
    </div>
    <div class="panel-body">Perhitungan factor <strong><?=$ASP->nama_aspek?></strong>:</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th></th>
                <?php foreach($KRITERIA[$ASP->kode_aspek] as $key=>$val):?>
                <th><?=$val->kode_kriteria?></th>
                <?php endforeach?>   
                <th>NCF</th>
                <th>NSF</th>
                <th>Total</th>
            </tr>
            <?php foreach((array)$m_awal as $key => $value):?>
            <tr>
                <th><?=$key?></th>
                <?php 
                $nc = array();
                $ns = array();                
                foreach($value as $k => $v):
                    if($KRITERIA[$ASP->kode_aspek][$k]->factor=='Core')
                        $nc[] = $v;
                    else
                        $ns[] = $v;?>
                <td><?=round($v, 2)?></td>
                <?php endforeach;
                $ncf = count($nc) == 0 ? 0 : array_sum($nc)/ count($nc);
                $nsf = count($ns) ==0 ? 0 : array_sum($ns)/ count($ns);
                $total = (60 / 100 * $ncf) + (40 / 100 * $nsf);
                $profile[$key][$ASP->kode_aspek] = $total;?>                
                <td><?=number_format($ncf, 2)?></td>
                <td><?=number_format($nsf, 2)?></td>
                <td class='text-primary'><?=number_format($total, 2)?></td>                                
            <?php endforeach?>                        
            <tr>
                <td></td>
                <?php foreach($KRITERIA[$ASP->kode_aspek] as $row):?>
                <td class="text-primary"><?=$val->factor?></td> 
                <?php endforeach?>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>            
</div>
<?php endforeach;?>

  
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Hasil Akhir</strong></div>            
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Alternatif</th>
                    <?php foreach($ASPEK as $ASP):?>
                    <th><?=$ASP->nama_aspek?></th>
                    <?php endforeach?>                                        
                    <th>Total</th>
                    <th>Rank</th>
                </tr>
                <tr>
                    <td>Prosentase</td>
                    <?php foreach($ASPEK as $ASP):?>
                    <td><?=$ASP->persen?> %</td>
                    <?php endforeach?>
                    <td></td>
                    <td></td>
                </tr>                            
                <?php 
                //print_r($profile);
                $nilai = get_total($profile, $ASPEK);                
                function get_rank($array){
                    $m_awal = $array;
                    arsort($m_awal);
                    $no=1;
                    $new = array();
                    foreach($m_awal as $key => $value){
                        $new[$key] = $no++;
                    }
                    return $new;
                }                
                $rank = get_rank($nilai);                
                foreach($profile as $key => $value):?>
                <tr>
                    <td><?=$key?> - <?=$ALTERNATIF[$key]->nama_alternatif?></td>
                    <?php foreach($value as $k => $v):?>
                    <td><?=round($v,2)?></td>    
                    <?php endforeach?>
                    <td class="text-primary"><?=round($nilai[$key], 2)?></td>
                    <td class="text-primary"><?=$rank[$key]?></td>        
                </tr>
                <?php endforeach?>
                </tr>                           
             </table>
        </div>                         
    </div> 