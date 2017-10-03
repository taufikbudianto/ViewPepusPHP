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
<script src="function/peminjaman.js"></script>
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
						<li class="current"><a href="#"><i
								class="glyphicon glyphicon-pencil"></i> Peminjaman</a></li>
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
							<div class="panel-title ">Peminjaman Buku</div>
						</div>

						<div class="content-box-large box-with-header">
							<form id="myForm" method='POST'>
								<input type="text" class="form-control" id="nama">
								<input type="submit" class="test">
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