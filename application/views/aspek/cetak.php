<h1>Laporan aspek</h1>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama aspek</th>
        <th>Persentase</th>
    </tr>
</thead>
<?php    
$no=0;
foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->kode_aspek?></td>
    <td><?=$row->nama_aspek?></td>
    <td><?=$row->persen?></td>
</tr>
<?php endforeach;?>
</table>