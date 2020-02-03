<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatable/css/dataTables.bootstrap.css'); ?>">
	<title>DATA SISWA</title>
</head>
<body>
<div class="container" style="margin-top: 30px">
	<div class="row">
		<div class="col-md-12">
			<h3><a href="<?php echo base_url('login/logout') ?>">Logout</a></h3>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Tampilan Admin</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<?php if ($this->session->flashdata('pesan')): ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('pesan'); ?>
									<button class="close" data-dismiss="alert" type="button">x</button>
								</div>
							<?php endif ?>
						</div>
						<div class="col-md-12" style="margin-bottom: 10px"><button class="btn btn-success pull-right" data-toggle="modal" data-target="#tambah"><i class="glyphicon glyphicon-plus"></i> Tambah</button></div>
						<div class="col-md-12">
							<table class="table table-bordered table-striped table-condensed siswa">
								<thead>
									<tr class="info">
										<th>No</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th style="width: 10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php  
									$no = 1;
									foreach ($output as $key) {
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $key['nama'] ?></td>
										<td><?php echo $key['alamat'] ?></td>
										<td>
											<button class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#edit" data-id="<?php echo $key['id']; ?>" data-nama="<?php echo $key['nama']; ?>" data-alamat="<?php echo $key['alamat']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
											<button class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus" data-id="<?php echo $key['id']; ?>" data-nama="<?php echo $key['nama']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Tambah Siswa</h3>
			</div>
			<form action="<?php echo base_url('admin/tambah'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						Nama
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						Alamat
						<input type="text" name="alamat" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type="button">Batal</button>
					<button class="btn btn-success" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Edit Data</h3>
			</div>
			<form action="<?php echo base_url('admin/edit'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" class="id-edit" name="id">
					<div class="form-group">
						Nama
						<input type="text" name="nama" class="form-control nama-edit">
					</div>
					<div class="form-group">
						Alamat
						<input type="text" name="alamat" class="form-control alamat-edit">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type="button">Batal</button>
					<button class="btn btn-edit" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Hapus Data</h3>
			</div>
			<form action="<?php echo base_url('admin/hapus'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" class="id-hapus">
					<p>Anda yakin menghapus <b class="nama-hapus">Nama User</b>?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type="button">Batal</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
	<script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('asset/plugins/datatable/js/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('asset/plugins/datatable/js/dataTables.bootstrap.js'); ?>"></script>
	<script>
		$(document).ready(function() {
			$('table.siswa').DataTable();

			$(document).on('click','button.edit',function() {
				id = $(this).data('id');
				nama = $(this).data('nama');
				alamat = $(this).data('alamat');
				$('input.id-edit').val(id);
				$('input.nama-edit').val(nama);
				$('input.alamat-edit').val(alamat);
			})

			$(document).on('click','button.hapus',function() {
				id = $(this).data('id');
				nama = $(this).data('nama');
				$('input.id-hapus').val(id);
				$('b.nama-hapus').html(nama);
			})
		})
	</script>
</html>