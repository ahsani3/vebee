<?php
require_once "Connection.php";

class Security extends Connection
{
	
	function clean_post($request)
	{
		return mysqli_escape_string($this->conn(), $request);
	}

	// function clean_xss($request)
	// {
	// 	$xss = strip_tags($request);
	// 	return $this->clean_post($xss);
	// }
	
	function clean_xss($request)
	{
		$xss = htmlspecialchars($request,ENT_QUOTES);
		return $this->clean_post($xss);
	}

	function clean_all($request)
	{
		$post = $this->clean_post($request);
		$xss = $this->clean_xss($post);
		return $xss;
	}

	function generateReferral($username, $length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		$generateUser = substr(md5($username), 4, 4);
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $generateUser.$randomString;
	}

	function security_before_login($api_key)
	{
		if ($api_key) {
			$api 		= $this->clean_all($api_key);
			$query		= "SELECT * FROM api_key WHERE API_KEY = '$api'";
			if ($this->num_rows($query) == 0) {
				$response['success'] = 0;
				$response['message'] = 'Data dikunci';
				echo(json_encode($response));
				exit();
			}
		} else {
			$response['success'] = 0;
			$response['message'] = 'Data dikunci';
			echo(json_encode($response));
			exit();
		}
	}

	function security_after_login($api_key,$user,$sess)
	{
		if ($api_key) {
			$api 		= $this->clean_all($api_key);
			$query		= "SELECT * FROM api_key WHERE API_KEY = '$api'";
			if ($this->num_rows($query) == 0) {
				$response['success'] = 0;
				$response['message'] = 'Data dikunci';
				echo(json_encode($response));
				exit();
			}
		} else {
			$response['success'] = 0;
		$response['message'] = 'Data dikunci';
			echo(json_encode($response));
			exit();
		}

		if ($sess && $user) {
			$id_user	= $this->clean_all($user);
			$session	= $this->clean_all($sess);

			if($_SERVER['HTTP_TYPE'] == 'mitra'){
				$query		= "SELECT * FROM mitra WHERE id = '$id_user' AND token = '$session'";
				if ($this->num_rows($query) == 0) {
					$response['success'] = 0;
					$response['message'] = 'Silahkan login kembali';
					echo(json_encode($response));
					exit();
				}
			}elseif ($_SERVER['HTTP_TYPE'] == 'customer') {
				$query		= "SELECT * FROM customers WHERE id = '$id_user' AND token = '$session'";
				if ($this->num_rows($query) == 0) {
					$response['success'] = 0;
					$response['message'] = 'Silahkan login kembali';
					echo(json_encode($response));
					exit();
				}
			}
		} else {
			$response['success'] = 0;
			$response['message'] = 'Parameter session kurang';
			echo(json_encode($response));
			exit();
		}

		$response['success'] = 1;
		$response['message'] = 'Berhasil';

		return $response;
	}

	function validateImage($request)
	{
		$explode	= explode('/',$request['type']);
		if ($explode[0] == 'image') {
			$result	= TRUE;
		} else {
			$result	= FALSE;
		}
		return $result;
	}

	function validateSize($request)
	{
		if ($request['size'] > 2000000) {
			$result	= FALSE;
		} else {
			$result	= TRUE;
		}
		return $result;
	}
}
?>