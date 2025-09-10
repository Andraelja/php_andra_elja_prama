<?php
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password)) {
		$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password ='$password'");
		$result = mysqli_num_rows($sql);
		if ($result) {
			echo "Anda berhasil masuk!";
			echo "Klik <a href='backend/index.php'>disini</a> untuk melanjutkan";	
		} else{
			echo "Username dan Password salah";
		}	
	} else{
		echo "Username dan Password anda kosong silahkan diisi.";
	}
?>