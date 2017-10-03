<?php
include "connection.php";
// Buat prepared statement untuk mengambil semua data dari tbBiodata
$query = $db->prepare("SELECT * FROM provinces");
// Jalankan perintah SQL
$query->execute();
// Ambil semua data dan masukkan ke variable $data
$data = $query->fetchAll();
?>
<html>
<head>
<title>Perpustakaan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<link href="css/styles.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="function/functionUpdate.js"></script>
<script src="function/function.js"></script>
<style>
table {
	border-collapse: collapse;
	width: 60%;
}

th, td {
	vertical-align: middle;
}

tr:nth-child(even) {
	background-color: #f2f2f2
}

th {
	background-color: #ff7400;
	color: #040201;
}

.warna {
	background-color: #ff7400;
	color: #040201;
}
</style>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<!-- Logo -->
					<div class="logo">
						<h1>
							<a href="index.php">Admin Perpustakaan</a>
						</h1>
					</div>
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-lg-12">
							<div class="input-group form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button">Search</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="navbar navbar-inverse" role="banner">
						<nav
							class="collapse navbar-collapse bs-navbar-collapse navbar-right"
							role="navigation">
							<ul class="nav navbar-nav">
								<li class="dropdown"><a href="#" class="dropdown-toggle"
									data-toggle="dropdown">My Account <b class="caret"></b></a>
									<ul class="dropdown-menu animated fadeInUp">
										<li><a href="profile.html">Profile</a></li>
										<li><a href="login.html">Logout</a></li>
									</ul></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-md-2">
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
						<!-- Main menu -->
						<li><a href="index.php"><i class="glyphicon glyphicon-home"></i>
								Dashboard</a></li>
						<li class="submenu"><a href="#"> <i
								class="glyphicon glyphicon-list"></i> Add/Update Data <span
								class="caret pull-right"></span>
						</a> <!-- Sub menu -->
							<ul>
								<li class="current"><a href="addNewAnggota.php">Anggota Baru</a></li>
								<li class="current"><a href="anggotaLama.php">Update Data</a></li>
							</ul></li>
						<li><a href="peminjaman.php"><i class="glyphicon glyphicon-pencil"></i> Peminjaman</a></li>
						<li><a href="calendar.html"><i
								class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
						<li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i>
								Statistics (Charts)</a></li>
						<li><a href="tables.html"><i class="glyphicon glyphicon-list"></i>
								Tables</a></li>
						<li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i>
								Buttons</a></li>
						<li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i>
								Editors</a></li>
						<li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i>
								Forms</a></li>

					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12 panel-warning">
						<div class="content-box-header panel-heading">
							<div class="panel-title ">Update Data Anggota</div>
						</div>

						<div class="content-box-large box-with-header">

							<form onsubmit="updateData()" method="post">
								<br></br>
								<div class="form-group">
									<label for="namass" class="col-sm-2 control-label"></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="kodesearch"
											placeholder="Search by kode-anggota...">
									</div>
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"
											onclick="searchData()">Search</button>
									</span>
								</div>
								<br></br>
								<div class="form-group">
									<label for="kodeanggota" class="col-sm-2 control-label">Kode
										Anggota</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="kodeanggota"
											disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="nama" class="col-sm-2 control-label">Nama</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="nama"
											required="required" disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="alamat" class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="alamat"
											required="required" disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
									<div class="col-sm-6">
										<select name="provinsi" id="provinsi"
											onchange="getValue(this)" required="required"
											disabled="disabled">
											<option value=""></option>
											 	<?php
            foreach ($data as $user) {
                echo "<option value=" . $user['id'] . ">" . $user['name'] . "</option>";
            }
            ?>     
										</select>
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="kota" class="col-sm-2 control-label">Kota</label>
									<div class="col-sm-6">
										<select name="kota" id="kota" onchange="getValueKota(this)"
											required="required" disabled="disabled">
										</select>
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
									<div class="col-sm-6">
										<select name="kecamatan" id="kecamatan"
											onchange="getValueKelurahan(this)" required="required"
											disabled="disabled">

										</select>
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="kelurahan" class="col-sm-2 control-label">Kelurahan</label>
									<div class="col-sm-6">

										<select name="kelurahan" id="kelurahan" required="required"
											disabled="disabled">

										</select>
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="email" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="email"
											disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="notelp" class="col-sm-2 control-label">No.Telepon</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="notelp"
											required="required" disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="noreg" class="col-sm-2 control-label">No.
										Registrasi</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="noreg"
											disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="masaaktifkartu" class="col-sm-2 control-label">Masa
										Aktif Kartu Sampai Dengan</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="masaaktifkartu"
											disabled="disabled">
									</div>
								</div>
								<br></br>
								<div class="form-group">
									<label for="masaaktifanggota" class="col-sm-2 control-label">Masa
										Aktif Kartu Sampai Dengan</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="masaaktifanggota"
											disabled="disabled">
									</div>
								</div>
								<br></br> <br></br>
								<!-- <table class="table table-bordered" id="data">
									<thead>
										<tr>
											<th style="text-align:center">Tipe iuran</th>
											<th style="text-align:center">Tanggal Bayar</th>
											<th style="text-align:center">Berlaku Sampai</th>
											<th style="text-align:center">Jumlah</th>
										</tr>
									</thead>
									<tbody id="bodyTable2">
									</tbody>
								</table> -->
								<input type="button" class="btn btn-primary" value="Add"
									id="addNew" onclick="addTable()"> <br></br>
								<!-- <table class="table table-bordered" id="tableData">
									<thead>
										<tr>
											<th style="text-align:center">Iuran</th>
											<th style="text-align:center">Masa Berlaku</th>
											<th style="text-align:center">Jumlah</th>
										</tr>
									</thead>
									<tbody id="bodyTable">
									</tbody>
								</table> -->
								<div class="row">
									<div class="col-sm-2 pull-right">
										<input type="submit" class="btn btn-primary" value="Update">
									</div>
								</div>

								<br></br>
							</form>
							<br></br> <br></br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">

			<div class="copy text-center">
				Copyright 2017 <a href='#'>Website</a>
			</div>

		</div>
	</footer>
</body>
</html>