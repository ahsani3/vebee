<?php 
session_start();
require 'Connection.php';
/**
 * 
 */
class User extends Connection
{
	
	public function userLogin($username,$password)
	{
		$cek_user = $this->getOne("SELECT * FROM user WHERE username = '$username'");
		if ($cek_user != null) {
			if (password_verify($password, $cek_user['password'])) {
				$_SESSION['id'] = $cek_user['id'];
				echo "<script>document.location.href='index.php';</script>";
			} else {
				echo "<script>alert('password anda salah');</script>";
			}
		} else {
			echo "<script>alert('username anda salah');</script>";
		}
		
	}
}



 ?>