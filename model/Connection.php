<?php

class Connection
{
	var $host		= "localhost";//sql200.epizy.com
	var $username	= "root";//epiz_32219669
	var $password	= "";//mrgyAFuYmQ
	var $db			= "vebee";//epiz_32219669_vebee

	function conn(){
		$koneksi = mysqli_connect($this->host, $this->username, $this->password) or die ("Gagal koneksi database! msg:". mysqli_connect_error());
		$select_db = mysqli_select_db($koneksi, $this->db) or die ("Database tidak ditemukan! msg:".mysqli_error($koneksi));
		return $koneksi;
	}

	function query($request){
		return mysqli_query($this->conn(), $request);
	}

	function getList($request)
	{
		$rows = NULL;
		$query = $this->query($request);
		while($row = $query->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}

	function getOne($request)
	{
		$query = $this->query($request);
		$row = $query->fetch_assoc();
		return $row;
	}

	function num_rows($request) {
		return mysqli_num_rows($this->query($request));
	}

	function generateRandomString($length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function generateRandomNumber($length)
	{
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function convertNumberRoman($number) {
		$map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
		$returnValue = '';
		while ($number > 0) {
			foreach ($map as $roman => $int) {
				if($number >= $int) {
					$number -= $int;
					$returnValue .= $roman;
					break;
				}
			}
		}
		return $returnValue;
	}
}
?>