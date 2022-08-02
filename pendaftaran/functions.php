<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_registrasi");


function query($query) {
	global $conn; 
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;

   $nama = htmlspecialchars($data["nama"]);
   $tgl_lhr = htmlspecialchars($data["tgl_lahir"]);
   $alamat = htmlspecialchars($data["alamat"]);
   $asrama = htmlspecialchars($data["asrama"]);
   $pend_pagi = htmlspecialchars($data["pend_pagi"]);
   $pend_sore = htmlspecialchars($data["pend_sore"]);

   $query = "INSERT INTO pendaftaran
               VALUES 
             ('', '$nama', '$tgl_lhr', '$alamat', '$asrama', '$pend_pagi', '$pend_sore')
           ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pendaftaran WHERE id = $id");
	return mysqli_affected_rows($conn);	
} 


function ubah($data){
	global $conn;

   $id = $data["id"];
   $nama = htmlspecialchars($data["nama"]);
   $tgl_lhr = htmlspecialchars($data["tgl_lahir"]);
   $alamat = htmlspecialchars($data["alamat"]);
   $asrama = htmlspecialchars($data["asrama"]);
   $pend_pagi = htmlspecialchars($data["pend_pagi"]);
   $pend_sore = htmlspecialchars($data["pend_sore"]);

   $query = "UPDATE pendaftaran SET
               nama = '$nama',
               tgl_lhr = '$tgl_lhr',
               alamat = '$alamat',
               asrama = '$asrama',
               pend_pagi = '$pend_pagi',
               pend_sore = '$pend_sore'
             WHERE id = $id
               ";
    mysqli_query($conn, $query);

    
    return mysqli_affected_rows($conn);
}


function cari($keyword) {
	$query = "SELECT * FROM pendaftaran
	            WHERE 
	         nama LIKE '%$keyword%' OR 
	         alamat LIKE '%$keyword%'
	        ";
	return query($query);
}



function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
    	echo "<script>
    	         alert('username sudah terdaftar!')
    	      </script>
    	      ";
    	return false;      
    }



    if( $password !== $password2 ) {
    	echo "<script>
    	         alert('konfirmasi password tidak sesuai!');
    	      </script>";
    	return false;
    }
   
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");


    return mysqli_affected_rows($conn);

}






?>