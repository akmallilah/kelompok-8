
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="tambah">
	<h1 style="text-align: center;color: whitesmoke;">Add New Member</h1>

	<form id="form" action="" method="post">
		<table  border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>
				<label for="nama">Nama</label>
			</td>
			<td>
				<input type="text" name="nama" id="nama" autofocus autocomplete="off">
			</td>
		</tr>
		<tr>
			<td>
				<label for="tgl_lahir">Tgl. Lahir</label>
			</td>
			<td>
				<input type="date" name="tgl_lahir" id="tgl_lahir">
			</td>
		</tr>
		<tr>
			<td>
				<label for="alamat">Alamat</label>
			</td>
			<td>
				<input type="text" name="alamat" id="alamat" autocomplete="off">
			</td>
		</tr>
		<tr>
			<td>
				<label for="asrama">Asrama</label>
			</td>
			<td>
				<select name="asrama">
									<option value="">Choose</option>
									<?php 
									$asrama = mysqli_query($conn, "SELECT * FROM tb_asrama");
									while ($a=mysqli_fetch_array($asrama)) {
										echo "<option value ='$a[kd_asrama]'>$a[asrama]</option>";
									}
									 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="pend_pagi">Pendidikan Pagi</label>
			</td>
			<td>
				<select name="pend_pagi">
									<option value="">Choose</option>
									<?php 
									$pend_pagi = mysqli_query($conn, "SELECT * FROM tb_pp");
									while ($b=mysqli_fetch_array($pend_pagi)) {
										echo "<option value ='$b[kd_pp]'>$b[pp]</option>";
									}
									 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="pend_sore">Pendidikan Sore</label>
			</td>
			<td>
				<select name="pend_sore">
									<option value="">Choose</option>
									<?php 
									$pend_sore = mysqli_query($conn, "SELECT * FROM tb_ps");
									while ($c=mysqli_fetch_array($pend_sore)) {
										echo "<option value ='$c[kd_ps]'>$c[ps]</option>";
									}
									 ?>
				</select>
			</td>
		</tr>
	
        <button type="submit" name="submit">Add</button>
        </table>
	</form>

</body>
</html>