<?php 
require 'Connection.php';
/**
 * 
 */
class Beranda extends Connection
{

	public function getListBeranda()
	{
		return $this->getList("SELECT * FROM beranda");
	}

	public function getOneBeranda($id)
	{
		return $this->getOne("SELECT * FROM beranda WHERE id = $id");
	}

	public function getLimitBeranda()
	{
		return $this->getList("SELECT * FROM beranda ORDER BY update_time DESC LIMIT 3");
	}

	public function insertBeranda($judul,$img,$tmp)
	{
		$gambar = 'beranda_'.date('YmdHis_').$img;
		$insert = $this->query("INSERT INTO beranda (img,judul) VALUES ('$gambar','$judul')");
		if ($insert) {
			move_uploaded_file($tmp, '../img/'.$gambar);
			echo "<script>alert('Slider berhasil ditambahkan!');document.location.href='index.php'</script>";
		}else{
			echo "<script>alert('Slider gagal ditambahkan!');document.location.href='index.php'</script>";
		}
	}

	public function updateBeranda($judul,$img,$tmp,$id,$old_img)
	{
		if ($img == null || $tmp == null || $img == '' || $tmp == '') {
			$update = $this->query("UPDATE beranda SET img = '$old_img', judul = '$judul' WHERE id = $id ");
			if ($update) {
				echo "<script>alert('Slider berhasil diedit!');document.location.href='index.php'</script>";
			}else
			{
				echo "<script>alert('Slider gagal diedit!');document.location.href='index.php'</script>";
			}
		}else{
			$gambar = 'beranda_'.date('YmdHis_').$img;
			$update = $this->query("UPDATE beranda SET img = '$gambar' WHERE id = $id ");
			if ($update) {
				unlink('../img/'.$old_img);
				move_uploaded_file($tmp, '../img/'.$gambar);
				echo "<script>alert('Slider berhasil diedit!');document.location.href='index.php'</script>";
			} else {
				echo "<script>alert('Slider gagal diedit!');document.location.href='index.php'</script>";
				
			}
			
		}
	}

	public function deleteBeranda($id,$img)
	{
		$delete = $this->query("DELETE FROM beranda WHERE id = $id");
		if ($delete) {
			unlink('../img/'.$img);
			echo "<script>alert('Slider berhasil dihapus!');document.location.href='index.php'</script>";
		} else {
			echo "<script>alert('Slider gagal dihapus!');document.location.href='index.php'</script>";
		}
		
	}

	public function getListkegiatan()
	{
		return $this->getList("SELECT * FROM artikel WHERE role = 'beranda' ORDER BY update_time DESC");
	}

	public function insertKegiatan($judul,$img,$tmp,$teks,$role)
	{
		// var_dump($judul,$img,$tmp,$teks,$role);exit();
		$gambar = 'artikel_'.date('YmdHis_').$img;
		$insert = $this->query("INSERT INTO artikel (judul,img,teks,role) VALUES ('$judul','$gambar','$teks','$role')");
		if ($insert) {
			move_uploaded_file($tmp, '../img/'.$gambar);
			echo "<script>alert('Artikel berhasil ditambahkan!');document.location.href='index.php'</script>";
		}else{
			echo "<script>alert('Artikel gagal ditambahkan!');document.location.href='index.php'</script>";
		}
	}

	public function updateKegiatan($judul,$img_kegiatan,$tmp_kegiatan,$teks,$id,$old_img,$role)
	{
		// var_dump($judul,$img_kegiatan,$tmp_kegiatan,$teks,$id,$old_img,$role);exit();
		if ($img_kegiatan == null || $tmp_kegiatan == null || $img_kegiatan == '' || $tmp_kegiatan == '') {
			$update = $this->query("UPDATE artikel SET judul = '$judul', img = '$old_img', teks = '$teks', role = '$role' WHERE id = $id ");
			if ($update) {
				echo "<script>alert('Artikel berhasil diedit!');document.location.href='index.php'</script>";
			}else
			{
				echo "<script>alert('Artikel gagal diedit!');document.location.href='index.php'</script>";
			}
		}else{
			$gambar = 'artikel_'.date('YmdHis_').$img_kegiatan;
			$update = $this->query("UPDATE artikel SET judul = '$judul', img = '$gambar', teks = '$teks', role = '$role' WHERE id = $id ");
			if ($update) {
				unlink('../img/'.$old_img);
				move_uploaded_file($tmp_kegiatan, '../img/'.$gambar);
				echo "<script>alert('Artikel berhasil diedit!');document.location.href='index.php'</script>";
			} else {
				echo "<script>alert('Artikel gagal diedit!');document.location.href='index.php'</script>";
				
			}
			
		}
	}

	public function deleteKegiatan($id,$img)
	{
		$delete = $this->query("DELETE FROM artikel WHERE id = $id");
		if ($delete) {
			unlink('../img/'.$img);
			echo "<script>alert('Artikel berhasil dihapus!');document.location.href='index.php'</script>";
		} else {
			echo "<script>alert('Artikel gagal dihapus!');document.location.href='index.php'</script>";
		}
		
	}
}

