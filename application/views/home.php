<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

</div>

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Aspek</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($aspek);?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calendar fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Kriteria</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($kriteria);?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-archive fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Alternatif</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($alternatif);?></div>
							</div>
						
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	
</div>

<!-- Content Row -->
<div class="row">

	<!-- Area Chart -->
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">PENGUMUMAN NAIK JABATAN</h6>
			</div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th style="text-align: center">No</th>
								<th style="text-align: center">Nama Alternatif</th>
								<th style="text-align: center">Total Skor</th>
								<th style="text-align: center">Ranking</th>
							</tr>
						</thead>
						<?php
						$no = 0;
						foreach ($rows as $row) : ?>
							<tr>
								<td style="text-align: center"><?= ++$no ?></td>
								<td style="text-align: center"><?= $row->nama_alternatif ?></td>
								<td style="text-align: center"><?= $row->total ?></td>
								<td style= "text-align: center"><?php $r= $row->ranking;
								echo $r ?></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			
			<!-- Card Body -->
		
		</div>
	</div>


</div>