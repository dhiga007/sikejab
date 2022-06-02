<h1>Laporan kriteria</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama aspek</th>
            <th>Nama kriteria</th>
            <th>Factor</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <?php    
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->nama_aspek?></td>
        <td><?=$row->nama_kriteria?></td>
        <td><?=$row->factor?></td>
        <td><?=$row->nilai_kriteria?></td>
    </tr>
    <?php endforeach;?>
</table>