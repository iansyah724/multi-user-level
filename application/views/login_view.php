<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css'); ?>">
	<title>LOGIN</title>
</head>
<body>
<div class="container" style="margin-top: 90px">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h5>LOGIN</h5>
				</div>
				<form action="<?php echo base_url('login/cek'); ?>" method="POST">
					<div class="panel-body">
						<div class="form-group">
							<?php if ($this->session->flashdata('pesan')=='sukses') {
								echo '
								<div class="alert alert-success">
									Sukses disimpan.
									<button class="close" data-dismiss="alert" type="button">x</button>
								</div>';
							} else { ?>
							<p align="center" class="text-danger"><?php echo $this->session->flashdata('pesan') ?></p>
							<?php } ?>
						</div>
						<div class="form-group">
							<big>Username</big>
							<input type="text" name="username" class="form-control nama" autofocus>
						</div>
						<div class="form-group">
							<big>Password</big>
							<input type="password" name="password" class="form-control">
						</div>
						<p align="center">Belum punya akun? Klik <a href="#buat" data-toggle="modal">disini</a></p>
					</div>
					<div class="panel-footer" align="right">
						<button class="btn btn-info" type="submit">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="buat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Daftar Akun</h3>
			</div>
			<?php echo form_open_multipart(base_url('login/daftar')); ?>
				<div class="modal-body">
					<div class="form-group">
						Username
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						Password
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						Level
						<select name="level" class="form-control">
							<option value=""></option>
							<option value="1">Admin</option>
							<option value="2">User</option>
						</select>
					</div>
					<div class="form-group">
						Image
						<input type="file" name="gambar" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type="button">Batal</button>
					<button class="btn btn-success" type="submit">Daftar</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</body>
	<script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/bootstrap.js'); ?>"></script>
	<script>
		$(document).ready(function() {
			$(document).on('mouseenter','button.btn-info',function () {
				$('button.btn-info').addClass('shadow');
			})
		})
	</script>
</html>