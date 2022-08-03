<?php 
require 'Connection.php';
/**
 * 
 */
class Video extends Connection
{
	
	public function getListVideo()
	{
		return $this->getList("SELECT * FROM video ORDER BY create_time DESC");
	}
	
	

	public function getOneVideo($id)
	{
		return $this->getOne("SELECT * FROM video WHERE id = $id");
	}

	public function getLimitVideo()
	{
		return $this->getList("SELECT * FROM video ORDER BY create_time DESC LIMIT 6");
	}

	public function insertVideo($judul,$link)
	{
		// if ($size >= $maxsize || $size == 0) {
		// 	echo "<script>alert('Ukuran video lebih dari 10Mb!');document.location.href='video.php'</script>";
		// }else{
		// 	$nama_video = 'video_'.date('YmdHis_').$video;
		// 	$insert = $this->query("INSERT INTO video (judul,video) VALUES ('$judul','$nama_video')");
		// 	if ($insert) {
		// 		move_uploaded_file($tmp, '../video/'.$nama_video);
		// 		echo "<script>alert('Video berhasil ditambahkan!');document.location.href='video.php'</script>";
		// 	}else{
		// 		echo "<script>alert('Video gagal ditambahkan!');document.location.href='video.php'</script>";
		// 	}
		// }
		$insert = $this->query("INSERT INTO video (judul,video) VALUES ('$judul','$link')");
		if ($insert) {
			echo "<script>alert('Video berhasil ditambahkan!');document.location.href='video.php'</script>";
		}else{
			echo "<script>alert('Video gagal ditambahkan!');document.location.href='video.php'</script>";
		}

	}

	public function updateVideo($judul,$link,$id)
	{
		// if ($size >= $maxsize) {
		// 	echo "<script>alert('Ukuran video lebih dari 10Mb!');document.location.href='video.php'</script>";
		// }else{
		// 	if ($video == '' || $tmp == '') {
		// 		$update = $this->query("UPDATE video SET judul = '$judul', video = '$old_video' WHERE id = $id ");
		// 		if ($update) {
		// 			echo "<script>alert('Video berhasil diedit!');document.location.href='video.php'</script>";
		// 		}else
		// 		{
		// 			echo "<script>alert('Video gagal diedit!');document.location.href='video.php'</script>";
		// 		}
		// 	}else{
		// 		$nama_video = 'video_'.date('YmdHis_').$video;
		// 		$update = $this->query("UPDATE video SET judul = '$judul', video = '$nama_video' WHERE id = $id ");
		// 		if ($update) {
		// 			unlink('../video/'.$old_video);
		// 			move_uploaded_file($tmp, '../video/'.$nama_video);
		// 			echo "<script>alert('Video berhasil diedit!');document.location.href='video.php'</script>";
		// 		} else {
		// 			echo "<script>alert('Video gagal diedit!');document.location.href='video.php'</script>";
					
		// 		}
				
		// 	}
		// }
		$update = $this->query("UPDATE video SET judul = '$judul', video = '$link' WHERE id = $id ");
		if ($update) {
			echo "<script>alert('Video berhasil diedit!');document.location.href='video.php'</script>";
		}else
		{
			echo "<script>alert('Video gagal diedit!');document.location.href='video.php'</script>";
		}
	}

	public function deleteVideo($id)
	{
		// $delete = $this->query("DELETE FROM video WHERE id = $id");
		// if ($delete) {
		// 	unlink('../video/'.$video);
		// 	echo "<script>alert('Video berhasil dihapus!');document.location.href='video.php'</script>";
		// } else {
		// 	echo "<script>alert('Video gagal dihapus!');document.location.href='video.php'</script>";
		// }
		$delete = $this->query("DELETE FROM video WHERE id = $id");
		if ($delete) {
			echo "<script>alert('Video berhasil dihapus!');document.location.href='video.php'</script>";
		} else {
			echo "<script>alert('Video gagal dihapus!');document.location.href='video.php'</script>";
		}
		
	}
}

 ?>