<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$pendaftaran = query("SELECT * FROM pendaftaran");

if( isset($_POST["cari"]) ){
	$pendaftaran = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="index">

<button name="logout">
<a href="logout.php">Logout</a>
</button>

<h1 style="text-align:center;color:green;">NEW MEMBER DATA</h1>

<a href="tambah.php">Add Data</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="30" autofocus placeholder="type here.." autocomplete="off">
	<button type="submit" name="cari">Search!</button>
	
</form>

<br>
<table border="1" cellpadding="8" cellspacing="2">
	
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Tgl. Lahir</th>
		<th>Alamat</th>
		<th>Asrama</th>
		<th>Pendidikan Pagi</th>
		<th>Pendidikan Sore</th>
		<th>Aksi</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $pendaftaran as $row ) : ?>

	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["tgl_lahir"]; ?></td>
		<td><?= $row["alamat"]; ?></td>
		<td><?= $row["asrama"]; ?></td>
		<td><?= $row["pend_pagi"]; ?></td>
		<td><?= $row["pend_sore"]; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">edit</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('are you sure?');">delete</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>


</body>
</html>