<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/plugins/chart/Chart.css'); ?>">
	<title>TAMPILAN USER</title>
</head>
<body>
	<?php foreach ($output->result_array() as $key) {
		$jumlah[] = $key['jml'];
	} ?>
<div class="container" style="margin-top: 30px">
	<h3><a href="<?php echo base_url('login/logout'); ?>">Logout</a></h3>
	<div class="panel panel-default">
		<div class="panel-heading">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#" data-toggle="tab" data-target="#home">Dashboard</a></li>
				<li><a href="#" data-toggle="tab" data-target="#grafik">Grafik</a></li>
				<li><a href="#" data-toggle="tab" data-target="#profil">Profil</a></li>
			</ul>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane active" id="home">
					<div class="row">
						<div class="col-md-4">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6">
											<h1><big><?php echo $user->num_rows(); ?></big></h1>
										</div>
										<div class="col-md-6" align="center">
											<h1><big><i class="glyphicon glyphicon-user"></i></big></h1>
										</div>
									</div>
								</div>
								<div class="panel-body">Semua User</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6">
											<h1><big><?php echo $total_sub->num_rows(); ?></big></h1>
										</div>
										<div class="col-md-6" align="center">
											<h1><big><i class="glyphicon glyphicon-user"></i></big></h1>
										</div>
									</div>
								</div>
								<div class="panel-body">Semua Sub User</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Daftar User</h5>
								</div>
								<table class="table table-condensed table-striped table-bordered panel-body" style="width: 100%">
										<thead>
											<tr>
												<th>Id</th>
												<th>Username</th>
												<th>Level</th>
											</tr>
										</thead>
										<tbody>
											<?php  
											foreach ($user->result_array() as $key) {
											?>
											<tr>
												<td><?php echo $key['id'] ?></td>
												<td><?php echo $key['username'] ?></td>
												<?php  
												if ($key['level'] == '1') {
													$level = "Admin";
												} else if ($key['level'] == '2') {
													$level = "User";
												}
												?>
												<td><?php echo $level; ?></td>
											</tr>
											<?php } ?>
										</tbody>
								</table>
								<div class="panel-footer" align="right">
									<button class="btn btn-info badge" data-toggle="modal" data-target="#selengkapnya">
										Selengkapnya
										<i class="glyphicon glyphicon-arrow-right"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5>Daftar Sub_user</h5>
								</div>
								<table class="table table-condensed table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Id User</th>
										</tr>
									</thead>
									<tbody>
										<?php  
										foreach ($sub_user->result_array() as $key) {
										?>
										<tr>
											<td><?php echo $key['id']; ?></td>
											<td><?php echo $key['nama']; ?></td>
											<td><?php echo $key['alamat']; ?></td>
											<td><?php echo $key['id_user']; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="panel-footer" align="right">
									<button class="btn btn-info badge" data-toggle="modal" data-target="#selengkapnya">
										Selengkapnya
										<i class="glyphicon glyphicon-arrow-right"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="grafik">
					<canvas id="mycanvas"></canvas>
				</div>
				<div class="tab-pane" id="profil">
					<div class="row">
						<div class="col-md-6">
							<?php $gambar = $this->session->userdata('gambar'); ?>
							<img src="<?php echo base_url('gambar/'.$gambar); ?>" alt="<?php echo $gambar; ?>" style="max-width: 100%">
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										Username :
									</div>
									<div class="col-md-9">
										<?php echo $this->session->userdata('username'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										Level :
									</div>
									<?php  
									if ($this->session->userdata('level')=='1') {
										$level = "Admin";
									} else {
										$level = "User";
									}
									?>
									<div class="col-md-9">
										<?php echo $level; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="selengkapnya">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<div class="form-group">
					<h1 align="center">
						Upsss... Belum Tersedia
					</h1>
				</div>
				<div class="form-group">
					<h1 align="center">
						<i class="glyphicon glyphicon-thumbs-down"></i>
					</h1>
				</div>
				<div align="center">
					<button class="btn btn-lg btn-primary" data-dismiss="modal">OKE</button>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
</body>
	<script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('asset/plugins/chart/Chart.js'); ?>"></script>
	<script>
		$(document).ready(function() {
			function grafik() {
				ctx = $('#mycanvas');
	            myChart = new Chart(ctx, {
	              type: 'bar',
	              data: {
	                  labels: ['Admin','User'],
	                  datasets: [{
	                    data: <?php echo json_encode($jumlah); ?>,
	                    borderWidth: 1,
	                    borderColor:'#00c0ef',
	                    label: 'Jumlah',
	                  }]
	                },
	                options: {
	                  scales: {
	                    yAxes: [{
	                      ticks: {
	                        beginAtZero:true
	                      }
	                    }]
	                  }
	                }
	            })
			}
			grafik();
		})
	</script>
</html>