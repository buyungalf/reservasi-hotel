<?php

include "../lib/koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

if (!ctype_alnum($username) or !ctype_alnum($password)) {
	include "login2.php";
} else {
	$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
	$match = mysqli_num_rows($login);
	$u = mysqli_fetch_array($login);

	if ($match > 0) {
		session_start();
		$_SESSION['id_user'] = $u['id_user'];
		$_SESSION['username'] = $u['username'];
		$_SESSION['password'] = $u['password'];
		$_SESSION['realname'] = $u['realname'];
		$_SESSION['status'] = $u['status'];
		header('location:main.php?pages=home');
	} else {
		include "login2.php";
	}
}
