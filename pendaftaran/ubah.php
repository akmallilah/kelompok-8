<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$id = $_GET["id"];

$pendaftaran = query("SELECT * FROM pendaftaran WHERE id = $id")[0];


if( isset($_POST["submit"]) ){

    
  if( ubah($_POST) > 0 ) {
  	echo "
  	    <script>
  	        alert('data berhasil diubah!');
  	        document.location.href = 'index.php';
  	    </script>
  	";
  } else {
  	echo "
  	    <script>
  	        alert('data gagal diubah!');
  	        document.location.href = 'index.php';
  	    </script>
  	";
  }


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="ubah">
	<h1 style="color: blueviolet;">Update Member Data</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $pendaftaran["id"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $pendaftaran["nama"]; ?>">
			</li>
		</ul>
		<ul>
			<li>
				<label for="tgl_lahir">Tgl. Lahir :</label>
				<input type="date" name="tgl_lahir" id="tgl_lahir" required value="<?= $pendaftaran["tgl_lahir"]; ?>">
			</li>
		</ul>
		<ul>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" required value="<?= $pendaftaran["alamat"]; ?>">
			</li>
		</ul>
		<ul>
			<li>
				<label for="asrama">Asrama :</label>
				<select name="asrama">
									<option value="">Choose</option>
									<?php 
									$asrama = mysqli_query($conn, "SELECT * FROM tb_asrama");
									while ($a=mysqli_fetch_array($asrama)) {
										echo "<option value ='$a[kd_asrama]'>$a[asrama]</option>";
									}
									 ?>
				</select>
			</li>
		</ul>
		<ul>
			<li>
				<label for="pend_pagi">Pendidikan Pagi :</label>
				<select name="pend_pagi">
									<option value="">Choose</option>
									<?php 
									$pend_pagi = mysqli_query($conn, "SELECT * FROM tb_pp");
									while ($b=mysqli_fetch_array($pend_pagi)) {
										echo "<option value ='$b[kd_pp]'>$b[pp]</option>";
									}
									 ?>
				</select>
			</li>
		</ul>
		<ul>
			<li>
				<label for="pend_sore">Pendidikan Sore :</label>
				<select name="pend_sore">
									<option value="">Choose</option>
									<?php 
									$pend_sore = mysqli_query($conn, "SELECT * FROM tb_ps");
									while ($c=mysqli_fetch_array($pend_sore)) {
										echo "<option value ='$c[kd_ps]'>$c[ps]</option>";
									}
									 ?>
				</select>
			</li>
		</ul>
	
        <button type="submit" name="submit">Update Data</button>
	</form>

</body>
</html>